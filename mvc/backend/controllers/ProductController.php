<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';

class ProductController extends Controller
{
  public function index()
  {
    $product_model = new Product();

    $count_total = $product_model->countTotal();
    $query_additional = '';
    if (isset($_GET['title'])) {
      $query_additional .= '&title=' . $_GET['title'];
    }
    if (isset($_GET['category_id'])) {
      $query_additional .= '&category_id=' . $_GET['category_id'];
    }
    $arr_params = [
        'total' => $count_total,
        'limit' => 10,
        'query_string' => 'page',
        'controller' => 'product',
        'action' => 'index',
        'full_mode' => false,
        'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    $products = $product_model->getAllPagination($arr_params);
    $pagination = new Pagination($arr_params);

    $pages = $pagination->getPagination();

    $category_model = new Category();
    $categories = $category_model->getAll();

    $this->content = $this->render('views/products/index.php', [
        'products' => $products,
        'categories' => $categories,
        'pages' => $pages,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      $category_id = $_POST['category_id'];
      $title = $_POST['title'];
      $price = $_POST['price'];
      $amount = $_POST['amount'];
      $summary = $_POST['summary'];
      $content = $_POST['content'];
      $seo_title = $_POST['seo_title'];
      $seo_description = $_POST['seo_description'];
      $seo_keywords = $_POST['seo_keywords'];
      $status = $_POST['status'];
      if (empty($title)) {
        $this->error = 'Không được để trống title';
      } else if ($_FILES['avatar']['error'] == 0) {
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

        $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
        //làm tròn theo đơn vị thập phân
        $file_size_mb = round($file_size_mb, 2);

        if (!in_array($extension, $arr_extension)) {
          $this->error = 'Cần upload file định dạng ảnh';
        } else if ($file_size_mb > 2) {
          $this->error = 'File upload không được quá 2MB';
        }
      }

      if (empty($this->error)) {
        $filename = '';
        if ($_FILES['avatar']['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/uploads';
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          $filename = time() . '-product-' . $_FILES['avatar']['name'];
          move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
        }
        //save dữ liệu vào bảng products
        $product_model = new Product();
        $product_model->category_id = $category_id;
        $product_model->title = $title;
        $product_model->avatar = $filename;
        $product_model->price = $price;
        $product_model->amount = $amount;
        $product_model->summary = $summary;
        $product_model->content = $content;
        $product_model->seo_title = $seo_title;
        $product_model->seo_description = $seo_description;
        $product_model->seo_keywords = $seo_keywords;
        $product_model->status = $status;
        $is_insert = $product_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Insert dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Insert dữ liệu thất bại';
        }
        header('Location: index.php?controller=product');
        exit();
      }
    }

    $category_model = new Category();
    $categories = $category_model->getAll();

    $this->content = $this->render('views/products/create.php', [
        'categories' => $categories
    ]);
    require_once 'views/layouts/main.php';
  }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=product');
      exit();
    }

    $id = $_GET['id'];
    $product_model = new Product();
    $product = $product_model->getById($id);

    $this->content = $this->render('views/products/detail.php', [
        'product' => $product
    ]);
    require_once 'views/layouts/main.php';
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=product');
      exit();
    }

    $id = $_GET['id'];
    $product_model = new Product();
    $product = $product_model->getById($id);
    if (isset($_POST['submit'])) {
      $category_id = $_POST['category_id'];
      $title = $_POST['title'];
      $price = $_POST['price'];
      $amount = $_POST['amount'];
      $summary = $_POST['summary'];
      $content = $_POST['content'];
      $seo_title = $_POST['seo_title'];
      $seo_description= $_POST['seo_description'];
      $seo_keywords = $_POST['seo_keywords'];
      $status = $_POST['status'];
      if (empty($title)) {
        $this->error = 'Không được để trống title';
      } else if ($_FILES['avatar']['error'] == 0) {
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

        $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
        //làm tròn theo đơn vị thập phân
        $file_size_mb = round($file_size_mb, 2);

        if (!in_array($extension, $arr_extension)) {
          $this->error = 'Cần upload file định dạng ảnh';
        } else if ($file_size_mb > 2) {
          $this->error = 'File upload không được quá 2MB';
        }
      }

      if (empty($this->error)) {
        $filename = $product['avatar'];
        if ($_FILES['avatar']['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/uploads';
          @unlink($dir_uploads . '/' . $filename);
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          $filename = time() . '-product-' . $_FILES['avatar']['name'];
          move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
        }
        $product_model->category_id = $category_id;
        $product_model->title = $title;
        $product_model->avatar = $filename;
        $product_model->price = $price;
        $product_model->amount = $amount;
        $product_model->summary = $summary;
        $product_model->content = $content;
        $product_model->seo_title = $seo_title;
        $product_model->seo_description = $seo_description;
        $product_model->seo_keywords = $seo_keywords;
        $product_model->status = $status;
        $product_model->updated_at = date('Y-m-d H:i:s');

        $is_update = $product_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Update dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Update dữ liệu thất bại';
        }
        header('Location: index.php?controller=product');
        exit();
      }
    }

    $category_model = new Category();
    $categories = $category_model->getAll();

    $this->content = $this->render('views/products/update.php', [
        'categories' => $categories,
        'product' => $product,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=product');
      exit();
    }

    $id = $_GET['id'];
    $product_model = new Product();
    $is_delete = $product_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa dữ liệu thành công';
    } else {
      $_SESSION['error'] = 'Xóa dữ liệu thất bại';
    }
    header('Location: index.php?controller=product');
    exit();
  }

  public function statisticView() {
      $product_model = new Product;
      $orders = $product_model->getAllOrder();
      $i = 0;
      foreach ($orders AS $order) {
          $order_id = $order['id'];
          $products[$i] = $product_model->getProductName($order_id);
          $i++;
      }
      $total = $product_model->getTotal();
      $this->content = $this->render('views/products/statistic_view.php', [
          'orders' => $orders,
          'products' => $products,
          'total' => $total


      ]);
      require_once 'views/layouts/main.php';
  }

  public function viewTodayStatistic() {
      $product_model = new Product;
      $orders = $product_model->getAllOrderToday();
      $i = 0;
      foreach ($orders AS $order) {
          $order_id = $order['id'];
          $products[$i] = $product_model->getProductName($order_id);
          $i++;
      }
      $total = $product_model->getTotalDay();
      if (empty($products)) $products = '';

      $this->content = $this->render('views/products/statistic_view.php', [
          'orders' => $orders,
          'products' => $products,
          'total' => $total
      ]);
      require_once 'views/layouts/main.php';
  }

  public function viewMonthStatistic() {
      $product_model = new Product;
      $orders = $product_model->getAllOrderMonth();
      $i = 0;
      $total = 0;
      foreach ($orders AS $order) {
          $order_id = $order['id'];
          $products[$i] = $product_model->getProductName($order_id);
          $i++;
      }
      $total = $product_model->getTotalMonth();
      if (empty($products)) $products = '';

      $this->content = $this->render('views/products/statistic_view.php', [
          'orders' => $orders,
          'products' => $products,
          'total' => $total
      ]);
      require_once 'views/layouts/main.php';
  }

}