<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class BlogController extends Controller {
    public function blog() {
        $this->content = $this->render('views/blog/blog.php');
        require_once 'views/layouts/main.php';
    }
    public function blogdetail(){
        $this->content = $this->render('views/blog/blog-details.php');
        require_once 'views/layouts/main.php';
    }
}