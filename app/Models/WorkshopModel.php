<?php namespace App\Models;

use CodeIgniter\Model;

class WorkshopModel extends Model{
    protected $table= 'workshop';
    protected $allowedFields = ['image'];

    public function getAllWorkshop(){
        return $this->findAll();
    }    
    public function getWorkshopById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>