<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class HomeController extends Controller {
  public function index() {
    $product_model = new Product();
    $products = $product_model->getPopular();
    $this->content = $this->render('views/homes/index.php', [
      'products' => $products
    ]);
    require_once 'views/layouts/main.php';
  }
}