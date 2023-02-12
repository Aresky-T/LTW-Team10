<?php
require_once 'models/Model.php';
class Order extends Model {

    public $id;
    public $user_id;
    public $fullname;
    public $address;
    public $mobile;
    public $email;
    public $note;
    public $price_total; //Tổng giá trị đơn hàng
    public $payment_status;//0 - chưa TT, 1 - Đã TT
    public function insertOrder(){
        $sql_insert = "INSERT INTO orders(user_id, fullname, address, mobile, email, note, price_total, payment_status) 
        VALUES (:user_id,:fullname,:address, :mobile, :email, :note, :price_total, :payment_status)";
        $obj_insert= $this->connection->prepare($sql_insert);
        $arr_insert = [
            ':user_id' => $this->user_id,
            ':fullname' => $this->fullname,
            ':address' => $this->address,
            ':mobile' => $this->mobile,
            ':email' => $this->email,
            ':note' => $this->note,
            ':price_total' => $this->price_total,
            ':payment_status' => $this->payment_status,
        ];
        $obj_insert->execute($arr_insert);
        $id_insert = $this->connection->lastInsertId();
        return $id_insert;
    }
}
