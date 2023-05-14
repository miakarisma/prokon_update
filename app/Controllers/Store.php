<?php namespace App\Controllers;
use App\Models\StoreModel;

class Store extends BaseController
{
    protected $storeModel;

    public function __construct()
    {
        $this->storeModel = new StoreModel();
    }

    public function index()
    {
        $storeModel = new StoreModel();
        $data['store'] = $storeModel->getAllStore();

        echo view('store/index', $data);
    }

    public function usrIndex()
    {
        $storeModel = new StoreModel();
        $data['store'] = $storeModel->getAllStore();

        echo view('page/store', $data);
    }

    public function create()
    {
        return view('store/create');
    }

    public function save()
    {
        $rules = [
            'text_header' => 'required|max_length[45]',  
            'text_span' => 'required|max_length[45]', 
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
            
            $this->storeModel->save([
                'text_header' => $this->request->getVar('text_header'),
                'text_span' => $this->request->getVar('text_span'),
                'image' => $imageName,
            ]);

            return redirect()->to(base_url('/store'));
        }else{
            return view('store/create');
        }

    }
    public function delete($id)
    {
        $store = $this->storeModel->find($id);
        if($store['image'] != 'default.jpg'){
            unlink('img/' . $store['image']);
        }

        $this->storeModel->delete($id);
        return redirect()->to(base_url('/store'));
    }
    public function edit($id){
        $data = [
            'store' => $this->storeModel->getStoreById($id)
        ];

        return view('store/edit', $data);
    }
    public function update($id){
        $rules = [
            'text_header' => 'required|max_length[45]',  
            'text_span' => 'required|max_length[45]', 
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

            $this->storeModel->save([
                'id' => $id,
                'text_header' => $this->request->getVar('text_header'),
                'text_span' => $this->request->getVar('text_span'),
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/store'));
        }else{
            return redirect()->to('/store/edit/'.$id);
        }
    }
}