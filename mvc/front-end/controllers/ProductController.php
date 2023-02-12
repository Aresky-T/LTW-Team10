<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class ProductController extends Controller {
  public function showAll() {
//    echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//    print_r($_REQUEST);
//    echo "</pre>";
//    die;
    $params = [];
      $str_price = '';
      $str_category = '';
      $product_model = new Product();
    if (isset($_GET['filter'])) {
      if (isset($_GET['category'])) {
        $params['category'] = $_GET['category'];
          $array = explode(' ', $_GET['category']);
          foreach ($array AS $category) {
              if ($category == 1) {
                  $str_category .= " AND categories.id = 1";
              }
              if ($category == 2) {
                  $str_category .= " AND categories.id = 2";
              }
              if ($category == 3) {
                  $str_category .= " AND categories.name LIKE 'BULOVA'";
              }
              if ($category == 4) {
                  $str_category .= " AND categories.name LIKE 'ROLEX'";
              }
          }
          $params['category'] = $str_category;
      }

      if (isset($_GET['price'])) {
          $array = explode(' ', $_GET['price']);
        foreach ($array AS $price) {
          if ($price == 1) {
            $str_price .= " AND products.price < 1000000";
          }
          if ($price == 2) {
            $str_price .= " AND (products.price >= 1000000 AND products.price < 5000000)";
          }
          if ($price == 3) {
            $str_price .= " AND (products.price >= 5000000 AND products.price < 10000000)";
          }
          if ($price == 4) {
              $str_price .= " AND (products.price >= 10000000 AND products.price < 20000000)";
          }
        }
        //cắt bỏ từ khóa OR ở vị trí ban đầu
//        $str_price = substr($str_price, 3);
//        $str_price = "($str_price)";
        $params['price'] = $str_price;
      }
    }

    if (isset($_GET['price']) || isset($_GET['category'])) {
        $count = $product_model->countFilter($params);
    } else {
        $count = $product_model->countTotal();
    }
//    echo $count;
    $price = '';
    $filter = '';
    $category = '';
    if (isset($_GET['filter'])) {
        $filter = $_GET['filter'];
        if (isset($_GET['price'])){
            $price = $_GET['price'];
        } elseif (isset($_GET['category'])){
            $category = $_GET['category'];
        } elseif (isset($_GET['category'])&& isset($_GET['price'])){
            $category = $_GET['category'];
            $price = $_GET['price'];
        }
    }
    $params_pagination = [
      'total' => $count,
      'limit' => 6,
      'controller' => 'product',
      'action' => 'showAll',
      'page' =>  isset($_GET['page']) ? $_GET['page'] : 1,
      'full_mode' => FALSE,
        'query' => $str_price.$str_category,
        'category' => "$category",
        'price' => "$price",
        'filter' => "$filter"
    ];
//    echo"<pre>";
//    print_r($params_pagination);
//    echo"</pre>";

//    if (isset($_POST)){
//        $products = $product_model->getProductFilter($params);
//    }
//    else {
        $products = $product_model->getAllPagination($params_pagination);
//    }

    //xử lý phân trang
    $pagination_model = new Pagination($params_pagination);
    $pagination = $pagination_model->getPagination();
    //get products


    //get categories để filter
    $category_model = new Category();
    $categories = $category_model->getAll();

    $this->content = $this->render('views/products/shop.php', [
      'products' => $products,
      'categories' => $categories,
      'pagination' => $pagination
    ]);

    require_once 'views/layouts/main.php';
  }

  public function detail() {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID ko hợp lệ';
      $url_redirect = $_SERVER['SCRIPT_NAME'] . '/';
      header("Location: $url_redirect");
      exit();
    }

//      echo"<pre>";
//      print_r($_SESSION['cart']);
//      echo"</pre>";
//
//    echo"<pre>";
//    print_r($_POST);
//    echo"</pre>";
      $id = $_GET['id'];
      $product_model = new Product();
      $product = $product_model -> getProductByID($id);
          $cart = [
              'name' => $product['title'],
              'price' => $product['price'],
              'avatar' => $product['avatar'],
              'quantity' => 0
          ];

      if (!isset($_SESSION['cart'])){
          $_SESSION['cart'][$id] = $cart;
      } else{
          if(isset($_POST['quantity'])){
              $_SESSION['success'] = "Add to cart successfully";
              if (array_key_exists($id, $_SESSION['cart'])){
                  $_SESSION['cart'][$id]['quantity']+= $_POST['quantity'];
              } else $_SESSION['cart'][$id] = $cart;
          } else { $_POST['quantity'] = 0;}
      }


      $this->content = $this->render('views/products/products_detail.php',[
      'product' => $product
    ]);
    require_once 'views/layouts/main.php';
  }
  public function search(){
      $product_model = new Product();
      if(isset($_POST['search'])) $_SESSION['search'] = $_POST['search'];
      $str = $_SESSION['search'];
      $str_search = "AND products.title LIKE'%".$str."%'";
//      echo $str_search;
      $count = $product_model->countSearch($str_search);
      $params_pagination = [
          'total' => $count,
          'limit' => 6 ,
          'controller' => 'product',
          'action' => 'search',
          'page' =>  isset($_GET['page']) ? $_GET['page'] : 1,
          'full_mode' => FALSE,
          'query' => '',
          'category' => '',
          'price' => '',
          'filter' => ''
      ];
      $pagination_model = new Pagination($params_pagination);
      $pagination = $pagination_model->getPagination();
      $products = $product_model->search($str_search, $params_pagination);
      $this->content = $this->render('views/products/search.php',[
          'products' => $products,
          'pagination' => $pagination
      ]);
      require_once 'views/layouts/main.php';
  }
}