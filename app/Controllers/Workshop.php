<?php namespace App\Controllers;
use App\Models\WorkshopModel;

class Workshop extends BaseController
{
    protected $workshopModel;

    public function __construct()
    {
        $this->workshopModel = new WorkshopModel();
    }

    public function index()
    {
        $workshopModel = new WorkshopModel();
        $data['workshop'] = $workshopModel->getAllWorkshop();

        echo view('workshop/index', $data);
    }

    public function create()
    {
        return view('workshop/create');
    }

    public function save()
    {
        $rules = [
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

            $this->workshopModel->save([
                'image' => $imageName,
            ]);

            return redirect()->to(base_url('/workshop'));
        }else{
            return view('workshop/create');
        }

    }
    public function delete($id)
    {
        $workshop = $this->workshopModel->find($id);
        if($workshop['image'] != 'default.jpg'){
            unlink('img/' . $workshop['image']);
        }

        $this->workshopModel->delete($id);
        return redirect()->to(base_url('/workshop'));
    }
    public function edit($id){
        $data = [
            'workshop' => $this->workshopModel->getWorkshopById($id)
        ];

        return view('workshop/edit', $data);
    }
    public function update($id){
        $rules = [
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

            $this->workshopModel->save([
                'id' => $id,
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/workshop'));
        }else{
            return redirect()->to('/workshop/edit/'.$id);
        }
    }
}