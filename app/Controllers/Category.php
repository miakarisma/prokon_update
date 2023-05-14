<?php namespace App\Controllers;
use App\Models\CategoryModel;

class Category extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->getAllCategory();

        echo view('category/index', $data);
    }

    public function create()
    {
        return view('category/create');
    }

    public function save()
    {
        $rules = [
            'name' => 'required|max_length[45]',  
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
            
            $this->categoryModel->save([
                'name' => $this->request->getVar('name'),
                'image' => $imageName,
            ]);

            return redirect()->to(base_url('/ecommerce'));
        }else{
            return view('category/create');
        }

    }
    public function delete($id)
    {
        $category = $this->categoryModel->find($id);
        if($category['image'] != 'default.jpg'){
            unlink('img/' . $category['image']);
        }

        $this->categoryModel->delete($id);
        return redirect()->to(base_url('/ecommerce'));
    }
    public function edit($id){
        $data = [
            'category' => $this->categoryModel->getCategoryById($id)
        ];

        return view('category/edit', $data);
    }
    public function update($id){
        $rules = [
            'name' => 'required|max_length[45]',  
            'image' => 'is_image[image]|max_size[image,10240]|mime_in[image,image/png,image/jpg,image/jpeg,image/webp]',
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

            $this->categoryModel->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/ecommerce'));
        }else{
            return redirect()->to('/category/edit/'.$id);
        }
    }
}