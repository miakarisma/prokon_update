<?php namespace App\Controllers;
use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->getAllProduct();

        echo view('product/index', $data);
    }

    public function create()
    {
        return view('product/create');
    }

    public function save()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[45]',  
            'price' => 'required', 
            'description' => 'required', 
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

        $this->productModel->delete($id);
        return redirect()->to(base_url('/ecommerce'));
    }
    public function edit($id){
        $data = [
            'product' => $this->productModel->getProductById($id)
        ];

        return view('product/edit', $data);
    }
    public function update($id){
        $rules = [
            'name' => 'required|min_length[3]|max_length[45]',  
            'price' => 'required',
            'description' => 'required', 
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
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/ecommerce'));
        }else{
            return redirect()->to('/product/edit/'.$id);
        }
    }
}