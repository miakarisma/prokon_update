<?php namespace App\Controllers;
use App\Models\FrontPageModel;
use App\Models\CategoryModel;
use App\Models\RoomModel;
use App\Models\ProductModel;

class Ecommerce extends BaseController
{
    protected $frontPageModel;
    protected $categoryModel;
    protected $roomModel;
    protected $productModel;

    public function __construct()
    {
        $this->frontPageModel = new FrontPageModel();
        $this->categoryModel = new CategoryModel();
        $this->roomModel = new RoomModel();
        $this->productModel = new ProductModel();
    }

    public function index()
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
}