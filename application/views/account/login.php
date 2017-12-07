<!-- breadcrumbs start-->
<section style="background-image:url('static/pic/breadcrumbs/bg-1.jpg');" class="breadcrumbs">
    <div class="container">
        <div class="text-center breadcrumbs-item">
            <h1>Login</h1><a href="#">home</a><i class="fa fa-angle-right"></i><a href="#">Accounts</a><i
                    class="fa fa-angle-right"></i><a href="#">Login</a>
        </div>
    </div>
</section>
<!-- ! breadcrumbs end-->
<div class="container">
    <div class="row">
        <!-- content-->
        <div class="col-md-8 col-md-offset-4 mb-md-70">
            <form name="checkout" method="post" action="<?php echo site_url('/Account/login'); ?>" enctype="multipart/form-data"
                  class="checkout woocommerce-checkout">
                <div class="col-1 mb-sm-50">
                    <div class="billing-wrapper">
                        <div class="woocommerce-billing-fields">
                            <p class="form-row form-row-wide address-field validate-required">
                                <label for="username">Username<abbr title="required"
                                                                    class="required">*</abbr></label>
                                <input id="username" type="text" name="username"
                                       placeholder="Enter your Username" value="">
                            </p>
                            <p class="form-row form-row-wide address-field validate-required">
                                <label for="password">Password<abbr title="required"
                                                                    class="required">*</abbr></label>
                                <input id="password" type="password" name="password"
                                       placeholder="Enter your password" value="">
                            </p>
                        </div>
                        <div class="remember">
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" value="None" name="check">
                                <label for="checkbox3">Remember Me</label>
                                <a href="#">Forget Password ?</a>
                            </div>
                        </div>
                        <div class="place-order">
                            <input id="login" type="submit" name="login"
                                   value="Login" class="cws-button full-width alt">
                        </div>
                        <p class="mb-20">No account yet ?<a href="<?php echo site_url('/Account/register'); ?>">Register now !</a></p>
                    </div>
                </div>
            </form>
        </div>
        <!-- ! content-->
    </div>
</div>
