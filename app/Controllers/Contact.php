<?php namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        if($this->request->is('post')){
            $name = $this->request->getPost('name');
            $phone = '6289646604773';

            $url = 'https://api.whatsapp.com/send/?phone=' . $phone . '&text=' . urlencode("Hello, my name is " . $name);
            return redirect()->to($url);
        }
    }
}