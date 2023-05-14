<?php namespace App\Models;

use CodeIgniter\Model;

class ContactUsModel extends Model{
    protected $table= 'contact_us';
    protected $allowedFields = ['name','phone','location','website','whatsapp','instagram','facebook','email','message'];

    public function getAllContactUs(){
        return $this->findAll();
    }    
    public function getContactUsById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>