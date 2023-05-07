<?php namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('login');
    }

    public function isLogged_in()
    {
        if (!session('username')) {
            return redirect()->to(base_url('/login'));
            // echo "success";
        }
        else {
            return redirect()->to(base_url('page'));
        }
    }

    public function process()
    {
        $email_user = $this->request->getVar('email');
        $nama_user = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->userModel->getEmail($email_user);

        if ($dataUser) {
            if ($password == $dataUser['password']) {
                session()->set([
                    'username' => $dataUser['nama_user'],
                    'email' => $dataUser['email_user'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/page'));
            }
            else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        }
        else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function save()
    {
        $rules = [
            // 'id_user' => 'required',  
            'email_user' => 'required|min_length[3]|max_length[45]', 
            'nama_user' => 'required|min_length[3]|max_length[45]',
            'password' => 'required|min_length[8]|max_length[20]' 
            // 'image' => 'is_image[image]|max_size[image,10240]|mime_in[image,image/png,image/jpg,image/jpeg,image/webp]',
        ];
        if($this->request->is('post') && $this->validate($rules))
        {
            // $imageFile = $this->request->getFile('image');
            // if($imageFile->getError() == 4){
            //     $imageName = "default.jpg";
            // }else{
            //     $imageName = $imageFile->getRandomName();
            //     $imageFile->move('img', $imageName); 
            // }           

            $this->userModel->save([
                'email_user' => $this->request->getVar('email'),
                'nama_user' => $this->request->getVar('fullname'),
                'password' => $this->request->getVar('password'),
                // 'gambar' => $imageName,
            ]);

            return redirect()->to(base_url('/login'));
        }else{
            // echo "aaa";
            return view('signup/create');
        }

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/page'));
    }
}