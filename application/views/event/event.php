<!-- breadcrumbs start-->
<section style="background-image:url('static/pic/breadcrumbs/bg-1.jpg');" class="breadcrumbs">
    <div class="container">
        <div class="text-center breadcrumbs-item">
            <h1>Events</h1><a href="#">home</a><i class="fa fa-angle-right"></i><a href="#">event</a><i
                    class="fa fa-angle-right"></i><a href="#">events</a>
        </div>
    </div>
</section>
<!-- ! breadcrumbs end-->
<div class="content-body page">
    <div class="container">
        <div class="row">
            <!-- content-->
            <div class="col-md-8 woocommerce">
                <h2>All Events</h2>
                <table id="all_events">
                    <thead>
                    <tr>
                        <th>Eventid</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Membernum</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($events as $row) {
                        echo "<tr>";
                        echo "<td>" . $row->eventid . "</td>";
                        echo "<td>" . $row->title . "</td>";
                        echo "<td>" . $row->content . "</td>";
                        echo "<td>" . $row->membernum . "</td>";
                        echo "<td>" . $row->starttime . "</td>";
                        echo "<td>" . $row->endtime . "</td>";
                        echo "<td><button><i class=\"fa fa-check\"></i></button></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>

                <h2>My Events</h2>
                <table id="my_events">
                    <thead>
                    <tr>
                        <th>Eventid</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Membernum</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($my_events)) {
                        foreach ($my_events as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->eventid . "</td>";
                            echo "<td>" . $row->title . "</td>";
                            echo "<td>" . $row->content . "</td>";
                            echo "<td>" . $row->membernum . "</td>";
                            echo "<td>" . $row->starttime . "</td>";
                            echo "<td>" . $row->endtime . "</td>";
                            echo "<td><button><i class=\"fa fa-pencil\"></i></button><button><i class=\"fa fa-remove\"></i></button></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- ! content-->
            <!-- sidebar-->
            <div class="col-md-4">
                <div class="row">
                    <form action="<?php echo site_url('/Event/modify'); ?>" method="post">
                        <h2>Add/Update Event</h2>
                        <div>
                            <p class="form-row form-row-wide">
                                <input id="eventid" type="text" value="" placeholder="eventid"
                                       name="eventid" class="input-text">
                            </p>
                            <p class="form-row form-row-wide">
                                <input id="title" type="text" value="" placeholder="title"
                                       name="title" class="input-text">
                            </p>
                            <p class="form-row form-row-wide">
                                <input id="content" type="text" value="" placeholder="Content"
                                       name="content" class="input-text">
                            </p>
                            <p class="form-row form-row-wide mb-10">
                                <input id="starttime" type="text" value="" placeholder="Starttime"
                                       name="starttime" class="input-text">
                            </p>
                            <p class="form-row form-row-wide mb-10">
                                <input id="endtime" type="text" value="" placeholder="Endtime"
                                       name="endtime" class="input-text">
                            </p>
                            <p>
                                <button type="submit" value=""
                                        class="cws-button full-width alt">Confirm
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ! sidebar-->
        </div>
    </div>
</div>