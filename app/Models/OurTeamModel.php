<?php namespace App\Models;

use CodeIgniter\Model;

class OurTeamModel extends Model{
    protected $table= 'our_team';
    protected $allowedFields = ['name','position','image'];

    public function getAllOurTeam(){
        return $this->findAll();
    }    
    public function getOurTeamById($id){
        return $this->where(['id' => $id])->first();
    }
}

?>