<?php namespace App\Models;

use CodeIgniter\Model;

class AboutUsModel extends Model{
    protected $table= 'about_us';
    protected $allowedFields = ['text_header','text_span','text_paragraph'];

    public function getAllAboutUs(){
        return $this->findAll();
    }    
    public function getAboutUsById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>