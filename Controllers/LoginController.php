<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Email/Exception.php';
require 'Email/PHPMailer.php';
require 'Email/SMTP.php';
// $_SESSION['code'] = "";
// $_SESSION['data_addUser'] = [];

class LoginController extends BaseController
{
    public $data1 = [], $code = "";
    public function __construct()
    {
        $this->loadModel('LoginModel');
        // khởi tạo đối tượng
        $this->LoginModel = new LoginModel;
    }
    public function addUser()
    {

        $data = $_POST;
        array_pop($data);
        // $datas = $this->LoginModel->add_user($data);
        $code = mt_rand(1000, 9999);
        $code_k = password_hash($code, PASSWORD_DEFAULT);
        $GLOBALS['z'] = $code;
        $_SESSION['code']= $code;
        $_SESSION['data_addUser'] = $data;
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $mail->isSMTP(); // gửi mail SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'loglog050801@gmail.com'; // SMTP username
            $mail->Password = 'kmpzyvxwqrgezkgw'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('loglog050801@gmail.com', 'Thư Viện Thủy Lợi Xác Nhận Tài Khoản');

            $mail->addReplyTo('loglog050801@gmail.com', 'Thư Viện Thủy Lợi Xác Nhận Tài Khoản');

            $mail->addAddress($data['email_u']); // Add a recipient
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $tieude = '[XÁC NHẬN THÔNG TIN TÀI KHOẢN] Xác nhận đăng ký tài khoản Thư Viện Thủy Lợi';
            $mail->Subject = $tieude;
            // Mail body content 

            $bodyContent = '<h3>Thân gửi người dùng . </h3>';
            $bodyContent .= '<b>Họ Tên: </b>' . $data['name_u'] . '<br>';
            $bodyContent .= '<b>Địa Chỉ:</b>' . $data['address_u'] . '<br>';
            $bodyContent .= '<b>Số Điện Thoại:</b>' . $data['phone_u'] . '<br>';
            $bodyContent .= '<b>Email:</b>' . $data['email_u'] . '<br>';

            $bodyContent .= '<p>Nếu thông tin trên là đúng.Vui lòng nhấn vào  <a href="' . self::URL . 'controller=Login&action=process_addUser&email=' . $data['email_u'] . '&code=' . $code_k . '">Xác nhận</a> để kích hoạt tài khoản</p>';
            $bodyContent .= '<p>Note: Mã xác nhận tồn tại trong 5 phút .</p>';
            $bodyContent .= '<p>Chú ý: Không trả lời thư này.Xin trân trọng cảm ơn !</p>';
            $bodyContent .= '<p><b>Thân mến!</b></p>';
            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if ($mail->send()) {
                echo 'Thư đã được gửi đi';
                // print_r($data);
                // print_r($_SESSION['data_addUser']);
               
            } else {
                echo 'Lỗi. Thư chưa gửi được';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        //echo '123';

    }
    public function process_addUser()
    {
        $email = $_GET['email'];
        $code = $_GET['code'];
        // if ($email == $_SESSION['data_addUser']['email_u'] && password_verify($_COOKIE['code'], $code)) {
        //     $datas = $this->LoginModel->add_user($_SESSION['data_addUser']);
        //     // echo $data1;
        // }
    //    print_r($_SESSION['data_addUser']) ;
    
        // echo  $_SESSION['code'];
    }
    public function check_mail()
    {
        $data = $_POST;
        $data = $this->LoginModel->checkEmail($data);
        echo sizeof($data);
    }
}
