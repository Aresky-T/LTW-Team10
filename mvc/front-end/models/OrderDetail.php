<?php
require_once 'models/Model.php';

class OrderDetail extends Model
{
    public $order_id;
    public $product_id;
    public $quantity;
    public $price;

    public function insert()
    {
        $sql_insert = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES(:order_id, 
:product_id, :quantity, :price)";
        $obj_insert = $this->connection->prepare($sql_insert);
                $inserts = [
            ':order_id' => $this->order_id,
            ':product_id' => $this->product_id,
            ':quantity' => $this->quantity,
            ':price' => $this->price,
        ];

        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }
}