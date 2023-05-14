<?php namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model{
    protected $table= 'store';
    protected $allowedFields = ['image','text_header','text_span'];

    public function getAllStore(){
        return $this->findAll();
    }    
    public function getStoreById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>