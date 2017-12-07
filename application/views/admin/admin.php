<!-- breadcrumbs start-->
<section style="background-image:url('static/pic/breadcrumbs/bg-1.jpg');" class="breadcrumbs">
    <div class="container">
        <div class="text-center breadcrumbs-item">
            <h1>Admin</h1><a href="#">home</a><i class="fa fa-angle-right"></i><a href="#">accounts</a><i
                    class="fa fa-angle-right"></i><a href="#">User</a>
        </div>
    </div>
</section>
<!-- ! breadcrumbs end-->
<div class="content-body" style="background-image:url('static/pic/breadcrumbs/bg-2.jpg');">
    <div class="container">
        <div class="mt-10" align="right">
            <button id="add_user" class="cws-button gray alt">Add</button>
            <a href="<?php echo site_url('/Account/logout'); ?>" class="cws-button gray alt">Logout</a>
        </div>
        <div class="row" style="overflow:scroll; height: 400px">
            <table class="table table-hover table-bordered" id="users">
                <thead>
                <tr>
                    <th>userid</th>
                    <th>username</th>
                    <th>password</th>
                    <th>identity</th>
                    <th>email</th>
                    <th>tel</th>
                    <th>age</th>
                    <th>sex</th>
                    <th>updatetime</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($users as $row){
                        echo "<tr>";
                        echo "<td>".$row->userid."</td>";
                        echo "<td>".$row->username."</td>";
                        echo "<td>".$row->password."</td>";
                        echo "<td>".$row->identity."</td>";
                        echo "<td>".$row->email."</td>";
                        echo "<td>".$row->tel."</td>";
                        echo "<td>".$row->age."</td>";
                        echo "<td>".$row->sex."</td>";
                        echo "<td>".$row->updatetime."</td>";
                        echo "<td><button><i class=\"fa fa-pencil\"></i></button><button><i class=\"fa fa-remove\"></i></button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<section style="background-image:url('static/pic/breadcrumbs/bg-1.jpg');" class="breadcrumbs">
    <div class="container">
        <div class="text-center breadcrumbs-item">
            <h1>Admin</h1><a href="#">home</a><i class="fa fa-angle-right"></i><a href="#">accounts</a><i
                    class="fa fa-angle-right"></i><a href="#">Events</a>
        </div>
    </div>
</section>
<!-- ! breadcrumbs end-->
<div class="content-body" style="background-image:url('static/pic/breadcrumbs/bg-2.jpg');">
    <div class="container">
        <div class="mt-10" align="right">
            <button id="add_event" class="cws-button gray alt">Add</button>
            <a href="<?php echo site_url('/Account/logout'); ?>" class="cws-button gray alt">Logout</a>
        </div>
        <div class="row" style="overflow:scroll; height: 400px">
            <table class="table table-hover table-bordered" id="events">
                <thead>
                <tr>
                    <th>eventid</th>
                    <th>title</th>
                    <th>content</th>
                    <th>membernum</th>
                    <th>authorid</th>
                    <th>starttime</th>
                    <th>endtime</th>
                    <th>updatetime</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($events as $row){
                    echo "<tr>";
                    echo "<td>".$row->eventid."</td>";
                    echo "<td>".$row->title."</td>";
                    echo "<td>".$row->content."</td>";
                    echo "<td>".$row->membernum."</td>";
                    echo "<td>".$row->authorid."</td>";
                    echo "<td>".$row->starttime."</td>";
                    echo "<td>".$row->endtime."</td>";
                    echo "<td>".$row->updatetime."</td>";
                    echo "<td><button><i class=\"fa fa-pencil\"></i></button><button><i class=\"fa fa-remove\"></i></button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>