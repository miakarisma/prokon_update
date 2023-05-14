<?php namespace App\Controllers;
use App\Models\FrontPageModel;

class FrontPage extends BaseController
{
    protected $frontPageModel;

    public function __construct()
    {
        $this->frontPageModel = new FrontPageModel();
    }

    public function index()
    {
        $frontPageModel = new FrontPageModel();
        $data['frontPage'] = $frontPageModel->getAllFrontPage();

        echo view('frontPage/index', $data);
    }

    public function create()
    {
        return view('frontPage/create');
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
            
            $this->frontPageModel->save([
                'text_header' => $this->request->getVar('text_header'),
                'text_span' => $this->request->getVar('text_span'),
                'image' => $imageName,
            ]);

            return redirect()->to(base_url('/frontPage'));
        }else{
            return view('frontPage/create');
        }

    }
    public function delete($id)
    {
        $frontPage = $this->frontPageModel->find($id);
        if($frontPage['image'] != 'default.jpg'){
            unlink('img/' . $frontPage['image']);
        }

        $this->frontPageModel->delete($id);
        return redirect()->to(base_url('/frontPage'));
    }
    public function edit($id){
        $data = [
            'frontPage' => $this->frontPageModel->getFrontPageById($id)
        ];

        return view('frontPage/edit', $data);
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

            $this->frontPageModel->save([
                'id' => $id,
                'text_header' => $this->request->getVar('text_header'),
                'text_span' => $this->request->getVar('text_span'),
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/frontPage'));
        }else{
            return redirect()->to('/frontPage/edit/'.$id);
        }
    }
}