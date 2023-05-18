<?php

namespace App\Controllers;

use App\Models\UserModel;

class SendEmail extends BaseController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            $email_tujuan = $this->request->getVar('email');
            $dataUser = $this->userModel->getUserByEmail($email_tujuan);
            $dataUserId = $dataUser['id']; // Ambil nilai ID dari $dataUser

            $subject = "Reset Password";
            $pesan = '
            <html>
            <body>
            <table width="100%" style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; font-size: 16px; line-height: 1.6;">
            <tr style="background-color: #ececec; color: black; text-align: center;">
                <td style="padding: 20px 0;">
                    <h2 style="margin: 0;">Reset Your Password</h2>
                </td>
            </tr>
            <tr>
                <td style="padding: 20px;">
                    <p>Hello, <?= $email_tujuan; ?></p>
                    <p>This message is from <span>Madju Studio</span></p>
                    <table style="margin: 0 auto;">
                        <tr>
                            <td style="text-align: center;">
                                <p>We noticed a request to reset your password from the following device:</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                <table width="100%" style="margin: 0 auto;">
                                    <tr>
                                        <th style="border: 1px solid black; padding: 10px; background-color: #ececec;">Device</th>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid black; padding: 10px; text-align: left;">
                                        ' . $_SERVER['HTTP_USER_AGENT'] . '
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <p style="text-align:center;">Click the button below to reset your password:</p>
                    <table style="margin: 30px auto;">
                        <tr>
                            <td style="border-radius: 3px; background-color: #ececec; text-align: center;" width="200">
                            <a href="http://localhost:8080/forgot/' . $dataUserId . '" style="color: black; display: inline-block; padding: 10px 20px; text-decoration: none;">Reset Password</a>
                            </td>
                        </tr>
                    </table>
                    <p>If you didn`t request to reset your password, you can safely ignore this email.</p>
                    <p>Thank you,</p>
                    <p>Madju Studio Team</p>
                    <hr style="border: none; border-top: 1px solid black; margin: 10px 0;">
                    <p style="text-align:center;">© 2023 Madju Studio. All rights reserved.</p>
                </td>
            </tr>
        </table>
            </body>
        </html>';



            $email = service('email');
            $email->setTo($email_tujuan);
            $email->setFrom('madjustudio1@gmail.com', 'Madju Studio Send Email');

            // Set the email subject and message
            $email->setSubject($subject);
            $email->setMessage($pesan);

            if ($email->send()) {
                echo '<script>alert("Reset password link has been sent to your email! You can close this page.");</script>';
                return view('/login');
            } else {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
        } else {
            return view('page/email');
        }
    }
}
