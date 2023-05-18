<?php namespace App\Controllers;
use App\Models\UserModel;

class SendEmail extends BaseController
{
    public $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            $email_tujuan = $this->request->getVar('email');
            $dataUser = $this->userModel->getUserByEmail($email_tujuan);
            $dataUserId = $dataUser['id']; // Ambil nilai ID dari $dataUser
            $subject = "Reset Password";
            $pesan = '<html><body><h2>Hello </h2>' . $email_tujuan . '<p>Click the button below to reset password:</p><a href="http://localhost:8080/forgot/' . $dataUserId . '"><button style="background-color: #4CAF50; color: white; border: none; padding: 16px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 50px;">Reset Password</button></a></body></html>';

            $email = service('email');
            $email->setTo($email_tujuan);
            $email->setFrom('madjustudio1@gmail.com', 'Madju Studio Send Email');

            $email->setSubject($subject);
            $email->setMessage($pesan);

            if ($email->send()) {
                echo '<script>alert("Tautan reset password berhasil dikirim ke email anda! Anda dapat menutup halaman ini.");</script>';
                // return view('/page/login');
            } else {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }

        } else {    
            return view('page/email');
        }
    }
}