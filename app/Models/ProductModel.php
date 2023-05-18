<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model{
    protected $table= 'product';
    protected $allowedFields = ['name','price','description','image', 'category_id','room_id'];

    public function getAllProduct(){
        return $this->findAll();
    }    
    public function getProductById($id){
        return $this->where(['id' => $id])->first();
    }
    public function getAllProductDesc(){
        return $this->orderBy('id', 'desc')->findAll();
    }
    public function getProductByCat($category_id){
        return $this->where('category_id', $category_id)->findAll();
    } 
    public function getProductByRoom($room_id){
        return $this->where('room_id', $room_id)->findAll();
    } 
    public function getProductByRoomCat($category_id,$room_id){
        return $this->where('room_id', $room_id)->where('category_id',$category_id)->findAll();
    } 
}

?>