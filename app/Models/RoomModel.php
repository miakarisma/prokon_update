<?php namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model{
    protected $table= 'room';
    protected $allowedFields = ['name','text_span','image'];

    public function getAllRoom(){
        return $this->findAll();
    }    
    public function getRoomById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>