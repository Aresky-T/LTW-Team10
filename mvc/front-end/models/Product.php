<?php
require_once 'models/Model.php';
class Product extends Model {

  public function getProduct($params = []) {
    $str_filter = '';
    if (isset($params['category'])) {
      $str_category = $params['category'];
      $str_filter .= " AND categories.id IN $str_category";
    }
    if (isset($params['price'])) {
      $str_price = $params['price'];
      $str_filter .= " AND $str_price";
    }
    $sql_select = "SELECT products.*, categories.name 
          AS category_name FROM products
          INNER JOIN categories ON products.category_id = categories.id
          WHERE products.status = 1 $str_filter";

    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();

    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
    public function getAllPagination($arr_params){
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $str_filter = '';
        if (!empty($arr_params['query'])) {
            $str = $arr_params['query'];
            $str_filter .= "$str";
        }
        $obj_select = $this->connection->prepare("SELECT products.*, categories.name 
          AS category_name FROM products
          INNER JOIN categories ON products.category_id = categories.id
          WHERE products.status = 1 $str_filter LIMIT $start, $limit");
        $obj_select->execute();
        $products = $obj_select->fetchAll();
        return $products;
    }

  public function getById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id");

    $obj_select->execute();
    $product =  $obj_select->fetch(PDO::FETCH_ASSOC);
    return $product;
  }
    public function getPopular()
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.* FROM products
                        WHERE products.id IN (SELECT product_id FROM order_details GROUP BY product_id HAVING COUNT(product_id) > 1)
                        ORDER BY products.created_at DESC");
        $obj_select->execute();
        $popular = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $popular;
    }
  public  function getProductByID($product_id){
      $sql_select_one = "SELECT * FROM products WHERE id = $product_id";
      $obj_select_one = $this->connection->prepare($sql_select_one);
      $obj_select_one->execute();
      $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
      return $product;
  }
  public function countFilter($params = []){
      if(isset($params['price'])){
          $str = $params['price'];
      } elseif (isset($params['category'])){
          $str = $params['category'];
      } elseif (isset($params['price']) && isset($params['category'])){
          $str = $params['price'].$params['category'];
      }
      $obj_select = $this->connection->prepare("SELECT COUNT(products.id) FROM products 
  INNER JOIN categories ON products.category_id = categories.id WHERE products.status = 1 $str");
      $obj_select->execute();
      return $obj_select->fetchColumn();
  }
  public function countTotal(){
      $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products");
      $obj_select->execute();
      return $obj_select->fetchColumn();
  }
  public function countSearch($str)
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(products.id) FROM products 
  INNER JOIN categories ON products.category_id = categories.id WHERE products.status = 1 $str");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
  public function search($str_search, $arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_search = $this->connection->prepare("SELECT * FROM products WHERE products.status = 1 
        $str_search LIMIT $start, $limit");
        $obj_search->execute();
        return $obj_search->fetchAll();
    }
}

