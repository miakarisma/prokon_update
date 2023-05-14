<?php namespace App\Models;

use CodeIgniter\Model;

class FrontPageModel extends Model{
    protected $table= 'frontPage';
    protected $allowedFields = ['image','text_header','text_span'];

    public function getAllFrontPage(){
        return $this->findAll();
    }    
    public function getFrontPageById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>