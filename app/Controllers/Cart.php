<?php namespace App\Controllers;
use App\Models\CartModel;

class Cart extends BaseController
{
    protected $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        $cartModel = new CartModel();
        $data['cart'] = $cartModel->getUserCart(1);

        echo view('cart/index', $data);
    }

    public function add()
    {
        
        if($this->request->is('post'))
        {    
            $account_id = $this->request->getVar('account_id');
            $product_id = $this->request->getVar('product_id');
            $item = $this->cartModel->getItem($account_id, $product_id);
            // dd($item);
            if($item){
                $this->cartModel->addItem($item['id']);
            }else{
                $this->cartModel->save([
                    'account_id' => $account_id,
                    'product_id' => $product_id,
                    'quantity' => 1,
                ]);
            }
            

            return redirect()->to(base_url('/page'));
        }else{
            return view('product/create');
        }
    }
    public function plusButton($id)
    {
        $this->cartModel->addItem($id);
        return redirect()->to(base_url('/cart'));
    }
    public function removeButton($id)
    {
        $this->cartModel->removeItem($id);
        return redirect()->to(base_url('/cart'));
    }
    public function minButton($id)
    {
        $this->cartModel->minItem($id);
        return redirect()->to(base_url('/cart'));
    }
}