<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /*body {*/
        /*color: #fff;*/
        /*background: #63738a;*/
        /*font-family: 'Roboto', sans-serif;*/
    /*}*/
    .form-control {
        height: 40px;
        box-shadow: none;
        color: #969fa4;
    }
    .form-control:focus {
        border-color: #5cb85c;
    }
    .form-control, .btn {
        border-radius: 3px;
    }
    .signup-form {
        width: 100%;
        margin: 0 auto;
        padding: 30px 0;
        font-size: 15px;
    }
    .signup-form h2 {
        color: #636363;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }
    .signup-form h2:before, .signup-form h2:after {
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        top: 50%;
        z-index: 2;
    }
    .signup-form h2:before {
        left: 0;
    }
    .signup-form h2:after {
        right: 0;
    }
    .signup-form .hint-text {
        color: #999;
        margin-bottom: 30px;
        text-align: center;
    }
    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form .form-group {
        margin-bottom: 20px;
    }
    .signup-form input[type="checkbox"] {
        margin-top: 3px;
    }
    .signup-form .btn {
        font-size: 16px;
        font-weight: bold;
        min-width: 140px;
        outline: none !important;
    }
    .signup-form .row div:first-child {
        padding-right: 10px;
    }
    .signup-form .row div:last-child {
        padding-left: 10px;
    }
    .signup-form a {
        color: red;
        text-decoration: underline;
    }
    .signup-form a:hover {
        text-decoration: none;
    }
    .signup-form form a {
        color: #5cb85c;
        text-decoration: none;
    }
    .signup-form form a:hover {
        text-decoration: underline;
    }
</style>
<div class="signup-form">
    <form action="" method="post">
        <h2>Register</h2>
        <p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
            <input type="text" id="username" placeholder="Username" name="username" class="form-control" required="required">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" id="password_confirm" class="form-control" name="password_confirm" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
            <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Register Now" class="btn btn-success btn-lg btn-block">
<!--            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>-->
        </div>
    </form>
    <div class="text-center">Already have an account? <a href="login.html">Sign in</a></div>
<!--</div>-->
<!--<form action="" method="post">-->
<!--                    <div class="form-group">-->
<!--                        <label for="username">Username</label>-->
<!--                        <input type="text" id="username" name="username" class="form-control">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="password">Password</label>-->
<!--                        <input type="password" id="password" name="password" class="form-control">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="confirm-password">Confirm password</label>-->
<!--                        <input type="password" id="password_confirm" name="password_confirm" class="form-control">-->
<!--                    </div>-->
<!--                    <input type="submit" name="submit" value="Register Now" class="btn btn-primary">-->
<!--                    <p>-->
<!--                        Đã có tài khoản, <a href="index.php?controller=user&action=login" style="color: #0b0b0b">Đăng nhập</a>-->
<!--                    </p>-->
<!--</form>-->
