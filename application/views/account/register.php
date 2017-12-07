<!-- breadcrumbs start-->
<section style="background-image:url('static/pic/breadcrumbs/bg-1.jpg');" class="breadcrumbs">
    <div class="container">
        <div class="text-center breadcrumbs-item">
            <h1>Register</h1><a href="#">home</a><i class="fa fa-angle-right"></i><a href="#">Accounts</a><i
                    class="fa fa-angle-right"></i><a href="#">Register</a>
        </div>
    </div>
</section>
<!-- ! breadcrumbs end-->
<div class="container">
    <div class="row">
        <!-- content-->
        <div class="col-md-8 col-md-offset-4 mb-md-70">
            <form name="checkout" method="post" action="<?php echo site_url('/Account/register'); ?>"
                  enctype="multipart/form-data"
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
                            <p class="form-row form-row-wide address-field validate-required">
                                <label for="email">Email<abbr title="required"
                                                                 class="required">*</abbr></label>
                                <input id="email" type="text" name="email"
                                       placeholder="Enter your email" value="">
                            </p>
                        </div>
                        <input id="register" type="submit"
                               value="Register" class="cws-button full-width alt">
                    </div>
                </div>
            </form>
        </div>
        <!-- ! content-->
    </div>
</div>
