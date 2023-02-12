<?php
$username='';

if (isset($_SESSION['user'])){
    $username = $_SESSION['user']['username'];
    $fullname = $_SESSION['user']['fullname'];
    $email = $_SESSION['user']['email'];
    $phone = $_SESSION['user']['phone'];
    $address = $_SESSION['user']['address'];
    $avatar = $_SESSION['user']['avatar'];
}
if (empty($_SESSION['user'])){
        if (isset($_COOKIE['remember'])){
            parse_str($_COOKIE['remember']);
        }
}
?>
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>User profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="container bootstrap snippet">
    <form action="" method="post" enctype=multipart/form-data>
    <div class="row">
        <div class="col-sm-10"><h1><?php echo $username;?></h1></div>
    </div>
    <div class="row">

        <div class="col-sm-3"><!--left col-->
            <div class="text-center">
                <img src="assets/uploads/<?php echo $avatar;?>" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                <input value="assets/uploads/<?php echo $avatar;?>" type="file" name="image" id="image" class="text-center center-block file-upload">
            </div></hr><br>


<!--            <div class="panel panel-default">-->
<!--                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>-->
<!--                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>-->
<!--            </div>-->


<!--            <ul class="list-group">-->
<!--                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>-->
<!--                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>-->
<!--                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>-->
<!--                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>-->
<!--                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>-->
<!--            </ul>-->
<!---->
<!--            <div class="panel panel-default">-->
<!--                <div class="panel-heading">Social Media</div>-->
<!--                <div class="panel-body">-->
<!--                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>-->
<!--                </div>-->
<!--            </div>-->

        </div><!--/col-3-->
        <div class="col-sm-9">
<!--            <ul class="nav nav-tabs">-->
<!--                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>-->
<!--                <li><a data-toggle="tab" href="#messages">Menu 1</a></li>-->
<!--                <li><a data-toggle="tab" href="#settings">Menu 2</a></li>-->
<!--            </ul>-->

            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Full name</h4></label>
                                <input required="required" type="text" class="form-control" name="fullname" id="fullname" placeholder="Full name"
                                       title="enter your last name if any." value="<?php echo $fullname;?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input required="required" type="number" class="form-control" name="phone" id="phone" placeholder="enter phone"
                                       title="enter your phone number if any." value="<?php echo $phone;?>" <>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?php echo $email;?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="address"><h4>Address</h4></label>
                                <input required="required" type="text" name="address" class="form-control" id="address" placeholder="somewhere"
                                       title="enter a location" value="<?php echo $address;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" name="submit" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
<!--                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                        </div>
                    </form>

                    <hr>

                </div><!--/tab-pane-->
            </div><!--/tab-pane-->
        </div><!--/tab-content-->
    </div><!--/col-9-->
    </form>
</div><!--/row-->
                                                      