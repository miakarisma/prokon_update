<?php namespace App\Controllers;
use App\Models\RoomModel;

class Room extends BaseController
{
    protected $roomModel;

    public function __construct()
    {
        $this->roomModel = new RoomModel();
    }

    public function index()
    {
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getAllRoom();

        echo view('room/index', $data);
    }

    public function create()
    {
        return view('room/create');
    }

    public function save()
    {
        $rules = [
            'name' => 'required|max_length[45]',  
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
            
            $this->roomModel->save([
                'name' => $this->request->getVar('name'),
                'text_span' => $this->request->getVar('text_span'),
                'image' => $imageName,
            ]);

            return redirect()->to(base_url('/ecommerce'));
        }else{
            return view('room/create');
        }

    }
    public function delete($id)
    {
        $room = $this->roomModel->find($id);
        if($room['image'] != 'default.jpg'){
            unlink('img/' . $room['image']);
        }

        $this->roomModel->delete($id);
        return redirect()->to(base_url('/ecommerce'));
    }
    public function edit($id){
        $data = [
            'room' => $this->roomModel->getRoomById($id)
        ];

        return view('room/edit', $data);
    }
    public function update($id){
        $rules = [
            'name' => 'required|max_length[45]',  
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

            $this->roomModel->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'text_span' => $this->request->getVar('text_span'),
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/ecommerce'));
        }else{
            return redirect()->to('/room/edit/'.$id);
        }
    }
}