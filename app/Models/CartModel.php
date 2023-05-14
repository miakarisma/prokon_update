<?php namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model{
    protected $db;
    protected $table= 'cart';
    protected $table_account= 'account';
    protected $table_product= 'product';
    protected $allowedFields = ['account_id','product_id','quantity'];

    public function getAllCart(){
        return $this->findAll();
    }    
    public function getCartById($id){
        return $this->where(['id' => $id])->first();
    }
    public function getUserCart($account_id){
        $db = \Config\Database::connect();

        return  $db->table($this->table)
        ->select($this->table.'.id as id,account_id, product_id, product.name as product_name, product.price as product_price, quantity')
        ->join($this->table_product,$this->table_product.'.id='.$this->table.'.product_id')
        ->where('account_id', $account_id)->get()->getResultArray();
        
    }
    
    public function getItem($account_id, $product_id) {
        return $this->where(['account_id' => $account_id, 'product_id' => $product_id])->first();
    }

    public function addItem($id){

        $db = \Config\Database::connect();
        $query = $db->table($this->table)->select('quantity')->where('id', $id)->get();
        $row = $query->getRow();
        $current_value = $row->quantity;

        $new_value = $current_value + 1;
        $data = [
            'quantity' => $new_value,
        ];
        $db->table($this->table)->where('id', $id)->update($data);
    }

    public function minItem($id){
        
        $db = \Config\Database::connect();
        $query = $db->table($this->table)->select('quantity')->where('id', $id)->get();
        $row = $query->getRow();
        $current_value = $row->quantity;

        $new_value = $current_value - 1;
        if($new_value<=0){
            $this->removeItem($id);
        }else{
            $data = [
                'quantity' => $new_value,
            ];
            $db->table($this->table)->where('id', $id)->update($data);
        }
        
    }
    public function removeItem($id){
        $this->where('id', $id)->delete();
    }
}

?>