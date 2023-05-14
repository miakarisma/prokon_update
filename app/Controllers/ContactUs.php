<?php namespace App\Controllers;
use App\Models\ContactUsModel;

class ContactUs extends BaseController
{
    protected $contactUsModel;

    public function __construct()
    {
        $this->contactUsModel = new ContactUsModel();
    }

    public function index()
    {
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('contactUs/index', $data);
    }

    public function usrIndex()
    {
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/contact-us', $data);
    }

    public function create()
    {
        return view('contactUs/create');
    }

    public function save()
    {
        // dd( $this->request->getVar('location'));
        $rules = [
            'name' => 'required|max_length[45]',  
            'phone' => 'required|max_length[45]', 
            'location' => 'required|max_length[45]',
            'website' => 'required|max_length[45]',
            'whatsapp' => 'required|max_length[45]',
            'instagram' => 'required|max_length[45]',
            'facebook' => 'required|max_length[45]',
            'email' => 'required|max_length[45]',
            'message' => 'required',
        ];
        if($this->request->is('post') && $this->validate($rules))
        {
            $this->contactUsModel->save([
                'name' => $this->request->getVar('name'),
                'phone' => $this->request->getVar('phone'),
                'location' => $this->request->getVar('location'),
                'website' => $this->request->getVar('website'),
                'whatsapp' => $this->request->getVar('whatsapp'),
                'instagram' => $this->request->getVar('instagram'),
                'facebook' => $this->request->getVar('facebook'),
                'email' => $this->request->getVar('email'),
                'message' => $this->request->getVar('message'),
            ]);

            return redirect()->to(base_url('/contactUs'));
        }else{
            return view('contactUs/create');
        }

    }
    public function delete($id)
    {
        $contactUs = $this->contactUsModel->find($id);
        if($contactUs['image'] != 'default.jpg'){
            unlink('img/' . $contactUs['image']);
        }

        $this->contactUsModel->delete($id);
        return redirect()->to(base_url('/contactUs'));
    }
    public function edit($id){
        $data = [
            'contactUs' => $this->contactUsModel->getContactUsById($id)
        ];

        return view('contactUs/edit', $data);
    }
    public function update($id){
        $rules = [
            'name' => 'required|max_length[45]',  
            'phone' => 'required|max_length[45]', 
            'location' => 'required|max_length[45]',
            'website' => 'required|max_length[45]',
            'whatsapp' => 'required|max_length[45]',
            'instagram' => 'required|max_length[45]',
            'facebook' => 'required|max_length[45]',
            'email' => 'required|max_length[45]',
            'message' => 'required',
        ];
        if($this->request->is('post') && $this->validate($rules))
        {
            $this->contactUsModel->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'phone' => $this->request->getVar('phone'),
                'location' => $this->request->getVar('location'),
                'website' => $this->request->getVar('website'),
                'whatsapp' => $this->request->getVar('whatsapp'),
                'instagram' => $this->request->getVar('instagram'),
                'facebook' => $this->request->getVar('facebook'),
                'email' => $this->request->getVar('email'),
                'message' => $this->request->getVar('message'),
            ]);
            return redirect()->to(base_url('/contactUs'));
        }else{
            return redirect()->to('/contactUs/edit/'.$id);
        }
    }
}