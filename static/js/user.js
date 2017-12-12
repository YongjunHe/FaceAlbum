$(document).ready(function () {
    //search and add friends
    $("div#friend_search button").click(function () {
        var friend_name = $(this).prev().find("input:first").val();
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/friend/search_friend",
            type: "POST",
            dataType: "json",
            data: {
                'friend_name': friend_name,
            },
            success: function (response) {
                if (response['result']) {
                    $("div.widget-search").next().remove();
                    var new_friend = "<div class='widget-top-sellers'><div class='item-top-sellers clearfix'><img src='static/pic/shop/70x60/1.jpg' alt><h3 class='title'>userid:<span>" + response['userid'] +
                        "</span><button style='margin-left: 10px'><i class='fa fa-check'></i></button></h3>" +
                        "<div class='price'>name: <a href=''>" + response['username'] + "</a></div></div><input type='text' placeholder='Enter his/her group'></div>";
                    $("div.widget-search").after(new_friend);
                    alert(friend_name + 'is showed below!');
                } else {
                    alert('failed to find this friend');
                }
            },
            error: function () {
                alert('failed to find this friend');
            }
        });
    });
    $("div#friend_search").delegate("i.fa-check", "click", function () {
        var group = $(this).closest('div').next().val();
        var friendid = $(this).closest('button').prev().text();
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/friend/add_friend",
            type: "POST",
            dataType: "json",
            data: {
                'friendid': friendid,
                'group': group,
            },
            success: function (response) {
                if (response['result']) {
                    alert('userid: ' + friendid + ' is added successfully!');
                } else {
                    alert('failed to add this friend');
                }
            },
            error: function () {
                alert('failed to add this friend');
            }
        });
    });
    //update friends
    $("div#groups li a").click(function () {
        var group_name = $(this).text();
        var friends = $("div#friends div.item-top-sellers");
        $(friends).each(function (index, element) {
            if ($(element).find("span:first").text() == group_name) {
                $(element).removeAttrs("style");
            }
        });
    });
    $("div#friends").delegate("i.fa-pencil", "click", function () {
        $(this).removeClass('fa-pencil');
        $(this).addClass('fa-check');
        var group = $(this).closest('button').prev();
        var group_name = group.text();
        group.remove();
        var groups = $("div#groups li");
        $(groups).each(function (index, element) {
            if ($(element).find("a:first").text() == group_name) {
                $(element).find("span:first").text(parseInt($(element).find("span:first").text()) - 1);
            }
        });
        $(this).closest('button').before("<input type='text' placeholder='" + group_name + "'>");
    });
    $("div#friends").delegate("i.fa-check", "click", function () {
        var button = $(this).closest('button');
        var group = button.prev().val();
        var friend_name = $(this).closest('h3').next().find('a:first').text();
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/friend/update_friend",
            type: "POST",
            dataType: "json",
            data: {
                'friend_name': friend_name,
                'group': group,
            },
            success: function (response) {
                if (response['result']) {
                    var groups = $("div#groups li");
                    var judge = true;
                    $(groups).each(function (index, element) {
                        if ($(element).find("a:first").text() == group) {
                            $(element).find("span:first").text(parseInt($(element).find("span:first").text()) + 1);
                            judge = false;
                            return judge;
                        }
                    });
                    if(judge){
                        $("div#groups ul").append("<li><a>" + group + "</a>[<span>1</span>]</li>");
                    }
                    button.removeClass('fa-check');
                    button.addClass('fa-pencil');
                    button.prev().remove();
                    button.before("<span>"+group+"</span>");
                    alert(friend_name + ' is updated successfully!');
                } else {
                    alert('failed to update this friend');
                }
            },
            error: function () {
                alert('failed to update this friend');
            }
        });
    });
    $("div#friends").delegate("i.fa-remove", "click", function () {
        var row = $(this).closest("div.item-top-sellers");
        var friend_name = row.find("a:first").text();
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/friend/delete_friend",
            type: "POST",
            dataType: "json",
            data: {
                'friend_name': friend_name,
            },
            success: function (response) {
                if (response['result']) {
                    var group_name = row.find("span:first").text();
                    var groups = $("div#groups li");
                    $(groups).each(function (index, element) {
                        if ($(element).find("a:first").text() == group_name) {
                            $(element).find("span:first").text(parseInt($(element).find("span:first").text()) - 1);
                        }
                    });
                    row.remove();
                    alert(friend_name + " is deleted successfully");
                } else {
                    alert('failed to delete this friend');
                }
            },
            error: function () {
                alert('failed to delete this friend');
            }
        });
    });
});