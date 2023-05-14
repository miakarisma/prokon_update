<?php namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        if($this->request->is('post')){
            $adminPhone = $this->request->getPost('adminPhone');
            $name = $this->request->getPost('name');
            $phone = $this->request->getPost('phone');
            $email = $this->request->getPost('email');
            $message = $this->request->getPost('message');

            $url = 'https://api.whatsapp.com/send/?phone=' . $adminPhone . '&text=' . urlencode("Hi, I hope this message finds you well. My name is $name, my phone number is $phone, and my email is $email.". 
            "I am interested in consulting with you about interior design. ".
            "Could you please let me know if you are available for a consultation and what your rates are? ".
            "$message Thank you!");
            return redirect()->to($url);
        }
    }
}