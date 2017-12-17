$(document).ready(function () {
    //delete the photo
    $("a i.fa-remove").click(function () {
        var photo = $(this).closest('div.col-lg-3');
        var album_name = $.trim($("div.work-filter a.active").text());
        var photo_name = $.trim($(this).closest('div.item-content').find('span:first').text());
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/album/delete_photo",
            type: "POST",
            dataType: "json",
            data: {
                'album_name': album_name,
                'photo_name': photo_name
            },
            success: function (response) {
                if (response['result']) {
                    photo.remove();
                    alert(photo_name + ' is deleted successfully!');
                } else {
                    alert('failed to delete this photo');
                }
            },
            error: function () {
                alert('failed to delete this photo');
            }
        });
    });

    $("a#add_album").click(function () {
        var album_name = $("input#multi_input").val();
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/album/add_album",
            type: "POST",
            dataType: "json",
            data: {
                'album_name': album_name,
            },
            success: function (response) {
                if (response['result']) {
                    $("div.work-filter").append("<a href='http://localhost/FaceAlbum/index.php/album/overview'>" + album_name + "</a>");
                    alert(album_name + ' is added successfully!');
                } else {
                    alert('failed to add this album');
                }
            },
            error: function () {
                alert('failed to add this album');
            }
        });
    });

    $("a#tag_album").click(function () {
        var album_name = $.trim($("div.work-filter a.active").text());
        var tag_name = $("input#multi_input").val();
        var flag = true;
        if(tag_name.length==0){
            return false;
        }
        var album_tags = $("#album_tag a");
        for(var i=0; i<album_tags.length; i++){
            if(album_tags.eq(i).text()==tag_name){
                flag = false;
                album_tags.eq(i).remove();
                break;
            }
        };
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/album/tag_album",
            type: "POST",
            dataType: "json",
            data: {
                'album_name': album_name,
                'tag_name': tag_name,
                'flag': flag,
            },
            success: function (response) {
                if (response['result']) {
                    $("div#album_tag").append("<a class='tag'>" + tag_name + "</a>");
                    alert(tag_name + ' is modified successfully!');
                } else {
                    alert('failed to modified this tag');
                }
            },
            error: function () {
                alert('failed to modified this tag');
            }
        });
    });

    //photo tags popup
    $("a i.fa-plus").on("click", function () {
        var photo_name = $(this).closest('a').prev().prev().text();
        var album_name = $.trim($("div.work-filter a.active").text());
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/album/get_tag_photo",
            type: "POST",
            dataType: "json",
            data: {
                'album_name': album_name,
                'photo_name': photo_name,
            },
            success: function (response) {
                $.each(response['photo_tags'],function(index,element){
                    $("#photo_tag").append("<a class='tag'>"+element.tag+"</a>");
                });
            },
            error: function () {
                alert('failed to get the tags');
            }
        });
        $(".login-popup h2").text(photo_name);
        $(".login-popup").addClass("open");
    })
    $(".login-popup .close-button").on("click", function () {
        $(".login-popup").removeClass("open");
    })
    $("#add_tag").on("click", function () {
        var album_name = $.trim($("div.work-filter a.active").text());
        var photo_name = $.trim($(".login-popup h2").text());
        var tag_name = $.trim($(".login-content input").val());
        if(tag_name.length==0){
            return false;
        }
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/album/add_tag_photo",
            type: "POST",
            dataType: "json",
            data: {
                'album_name': album_name,
                'tag_name': tag_name,
                'photo_name': photo_name,
            },
            success: function (response) {
                if (response['result']) {
                    $("div#photo_tag").append("<a class='tag'>" + tag_name + "</a>");
                    alert(tag_name + ' is modified successfully!');
                } else {
                    alert('failed to modified this tag');
                }
            },
            error: function () {
                alert('failed to modified this tag');
            }
        });
    })

    $("#delete_tag").on("click", function () {
        var album_name = $.trim($("div.work-filter a.active").text());
        var photo_name = $.trim($(".login-popup h2").text());
        var tag_name = $.trim($(".login-content input").val());
        if(tag_name.length==0){
            return false;
        }
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/album/delete_tag_photo",
            type: "POST",
            dataType: "json",
            data: {
                'album_name': album_name,
                'tag_name': tag_name,
                'photo_name': photo_name,
            },
            success: function (response) {
                if (response['result']) {
                    var photo_tags = $("#photo_tag a");
                    for(var i=0; i<photo_tags.length; i++){
                        if(photo_tags.eq(i).text()==tag_name){
                            photo_tags.eq(i).remove();
                            break;
                        }
                    };
                    alert(tag_name + ' is modified successfully!');
                } else {
                    alert('failed to modified this tag');
                }
            },
            error: function () {
                alert('failed to modified this tag');
            }
        });
    })
});