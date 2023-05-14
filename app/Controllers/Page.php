<?php namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\ProjectModel;

class Page extends BaseController
{
    protected $productModel;
    protected $projectModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->projectModel = new ProjectModel();
    }
    public function index()
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->getAllProduct();
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getAllProject();
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