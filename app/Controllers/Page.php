<?php namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\ProjectModel;
use App\Models\ContactUsModel;

class Page extends BaseController
{
    protected $productModel;
    protected $projectModel;
    protected $contactUsModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->projectModel = new ProjectModel();
        $this->contactUsModel = new ContactUsModel();
    }
    public function index()
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->getAllProduct();
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getAllProject();
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();
        echo view('Page/index', $data);
    }

    public function login()
    {
        return view('Page/login');
    }

    public function about()
    {
        return view ('Page/about-us');
    }

    public function project()
    {
        return view ('Page/project');
    }

    public function service()
    {
        return view ('Page/service');
    }

}