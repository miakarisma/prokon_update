<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'account';
    protected $allowedFields = ['email', 'username', 'password', 'role'];
    
    public function getUserByUsername($username) {
        return $this->where(['username' => $username])->first();
    }
    public function getUserByEmail($email) {
        return $this->where(['email' => $email])->first();
    }

    public function getUserById($id) {
        return $this->where(['id' => $id])->first();
    }
}

?>