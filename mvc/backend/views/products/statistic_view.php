<style>
    .history-order {
        margin-top: 30px;
    }
    table, td, th, thead {
        border: 1px solid black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    /*}*/
</style>




<a class="btn btn-primary" href="index.php?controller=product&action=viewTodayStatistic" role="button">Doanh thu hôm nay</a>
<a class="btn btn-primary" href="index.php?controller=product&action=viewMonthStatistic" role="button">Doanh thu tháng này</a>
<?php if (empty($orders)): ?>
    <p id="result" style="color: red; margin-top: 10px">Hôm nay chưa bán được mặt hàng nào :((</p>
<?php endif;?>
<div class="history-order">
    <table class="table">
<!--        <thead>-->

<!--        </thead>-->
        <tbody>
        <tr>
            <th scope="col">Order code</th>
            <th scope="col">Product</th>
            <th scope="col">Date</th>
            <th scope="col">Total</th>
        </tr>
        <?php if (!empty($orders)): ?>
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $total ?></td>
            </tr>
        </tbody>
    </table>
</div>
