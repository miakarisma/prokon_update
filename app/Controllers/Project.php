<?php namespace App\Controllers;
use App\Models\ProjectModel;

class Project extends BaseController
{
    protected $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }

    public function create()
    {
        return view('project/create');
    }

    public function index()
    {
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getAllProject();

        echo view('project/index', $data);
    }

    public function usrIndex()
    {
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getAllProject();

        echo view('page/project', $data);
    }

    public function save()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[45]',  
            'description' => 'required', 
            'date' => 'required', 
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
            
            $this->projectModel->save([
                'name' => $this->request->getVar('name'),
                'description' => $this->request->getVar('description'),
                'date' => $this->request->getVar('date'),
                'image' => $imageName,
            ]);

            return redirect()->to(base_url('/project'));
        }else{
            return view('project/create');
        }

    }
    public function delete($id)
    {
        $project = $this->projectModel->find($id);
        if($project['image'] != 'default.jpg'){
            unlink('img/' . $project['image']);
        }

        $this->projectModel->delete($id);
        return redirect()->to(base_url('/project'));
    }
    public function edit($id){
        $data = [
            'project' => $this->projectModel->getProjectById($id)
        ];

        return view('project/edit', $data);
    }
    public function update($id){
        $rules = [
            'name' => 'required|min_length[3]|max_length[45]',  
            'description' => 'required',
            'date' => 'required', 
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

            $this->projectModel->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'description' => $this->request->getVar('description'),
                'date' => $this->request->getVar('date'),
                'image' => $imageName,
            ]);
            return redirect()->to(base_url('/project'));
        }else{
            return redirect()->to('/project/edit/'.$id);
        }
    }
}