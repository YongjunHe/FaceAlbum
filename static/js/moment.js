$(document).ready(function () {
    $("p#photo_upload").delegate("input.files", "click", function () {
        var id = $("p#photo_upload").find("input.files").size();
        $("p#photo_upload").append("<input type=\"file\" name='userfile"+id+"' class=\"files\"/>");
    });

});