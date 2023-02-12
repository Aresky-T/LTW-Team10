<?php
//models/Pagination.php
//Class phân trang
//ý tương của phân trang:
//giả sử trong bảng categories có 36 bản ghi
//và yêu cầu là hiển thị 10 bản ghi trên 1 trang
//-> tổng số trang cần tạo để chứa hết 36 bản ghi
// = ceil(36/10) = 4
//như vậy cần xác định các tham số sau
// - tổng số bản ghi: total
// - số bản ghi trên 1 trang: limit
//url phân trang sẽ có dạng sau, theo mô hình mvc
//index.php?controller=category&action=index&page=3
//- controller xử lý phân trang: controller
//- action xử lý phân trang: action
// - chế độ hiển thị phân trang: full_mode
class Pagination
{
  public $params = [
    'total' => 0,
    'limit' => 0,
    'controller' => '',
    'action' => '',
    'full_mode' => FALSE
  ];

  public function __construct($params) {
    $this->params = $params;
  }

  public function getTotalPage() {
    $total = $this->params['total'] / $this->params['limit'];
    $total = ceil($total);
    return $total;
  }

  public function getCurrentPage() {
    $page = 1;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = $_GET['page'];
      $total_page = $this->getTotalPage();
      if ($page >= $total_page) {
        $page = $total_page;
      }
    }
    return $page;
  }

  public function getPrevPage() {
    $prev_page = '';
    $current_page = $this->getCurrentPage();
    if ($current_page >= 2) {
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      $page = $current_page - 1;
      $prev_url =
        "index.php?controller=$controller&action=$action&page=$page";
      $prev_page = "<li><a href='$prev_url'>Prev</a></li>";
    }
    return $prev_page;
  }

  public function getNextPage() {
    $next_page = '';
    $current_page = $this->getCurrentPage();
    $total_page = $this->getTotalPage();
    if ($current_page < $total_page) {
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      $page = $current_page + 1;
      $next_url =
        "index.php?controller=$controller&action=$action&page=$page";
      $next_page = "<li><a href='$next_url'>Next</a></li>";
    }
    return $next_page;
  }

  public function getPagination() {
    $data = '';
    $total_page = $this->getTotalPage();
    if ($total_page == 1) {
      return '';
    }

    $data .= "<ul class='pagination'>";
    $prev_link = $this->getPrevPage();
    $data .= $prev_link;

    $controller = $this->params['controller'];
    $action = $this->params['action'];

    if ($this->params['full_mode'] == FALSE) {
      for ($page = 1; $page <= $total_page; $page++) {
        $current_page = $this->getCurrentPage();
        if ($page == 1 || $page == $total_page || $page  == $current_page - 1 || $page == $current_page + 1) {
          $page_url = "index.php?controller=$controller&action=$action&page=$page";
          $data .= "<li><a href='$page_url'>$page</a></li>";
        }
        else if ($page == $current_page) {
          $data .= "<li class='active'><a href=''>$page</a></li>";
        }
        else if (in_array($page, [$current_page - 2, $current_page - 3, $current_page + 2, $current_page + 3])){
          $data .= "<li><a href=''>...</a></li>";
        }
      }
    }
    else {
      for ($page = 1; $page <= $total_page; $page++) {
        $current_page = $this->getCurrentPage();
        if ($current_page == $page) {
          $data .= "<li class='active'><a href='#'>$page</a></li>";
        } else {
          $page_url
            = "index.php?controller=$controller&action=$action&page=$page";
          $data .= "<li><a href='$page_url'>$page</a></li>";
        }
      }
    }

    $next_link = $this->getNextPage();
    $data .= $next_link;
    $data .= "</ul>";
    return $data;
  }
}
