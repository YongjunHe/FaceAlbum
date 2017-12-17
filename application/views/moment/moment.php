<!-- breadcrumbs start-->
<section style="background-image:url('static/pic/breadcrumbs/bg-1.jpg');" class="breadcrumbs">
    <div class="container">
        <div class="text-center breadcrumbs-item">
            <h1>News</h1><a href="#">home</a><i class="fa fa-angle-right"></i><a href="#">Moments</a><i
                    class="fa fa-angle-right"></i><a href="#">News</a>
        </div>
    </div>
</section>
<!-- ! breadcrumbs end-->
<div class="container">
    <div class="row">
        <!-- content-->
        <div class="col-md-4">
            <form id="news_upload" method="post" action="<?php echo site_url('Moment/upload') ?>"
                  enctype="multipart/form-data">
                <div class="billing-wrapper">
                    <div>
                        <p class="form-row form-row-wide address-field validate-required">
                            <label for="album_name">Album name<abbr title="required"
                                                                    class="required">*</abbr></label>
                            <input id="album_name" type="text" name="album_name"
                                   placeholder="Enter the album name" value="">
                        </p>
                        <p class="form-row form-row-wide address-field validate-required">
                            <label for="news_content">News Content<abbr title="required"
                                                                        class="required">*</abbr></label>
                            <input id="news_content" type="text" name="news_content"
                                   placeholder="Enter your news content" value="">
                        </p>
                        <p id="photo_upload" class="form-row form-row-wide address-field validate-required">
                            <input type="file" name="userfile0" class="files"/>
                        </p>
                        <br/>
                    </div>
                    <div class="place-order">
                        <input id="upload" type="submit" name="upload"
                               value="Upload" class="cws-button full-width alt">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="cws-widget">
                <div class="widget-top-sellers" id="news">
                    <h3 class="mt-0 mb-30">Friends' news</h3>
                    <!-- item recent post-->
                    <?php
                    if (!empty($friend_news)) {
                        foreach ($friend_news as $row) {
                            echo "<div class=\"item-top-sellers clearfix\"><img src=$row->address alt>";
                            echo "<h3 class=\"title\"><a href='http://localhost/FaceAlbum/index.php/album/others_album/$row->username'>$row->username</a></h3>";
                            echo "<div class=\"old-price\">content:<span class=\"price\">$row->content</span></div>";
                            echo "<div class=\"old-price\">photos:<span class=\"price\">$row->photo_count</span></div>";
                            echo "<div class=\"star\">";
                            for ($i=0; $i<$row->star; $i++) {
                                echo "<span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>";
                            }
                            echo "</div>";
                            echo "<div class=\"price\">$row->updatetime</div>";
                            echo "<div><button><a href='" . site_url('/Moment/share/' . $row->newsid ) . "'><i class=\"fa fa-share\"></i></a></button><button><i class=\"fa fa-comment\"></i></button>";
                            echo "<button><a><i class=\"fa fa-star\" id=$row->newsid></i></a></button><button><a href='http://localhost/FaceAlbum/index.php/album/others_album/$row->username'><i class=\"fa fa-search\"></i></a></button></div>";
                            echo "</div>";
                        }
                    }
                    ?>
                    <!-- ! item recent post-->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cws-widget">
                <div class="widget-top-sellers" id="news">
                    <h3 class="mt-0 mb-30">Popular news</h3>
                    <!-- item recent post-->
                    <?php
                    if (!empty($all_news)) {
                        foreach ($all_news as $row) {
                            echo "<div class=\"item-top-sellers clearfix\"><img src=$row->address alt>";
                            echo "<h3 class=\"title\"><a href='http://localhost/FaceAlbum/index.php/album/others_album/$row->username'>$row->username</a></h3>";
                            echo "<div class=\"old-price\">content:<span class=\"price\">$row->content</span></div>";
                            echo "<div class=\"old-price\">photos:<span class=\"price\">$row->photo_count</span></div>";
                            echo "<div class=\"star\">";
                            for ($i=0; $i<$row->star; $i++) {
                                echo "<span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>";
                            }
                            echo "</div>";
                            echo "<div class=\"price\">$row->updatetime</div>";
                            echo "<div><button><a href='" . site_url('/Moment/share/' . $row->newsid ) . "'><i class=\"fa fa-share\"></i></a></button><button><i class=\"fa fa-comment\"></i></button>";
                            echo "<button><a><i class=\"fa fa-star\" id=$row->newsid></i></a></button><button><a href='http://localhost/FaceAlbum/index.php/album/others_album/$row->username'><i class=\"fa fa-search\"></i></a></button></div>";
                            echo "</div>";
                        }
                    }
                    ?>
                    <!-- ! item recent post-->
                </div>
            </div>
        </div>
        <!-- ! content-->
    </div>
</div>