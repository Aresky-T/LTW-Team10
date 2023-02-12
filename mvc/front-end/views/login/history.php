<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Order code</th>
        <th scope="col">Product</th>
        <th scope="col">Date</th>
        <th scope="col">Total pay</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($orders)):?>
    <?php foreach ($orders AS $order):?>
    <tr>
        <th scope="row"><?php echo "#".$order['id'];?></th>
        <td><?php foreach ($products AS $key => $product)
            foreach($product AS $k => $value):;?>
        <?php if($value['order_id']==$order['id']) echo $value['title']." x ".$value['quantity']."<br>";

        ?>
        <?php endforeach;?>
        </td>
        <td><?php echo $order['created_at'];?></td>
        <td><?php echo number_format($order['price_total']);?></td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>

    </tbody>
</table>