$(document).ready(function () {
    //delete the photo
    $("i.fa-remove").click(function () {
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
                    $("div.work-filter").append("<a href='http://localhost/FaceAlbum/index.php/album/overview'>"+album_name+"</a>");
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
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/album/tag_album",
            type: "POST",
            dataType: "json",
            data: {
                'album_name' : album_name,
                'tag_name': tag_name,
            },
            success: function (response) {
                if (response['result']) {
                    $("div#album_tag").append("<a class='tag'>"+tag_name+"</a>");
                    alert(tag_name + ' is added successfully!');
                } else {
                    alert('failed to add this tag');
                }
            },
            error: function () {
                alert('failed to add this tag');
            }
        });
    });
});