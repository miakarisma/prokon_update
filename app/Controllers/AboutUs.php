<?php namespace App\Controllers;
use App\Models\AboutUsModel;
use App\Models\OurTeamModel;

class AboutUs extends BaseController
{
    protected $aboutUsModel;

    public function __construct()
    {
        $this->aboutUsModel = new AboutUsModel();
    }

    public function index()
    {
        $aboutUsModel = new AboutUsModel();
        $data['aboutUs'] = $aboutUsModel->getAllAboutUs();
        $ourTeamModel = new OurTeamModel();
        $data['ourTeam'] = $ourTeamModel->getAllOurTeam();

        echo view('aboutUs/index', $data);
    }

    public function create()
    {
        return view('aboutUs/create');
    }

    public function save()
    {
        // dd( $this->request->getVar('text_paragraph'));
        $rules = [
            'text_header' => 'required|max_length[45]',  
            'text_span' => 'required|max_length[45]', 
            'text_paragraph' => 'required', 
        ];
        if($this->request->is('post') && $this->validate($rules))
        {
            $this->aboutUsModel->save([
                'text_header' => $this->request->getVar('text_header'),
                'text_span' => $this->request->getVar('text_span'),
                'text_paragraph' => $this->request->getVar('text_paragraph'),
            ]);

            return redirect()->to(base_url('/aboutUs'));
        }else{
            return view('aboutUs/create');
        }

    }
    public function delete($id)
    {
        $aboutUs = $this->aboutUsModel->find($id);
        if($aboutUs['image'] != 'default.jpg'){
            unlink('img/' . $aboutUs['image']);
        }

        $this->aboutUsModel->delete($id);
        return redirect()->to(base_url('/aboutUs'));
    }
    public function edit($id){
        $data = [
            'aboutUs' => $this->aboutUsModel->getAboutUsById($id)
        ];

        return view('aboutUs/edit', $data);
    }
    public function update($id){
        $rules = [
            'text_header' => 'required|max_length[45]',  
            'text_span' => 'required|max_length[45]', 
            'text_paragraph' => 'required', 
        ];
        if($this->request->is('post') && $this->validate($rules))
        {
            $this->aboutUsModel->save([
                'id' => $id,
                'text_header' => $this->request->getVar('text_header'),
                'text_span' => $this->request->getVar('text_span'),
                'text_paragraph' => $this->request->getVar('text_paragraph'),
            ]);
            return redirect()->to(base_url('/aboutUs'));
        }else{
            return redirect()->to('/aboutUs/edit/'.$id);
        }
    }
}