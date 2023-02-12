<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
    public function cod()
    {
        //xóa thông tin giỏ hàng đi
        unset($_SESSION['cart']);
        $this->content = $this->render('views/payments/thank.php');
        echo $this->content;
    }
    public function order() {
        //Xử lý submit form để lưu vào bảng order và order_details
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        //Kiểm tra nếu user submit form thì mới xử lý
        if (isset($_POST['submit'])) {
            $id = $_SESSION['user']['id'];
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            //Do đã set checked cho radio COD, nên có thể gắn giá trị như bình thường
            $method = $_POST['method'];
            //Validate form:
            //Fullname, address, mobile không được để trống
            //Fullname phải ít nhất 3 kí tự: strlen
            //Email phải đúng định dạng: filter_var
            if (empty($fullname)||empty($address)||empty($mobile)){
                $this->error = "Phải nhập fullname, address, mobile";
                echo $id;
            } elseif (strlen($fullname) < 3) {
                $this->error = "Fullname ít nhất 3 ký tự";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->error = "Email chưa đúng định dạng";
            }

            //Nếu không có lỗi thì sẽ lưu thông tin đơn hàng
            if (empty($this->error)){
                //Lưu các thông tin vào bảng orders trước:
                //+ lưu vào bảng order_details sau
                //+ Lưu vào bảng orders:
                $order_model = new Order();
                //Gán giá trị cho thuộc tính của model
                $order_model->user_id = $id;
                $order_model->fullname = $fullname;
                $order_model->address = $address;
                $order_model->mobile = $mobile;
                $order_model->email = $email;
                $order_model->note = $note;
                //Trường price_total
                $price_total = 0;
                foreach ($_SESSION['cart'] AS $cart){
                    $total_item = $cart['quantity'] * $cart['price'];
                    $price_total += $total_item;
                }
                $order_model->price_total = $price_total;
                //Trường payment_status, mặc định đơn hàng mới sẽ là chưa thanh toán
                $order_model->payment_status = 0;
                $order_id = $order_model->insertOrder();
                var_dump($order_id);
                //+ Lưu vào bảng order details: chứa chi tiết đơn hàng
                $order_detail_model = new OrderDetail();
                $order_detail_model->order_id = $order_id;
                foreach($_SESSION['cart'] AS $product_id => $cart){
                    $order_detail_model->product_id = $product_id;
                    $order_detail_model->quantity = $cart['quantity'];
                    $order_detail_model->price = $cart['price'];
                    $is_insert = $order_detail_model->insert();
                    var_dump($is_insert);
                }

                //+ Điều hướng user dựa vào phương thức thanh toán mà họ chọn
                //+ Nếu chọn thanh toán online -> trang Ngân lượng
                if ($method == 1) {
                    //Tạo session chứa thông tin để hiển thị ở trang ngân lượng
                    $_SESSION['payment'] =[
                        'price_total' => $price_total,
                        'fullname' => $fullname,
                        'email' => $email,
                        'mobile' => $mobile,
                    ];
                    header('Location: index.php?controller=payment&action=online');
                }
                else{
                    //Là thanh toán COD
                    $_SESSION['payment'] =[
                        'price_total' => $price_total,
                        'fullname' => $fullname,
                        'address' => $address,
                        'mobile' => $mobile,
                    ];
                    header('Location: index.php?controller=payment&action=cod');
//
                }

            }
        }

        //Lấy view
        $this->content = $this->render('views/payments/checkout.php');
        //Gọi layout để hiển thị
        require_once 'views/layouts/main.php';
    }
    public function online(){
        $this->content = $this->render('libraries/nganluong/index.php');
        //Ko gọi layout mà hiển thị ra view luôn
        echo $this->content;
    }

}