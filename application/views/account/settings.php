<!-- breadcrumbs start-->
<section style="background-image:url('static/pic/breadcrumbs/bg-1.jpg');" class="breadcrumbs">
    <div class="container">
        <div class="text-center breadcrumbs-item">
            <h1>Me</h1><a href="#">home</a><i class="fa fa-angle-right"></i><a href="#">accounts</a><i
                    class="fa fa-angle-right"></i><a href="#">Me</a>
        </div>
    </div>
</section>
<!-- ! breadcrumbs end-->

<!-- ! header page-->
<div class="content-body page">
    <div class="container">
        <div class="row">
            <!-- content-->
            <div class="col-md-8 mb-md-70">
                <div id="customer_details" class="col2-set">
                    <form name="checkout" method="post" action="<?php echo site_url('/Account/settings'); ?>"
                          enctype="multipart/form-data"
                          class="checkout woocommerce-checkout">
                        <div class="col-1 mb-sm-50">
                            <h3 class="mt-0 mb-30">Account Details</h3>
                            <div class="billing-wrapper">
                                <div class="woocommerce-shipping-fields">
                                    <p class="form-row form-row-wide validate-required">
                                        <label for="username">Username<abbr title="required" class="required">*</abbr></label>
                                        <input id="username" type="text" name="username" disabled="disabled"
                                               placeholder="" value="<?php echo $userMsg->username; ?>" class="input-text">
                                    </p>
                                    <p class="form-row form-row-wide validate-required">
                                        <label for="password">Password<abbr title="required" class="required">*</abbr></label>
                                        <input id="password" type="password" name="password"
                                               placeholder="" value="" class="input-text">
                                    </p>
                                    <p class="form-row form-row-wide validate-required">
                                        <label for="email">Email<abbr title="required" class="required">*</abbr></label>
                                        <input id="email" type="text" name="email"
                                               placeholder="" value="<?php echo $userMsg->email; ?>" class="input-text">
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="tel">Tel</label>
                                        <input id="tel" type="text" name="tel"
                                               placeholder="" value="<?php echo $userMsg->tel; ?>" class="input-text">
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="age">Age</label>
                                        <input id="age" type="text" name="age"
                                               placeholder="" value="<?php echo $userMsg->age; ?>" class="input-text">
                                    </p>
                                    <p class="form-row form-row-wide validate-required">
                                        <label for="sex">Sex</label>
                                        <select id="sex" name="sex">
                                            <option value="">Select your sex</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="mt-10">
                                <input type="submit" value="Confirm" class="cws-button full-width alt">
                            </div>
                        </div>
                    </form>
                    <div class="col-2">
                        <!-- widget top sellers-->
                        <div class="cws-widget">
                            <div class="widget-top-sellers">
                                <h3 class="mt-0 mb-30">Notifications</h3>
                                <!-- item recent post-->
                                <?php
                                if (!empty($notifications)) {
                                    foreach ($notifications as $row) {
                                        echo "<div class=\"item-top-sellers clearfix\"><img src=\"static/pic/shop/70x60/1.jpg\" alt>";
                                        echo "<h3 class=\"title\"><a href='http://localhost/FaceAlbum/index.php/album/others_album/$row->username'>$row->username</a></h3>";
                                        echo "<div class=\"old-price\">recent news:<span class=\"price\">$row->news_num</span></div>";
                                        echo "<div class=\"old-price\">recent photos:<span class=\"price\">$row->photo_num</span></div></div>";
                                    }
                                }
                                ?>
                                <!-- ! item recent post-->
                            </div>
                        </div>
                        <!-- ! widget top sellers-->
                        <div class="place-order mt-10">
                            <a href="<?php echo site_url('/Account/logout'); ?>" class="cws-button full-width alt">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ! content-->
            <!-- sidebar-->
            <div class="col-md-4">
                <!-- widget search-->
                <div class="cws-widget" id="friend_search">
                    <div class="widget-search search-form">
                            <label><span class="screen-reader-text">Search ...</span>
                                <input type="search" placeholder="Search ..." value="" title="Search:"
                                       class="search-field">
                            </label>
                            <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>

                    </div>
                </div>
                <!-- ! widget search-->
                <div class="cws-widget">
                    <div class="widget-categories" id="groups">
                        <h2 class="widget-title">Category</h2>
                        <ul>
                            <?php
                            if (!empty($groups)) {
                                foreach ($groups as $row) {
                                    echo "<li><a>".$row->group ."</a>[<span>" . $row->num ."</span>]</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <h3 class="widget-title">Your Friends</h3>
                    <div class="widget-top-sellers" id="friends">
                        <?php
                        if (!empty($friends)) {
                            foreach ($friends as $row) {
                                echo "<div class=\"item-top-sellers clearfix\" style=\"display: none\"><img src=\"static/pic/shop/70x60/1.jpg\" alt>";
                                echo "<h3 class=\"title\">group: <span>" . $row->group . "</span><button style='margin-left: 10px'><i class=\"fa fa-pencil\"></i></button><button><i class=\"fa fa-remove\"></i></button></h3>";
                                echo "<div class=\"price\">name: <a href='http://localhost/FaceAlbum/index.php/album/others_album/$row->username'>" . $row->username . "</a></div>";
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ! sidebar-->
</div>
