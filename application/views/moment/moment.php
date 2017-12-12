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
        <div class="col-md-3">
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
        <div class="col-md-9">
            <table class="table table-hover table-bordered" id="news">
                <thead>
                <tr>
                    <th>newsid</th>
                    <th>authorid</th>
                    <th>ownerid</th>
                    <th>content</th>
                    <th>photo_count</th>
                    <th>updatetime</th>
                    <th>albumid</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($news as $row){
                    echo "<tr>";
                    echo "<td>".$row->newsid."</td>";
                    echo "<td>".$row->authorid."</td>";
                    echo "<td>".$row->ownerid."</td>";
                    echo "<td>".$row->content."</td>";
                    echo "<td>".$row->photo_count."</td>";
                    echo "<td>".$row->updatetime."</td>";
                    echo "<td>".$row->albumid."</td>";
                    echo "<td><button><a href='" . site_url('/Moment/share/' . $row->newsid ) . "'><i class=\"fa fa-share\"></i></a></button><button><i class=\"fa fa-comment\"></i></button><button><a href='" . site_url('/Moment/search/' . $row->authorid ) . "'><i class=\"fa fa-search\"></i></a></button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <!-- ! content-->
    </div>
</div>