<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model{
    protected $table= 'project';
    protected $allowedFields = ['name','description','date','image'];

    public function getAllProject(){
        return $this->findAll();
    }    
    public function getProjectById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>