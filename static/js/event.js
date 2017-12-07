$(document).ready(function () {
    $("table#all_events").delegate("i.fa-check", "click", function () {
        var row = $(this).closest('tr');
        var first_td = row.find("td:first");
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/event/attend",
            type: "POST",
            dataType: "json",
            data: {
                'eventid': first_td.text()
            },
            success: function (response) {
                if (response['result']) {
                    row.find("td").eq(3).text(parseInt(row.find("td").eq(3).text())+ 1);
                    var new_row = row.clone();
                    new_row.find("td:last").remove();
                    new_row.append("<td><button><i class='fa fa-pencil'></i></button><button><i class='fa fa-remove'></i></button></td>");
                    $("table#my_events tbody").prepend(new_row);
                    alert("You attend this event successfully!");
                } else {
                    alert('failed to attend this event');
                }
            },
            error: function () {
                alert('failed to attend this event');
            }
        });
    });

    $("table#my_events").delegate("i.fa-remove", "click", function () {
        var row = $(this).closest('tr');
        var first_td = row.find("td:first");
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/event/quit",
            type: "POST",
            dataType: "json",
            data: {
                'eventid': first_td.text(),
            },
            success: function (response) {
                if (response['result']) {
                    var rows = $("table#all_events tbody tr");
                    $(rows).each(function (index, element) {
                        if($(element).find('td:first').text()== first_td.text()){
                            $(element).find('td').eq(3).text(parseInt($(element).find('td').eq(3).text())-1);
                        }
                    });
                    row.remove();
                    alert("You exit this event successfully!");
                } else {
                    alert('failed to exit this event');
                }
            },
            error: function () {
                alert('failed to exit this event');
            }
        });
    });

    $("table#my_events").delegate("i.fa-pencil", "click", function () {
        var row = $(this).closest('tr');
        var td = row.find("td");
        $("input#eventid").val(td.eq(0).text());
        $("input#title").val(td.eq(1).text());
        $("input#content").val(td.eq(2).text());
        $("input#starttime").val(td.eq(4).text());
        $("input#endtime").val(td.eq(5).text());
    });
});