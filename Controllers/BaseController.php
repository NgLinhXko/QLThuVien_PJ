
<?php
session_start();


//phuong thức loadview
//mọi controller đều kế thừa từ basecontroller
class BaseController
{
    const URL = "http://localhost:8080/QLthuVien_PJ/index.php?";
    const VIEW_FOLDER_NAME = 'Views';
    const MODEL_FOLDER_NAME = 'Models';
    const BOOKS = "books";
    const CATE = "categories";
    const USERS = "users";
    const BILL = "bill";
    const DETAILBILL = "detailbill";
    protected function view($viewPath, array $data = [])
    {
        foreach ($data as $key => $data) {
            $$key = $data;
        }
        $viewPath = self::VIEW_FOLDER_NAME . '/'
            . str_replace('.', '/', $viewPath) . '.php';
        require($viewPath);
    }
    protected function loadModel($modelPath)
    {
        $modelPath = self::MODEL_FOLDER_NAME . '/'
            . $modelPath . '.php';
        require($modelPath);
    }
}
