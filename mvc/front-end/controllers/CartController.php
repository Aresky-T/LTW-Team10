<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
    public function delete(){
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
        $_SESSION['success'] = "Delete succesfully";
        header('Location: cart.html');
        exit();
    }

    public function add(){
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        $product_id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model -> getProductByID($product_id);
        $cart_item = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart_item;
        } else {
            if (array_key_exists($product_id, $_SESSION['cart'])){
            $_SESSION['cart'][$product_id]['quantity']++;
            } else $_SESSION['cart'][$product_id] = $cart_item;
        }
        echo "<pre>";
     print_r($_SESSION);
    echo "</pre>";

    }

    public function index(){
//        echo"<pre>";
//        print_r($_SESSION['cart']);
//        echo"</pre>";
        if(isset($_POST['submit'])){
            foreach($_SESSION['cart'] AS $product_id => $cart) {
                $_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
            }
                $_SESSION['success'] = "Update cart successfully";
        }
        $this->content = $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';
    }

}