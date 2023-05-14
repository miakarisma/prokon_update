<?php namespace App\Controllers;
use App\Models\FrontPageModel;
use App\Models\CategoryModel;
use App\Models\RoomModel;
use App\Models\ProductModel;
use App\Models\ProjectModel;
use App\Models\ContactUsModel;

class User extends BaseController
{
    protected $frontPageModel;
    protected $categoryModel;
    protected $roomModel;
    protected $productModel;
    protected $projectModel;
    protected $contactUsModel;

    public function __construct()
    {
        $this->frontPageModel = new FrontPageModel();
        $this->categoryModel = new CategoryModel();
        $this->roomModel = new RoomModel();
        $this->productModel = new ProductModel();
        $this->projectModel = new ProjectModel();
        $this->contactUsModel = new ContactUsModel();
    }

    public function ecommerce()
    {
        $frontPageModel = new FrontPageModel();
        $data['frontPage'] = $frontPageModel->getAllFrontPage();
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->getAllCategory();
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getAllRoom();
        $productModel = new ProductModel();
        $data['product'] = $productModel->getAllProduct();

        echo view('page/store', $data);
    }

    public function project()
    {
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getAllProject();

        echo view('page/project', $data);
    }

    public function index()
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->getAllProduct();
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getAllProject();
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();
        $frontPageModel = new FrontPageModel();
        $data['frontPage'] = $frontPageModel->getAllFrontPage();
        echo view('Page/index', $data);
    }
    public function contactUs()
    {
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/contact-us', $data);
    }
    public function workshop()
    {
        $frontPageModel = new FrontPageModel();
        $data['frontPage'] = $frontPageModel->getAllFrontPage();
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/work', $data);
    }
}