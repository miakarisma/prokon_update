<?php namespace App\Controllers;
use App\Models\OurTeamModel;

class OurTeam extends BaseController
{
    protected $ourTeamModel;

    public function __construct()
    {
        $this->ourTeamModel = new OurTeamModel();
    }

    public function index()
    {
        $ourTeamModel = new OurTeamModel();
        $data['ourTeam'] = $ourTeamModel->getAllOurTeam();

        echo view('ourTeam/index', $data);
    }

    public function create()
    {
        return view('ourTeam/create');
    }

    public function save()
    {
        $rules = [
            'name' => 'required|max_length[45]',  
            'position' => 'required|max_length[45]', 
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
            
            $this->ourTeamModel->save([
                'name' => $this->request->getVar('name'),
                'position' => $this->request->getVar('position'),
                'image' => $imageName,
            ]);

            return redirect()->to(base_url('/aboutUs'));
        }else{
            return view('ourTeam/create');
        }

    }
    public function delete($id)
    {
        $ourTeam = $this->ourTeamModel->find($id);
        if($ourTeam['image'] != 'default.jpg'){
            unlink('img/' . $ourTeam['image']);
        }

        $this->ourTeamModel->delete($id);
        return redirect()->to(base_url('/aboutUs'));
    }
    public function edit($id){
        $data = [
            'ourTeam' => $this->ourTeamModel->getOurTeamById($id)
        ];

        return view('ourTeam/edit', $data);
    }
    public function update($id){
        $rules = [
            'name' => 'required|max_length[45]',  
            'position' => 'required|max_length[45]', 
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

            $this->ourTeamModel->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'position' => $this->request->getVar('position'),
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/aboutUs'));
        }else{
            return redirect()->to('/ourTeam/edit/'.$id);
        }
    }
}