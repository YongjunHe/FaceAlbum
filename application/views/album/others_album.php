<!-- section portfolio filter-->
<section class="page-section pb-0 bg-gray-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- title section-->
                <h2 class="title-section text-center mt-0 mb-0"><?php echo $username?> gallery</h2>
                <!-- ! title section-->
            </div>
        </div>
        <div class="widget-tags" align="center" id="album_tag">
            <?php
            if (!empty($tags)) {
                foreach ($tags as $row) {
                    echo "<a class=\"tag\">$row->tag</a>";
                }
            }
            ?>
        </div>
    </div>
    <!-- filter-->
    <div class="isotop-container">
        <div class="work-filter">
            <?php
            if (!empty($albums)) {
                foreach ($albums as $row) {
                    if ($row->name != $album_name) {
                        echo "<a href='" . site_url('/Album/overview/' . $row->name) . "'>$row->name</a>";
                    } else {
                        echo "<a href='" . site_url('/Album/overview/' . $row->name) . "' class=\"active\">$row->name</a>";
                    }
                }
            }
            ?>
        </div>
        <div id="filter-grid" class="row cws-multi-col portfolio-grid">
            <?php
            if (!empty($photos)) {
                foreach ($photos as $row) {
                    echo "<div class=\"col-lg-3 col-md-4 col-sm-6 all branding design other\"><div class=\"portfolio-item text-center\"><div class=\"pic\">";
                    echo "<img src='static/pic/album/" . $username . "/" . $album_name . "/" . "$row->name' alt>";
                    echo "<div class=\"item-content\"><div class=\"links\">";
                    echo "<span class=\"portfolio-title\">$row->name</span>";
                    echo "<a href='static/pic/album/" . $username . "/" . $album_name . "/" . "$row->name' class=\"link-icon fancy\"><i class=\"fa fa-search\"></i></a>";
                    echo "<a class=\"link-icon\"><i class=\"fa fa-plus\"></i></a>";
                    echo "<a class=\"link-icon\" href='" . site_url('/Album/download/' . $album_name . '/' . $row->name) . "'><i class=\"fa fa-download\"></i></a>";
                    echo "<a class=\"link-icon\"><i class=\"fa fa-remove\"></i></a>";
                    echo "</div></div></div></div></div>";
                }
            }
            ?>
        </div>
    </div>
    <div class="pb-40 mt-10" align="center" id="album_action">
        <input type="text" id="multi_input">
        <a class="cws-button alt" id="add_album">Add album</a>
        <a href="<?php echo site_url('/Album/delete_album/' . $album_name); ?>" class="cws-button alt"
           id="delete_album">Delete album</a>
        <a class="cws-button alt" id="share_album">Share album</a>
        <a class="cws-button alt" id="tag_album">Modify tags</a>
    </div>
    <!-- ! filter-->
</section>
<!-- ! section portfolio filter-->

<!-- login popup-->
<div class="login-popup">
    <div class="login-popup-wrap">
        <div class="title-wrap">
            <h2></h2><i class="close-button fa fa-remove"></i>
        </div>
        <div class="login-content">
            <input type="text" name="tag" value="" size="40" placeholder="Enter the tag ..." aria-required="true"
                   class="form-row form-row-first">
            <a class="cws-button gray" id="add_tag">add</a><a class="cws-button gray" id="delete_tag">remove</a>
        </div>
        <div class="widget-tags" align="center" id="photo_tag">

        </div>
    </div>
</div>
<!-- ! login popup-->