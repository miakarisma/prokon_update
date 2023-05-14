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
        if (!session('id')) {
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
        $dataUser = $this->userModel->getUserByEmail($email_user);

        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'id' => $dataUser['id'],
                    'username' => $dataUser['username'],
                    'email' => $dataUser['email'],
                    'role' => $dataUser['role'],
                    'logged_in' => TRUE
                ]);

                if (session('role')!=1) {
                    return redirect()->to(base_url('/page'));
                    // echo "success";
                }else{
                    return redirect()->to(base_url('/admin'));
                }
            }
            else {
                dd($password);
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        }
        else {
            
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('Page/sign-up');
    }

    public function save()
    {
        $rules = [
            // 'id_user' => 'required',  
            'email' => 'required|min_length[3]|max_length[45]', 
            'fullname' => 'required|min_length[3]|max_length[45]',
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
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('fullname'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => 2,
                // 'gambar' => $imageName,
            ]);

            return redirect()->to(base_url('/login'));
        }else{
            // echo "aaa";
            return view('Page/sign-up');
        }

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/page'));
    }
}