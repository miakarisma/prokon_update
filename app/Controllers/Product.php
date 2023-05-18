<?php namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\RoomModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->roomModel = new RoomModel();
    }

    public function index()
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->getAllProduct();
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getAllRoom();

        echo view('product/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->getAllCategory();
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getAllRoom();
        return view('product/create', $data);
    }

    public function save()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[45]',  
            'price' => 'required', 
            'description' => 'required', 
            'category_id' => 'required', 
            'room_id' => 'required', 
            'image' => 'is_image[image]|max_size[image,10240]|mime_in[image,image/png,image/jpg,image/jpeg,image/webp]',
        ];
        if($this->request->is('post') && $this->validate($rules))
        {
            $imageFile = $this->request->getFile('image');
            if($imageFile->getError() == 4){
                $imageName = "default.jpg";
            }else{
                $imageName = $imageFile->getRandomName();
                $imageFile->move('img', $imageName); 
            }           

            $this->productModel->save([
                'name' => $this->request->getVar('name'),
                'price' => $this->request->getVar('price'),
                'description' => $this->request->getVar('description'),
                'category_id' => $this->request->getVar('category_id'),
                'room_id' => $this->request->getVar('room_id'),
                'image' => $imageName,
            ]);

            return redirect()->to(base_url('/ecommerce'));
        }else{
            return view('product/create');
        }

    }
    public function delete($id)
    {
        $product = $this->productModel->find($id);
        if($product['image'] != 'default.jpg'){
            unlink('img/' . $product['image']);
        }
        
        $cartModel = new CartModel();
        $cartModel->where('product_id', $id)->delete();

        $this->productModel->delete($id);
        return redirect()->to(base_url('/ecommerce'));
    }

    public function edit($id){
        $categoryModel = new CategoryModel();
        $roomModel = new RoomModel();
        // $data['category'] = $categoryModel->getAllCategory();
        $data = [
            'product' => $this->productModel->getProductById($id),
            'category' => $categoryModel->getAllCategory(),
            'room' => $roomModel->getAllRoom()
        ];

        return view('product/edit', $data);
    }
    
    public function update($id){
        $rules = [
            'name' => 'required|min_length[3]|max_length[45]',  
            'price' => 'required',
            'description' => 'required', 
            'category_id' => 'required', 
            'room_id' => 'required', 
            'image' => 'is_image[image]|max_size[image,10240]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ];
        if($this->request->is('post') && $this->validate($rules))
        {
            $imageFile = $this->request->getFile('image');
            if($imageFile->getError() == 4){
                $imageName = $this->request->getVar('imagePrevName');
            }else{
                $imageName = $imageFile->getRandomName();
                $imageFile->move('img',$imageName);

                if($this->request->getVar('imagePrevName') != 'default.jpg'){
                    unlink('img/' . $this->request->getVar('imagePrevName'));
                }
            }

            $this->productModel->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'price' => $this->request->getVar('price'),
                'description' => $this->request->getVar('description'),
                'category_id' => $this->request->getVar('category_id'),
                'room_id' => $this->request->getVar('room_id'),
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/ecommerce'));
        }else{
            return redirect()->to('/product/edit/'.$id);
        }
    }
}