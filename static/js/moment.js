$(document).ready(function () {
    $("p#photo_upload").delegate("input.files", "click", function () {
        var id = $("p#photo_upload").find("input.files").size();
        $("p#photo_upload").append("<input type=\"file\" name='userfile"+id+"' class=\"files\"/>");
    });

    $('.site-top-panel .search_menu_cont .search_back_button').on('click', function () {
        $('#submit_search').click();
    })

    $("div#news i.fa-star").on("click", function (){
        var newsid = $(this).attr('id');
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/moment/star",
            type: "POST",
            dataType: "json",
            data: {
                'newsid': newsid,
            },
            success: function (response) {
                if (response['result']) {
                    $("div#news div.star").append("<span class='glyphicon glyphicon-star' aria-hidden='true'></span>");
                    $(this).closest("button").remove();
                } else {
                    alert('failed to star');
                }
            },
            error: function () {
                alert('failed to star');
            }
        });
    });
});