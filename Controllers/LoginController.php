<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Email/Exception.php';
require 'Email/PHPMailer.php';
require 'Email/SMTP.php';
class LoginController extends BaseController
{
    const USERS = "USERS";
    public function __construct()
    {
        $this->loadModel('LoginModel');
        $this->LoginModel = new LoginModel;
        $this->loadModel('AdminModel');
        $this->AdminModel = new AdminModel;
    }
     //status = 0 người dùng chưa kích hoạt tài khoản
    //status = 1 người dũng đã kích hoạt tài khoản
    //status =2 admin
    public function addUser()
    {

        $data = $_POST;
        array_pop($data);
        // $datas = $this->LoginModel->add_user($data);
        $code = mt_rand(1000, 9999);
        $code_k = password_hash($code, PASSWORD_DEFAULT);
        $data['code'] = $code;
        $datas = $this->LoginModel->add_user($data);
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
            $bodyContent .= '<p>Chú ý: Không trả lời thư này.Xin trân trọng cảm ơn !</p>';
            $bodyContent .= '<p><b>Thân mến!</b></p>';
            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if ($mail->send()) {
                return "1";
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
        $ar = [];
        $ar['email_u'] = $email;
        $datas = $this->AdminModel->load_update(self::USERS, $ar);
        if (password_verify($datas[0]['code'], $code)) {
            $data_update = [];
            $data_update['status'] = 1;
            $data_update['code'] = 0;
            $value = $this->AdminModel->update_data(self::USERS, $ar, $data_update);
            if ($value == true) {
                return $this->view("frontend.customer.index");
            }
        } else {
            echo 'fail';
        }
    }
    public function login()
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $arr_data = [];
        $arr_data['email_u'] = $email;
        $arr_data['pass_u'] = $pass;
        $datas = $this->AdminModel->load_update(self::USERS, $arr_data);
        // print_r($datas);
        if (sizeof($datas) == 0) {
            echo '0';
        } else if ($datas[0]['status'] == 2) {
            // header('Location: ');
            $_SESSION['email'] = $email;
            echo '1';
            // echo 'http://localhost:88/QLThuVien_Pj/index.php?controller=admin';
        } else {
            echo '2';
            // header('location:http://localhost:88/QLThuVien_Pj/index.php');
        }
    }
    public function check_mail()
    {
        $data = $_POST;
        $data = $this->LoginModel->checkEmail($data);
        echo sizeof($data);
    }
    public function logout(){
        session_destroy();
        header('location: '.self::URL);
    }
}
