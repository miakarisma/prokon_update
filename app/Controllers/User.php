<?php namespace App\Controllers;
use App\Models\FrontPageModel;
use App\Models\CategoryModel;
use App\Models\RoomModel;
use App\Models\ProductModel;
use App\Models\ProjectModel;
use App\Models\AboutUsModel;
use App\Models\OurTeamModel;
use App\Models\WorkshopModel;
use App\Models\ContactUsModel;

class User extends BaseController
{
    protected $frontPageModel;
    protected $categoryModel;
    protected $roomModel;
    protected $productModel;
    protected $projectModel;
    protected $aboutUsModel;
    protected $contactUsModel;

    public function __construct()
    {
        $this->frontPageModel = new FrontPageModel();
        $this->categoryModel = new CategoryModel();
        $this->roomModel = new RoomModel();
        $this->productModel = new ProductModel();
        $this->projectModel = new ProjectModel();
        $this->aboutUsModel = new AboutUsModel();
        $this->contactUsModel = new ContactUsModel();
    }

    public function index()
    {
        $aboutUsModel = new AboutUsModel();
        $data['aboutUs'] = $aboutUsModel->getAllAboutUs();
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

    public function ecommerce()
    {
        $frontPageModel = new FrontPageModel();
        $data['frontPage'] = $frontPageModel->getAllFrontPage();
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->getAllCategoryDesc();
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getAllRoom();
        $productModel = new ProductModel();
        $data['product'] = $productModel->getAllProduct();
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/store', $data);
    }

    public function project()
    {
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getAllProject();
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/project', $data);
    }

    public function about()
    {
        $aboutUsModel = new AboutUsModel();
        $data['aboutUs'] = $aboutUsModel->getAllAboutUs();
        $ourTeamModel = new OurTeamModel();
        $data['ourTeam'] = $ourTeamModel->getAllOurTeam();
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/about-us', $data);
    }

    public function contactUs()
    {
        $data['product_name'] = "";
        $data['product_price'] = "";
        $data['quantity'] = "";

        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/contact-us', $data);
    }

    public function service()
    {
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();
        return view ('Page/service', $data);
    }

    public function workshop()
    {
        $frontPageModel = new FrontPageModel();
        $data['frontPage'] = $frontPageModel->getAllFrontPage();
        $workshopModel = new WorkshopModel();
        $data['workshop'] = $workshopModel->getAllWorkshop();
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/work', $data);
    }
    public function design()
    {
        $frontPageModel = new FrontPageModel();
        $data['frontPage'] = $frontPageModel->getAllFrontPage();
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->getAllCategory();
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getAllRoom();
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getAllProjectDesc();
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/design', $data);
    }
    

    public function projectDesc($id)
    {
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->getProjectById($id);
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/desc/project', $data);
    }
    public function roomDesc($id)
    {
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getRoomById($id);
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/desc/room', $data);
    }
    public function productDesc($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->getProductById($id);
        $contactUsModel = new ContactUsModel();
        $data['contactUs'] = $contactUsModel->getAllContactUs();

        echo view('page/desc/product', $data);
    }
    public function cat($id){
        $productModel = new ProductModel();
        $data['product'] = $productModel->getProductByCat($id);
        echo json_encode($data['product']);
    }
}