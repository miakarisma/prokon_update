<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model{
    protected $table= 'category';
    protected $allowedFields = ['name','image'];

    public function getAllCategory(){
        return $this->findAll();
    }    
    public function getCategoryById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>