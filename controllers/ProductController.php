<?php
class ProductController extends BaseController
{
    private $productModel;
    public function __construct() {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }
    public function index() {

  
        $pageTitle = 'Danh sách sản phẩm';
        $products = $this->productModel->getAllProduct(['id', 'name','price']);
         $this->view('frontend.products.index', [
            'pageTitle' => $pageTitle,
            'products' => $products,
        ]);
    }
    public function show() {
       $product = $this->productModel->findByID(1);
       
        return $this->view('frontend.products.show', [
            'product' => $product
        ]);
        
    }
    
}