<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model{
    protected $table= 'product';
    protected $allowedFields = ['name','price','description','image'];

    public function getAllProduct(){
        return $this->findAll();
    }    
    public function getProductById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>