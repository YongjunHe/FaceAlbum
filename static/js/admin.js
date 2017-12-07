$(document).ready(function () {
    //user
    $("button#add_user").click(function () {
        $("table#users tbody").prepend("<tr><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td>" +
            "<td><input type='text'></td><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td>" +
            "<td><input type='text'></td><td><button><i class='fa fa-check'></i></button><button><i class='fa fa-remove'></i></button></td></tr>>");
    });
    $("table#users").delegate("td", "click", function () {
        var row = $(this).closest('tr');
        if ($(this).find("button").length == 0)
            if ($(this).find("input").length == 0) {
                $(this).after("<td><input type='text' placeholder='" + $(this).text() + "'></td>>");
                $(this).remove();
            }
    });
    $("table#users").delegate("i.fa-check", "click", function () {
        var row = $(this).closest('tr');
        var inputs = row.find("input");
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/admin/add_user",
            type: "POST",
            dataType: "json",
            data: {
                'username': inputs.eq(1).val(),
                'password': inputs.eq(2).val(),
                'identity': inputs.eq(3).val(),
                'email': inputs.eq(4).val(),
                'tel': inputs.eq(5).val(),
                'age': inputs.eq(6).val(),
                'sex': inputs.eq(7).val()
            },
            success: function (response) {
                if (response['result']) {
                    alert(inputs.eq(1).val() + " is added successfully!");
                    row.find("td").remove();
                    row.append("<td>" + response['userid'] + "</td>>");
                    row.append("<td>" + inputs.eq(1).val() + "</td>>");
                    row.append("<td>" + inputs.eq(2).val() + "</td>>");
                    row.append("<td>" + inputs.eq(3).val() + "</td>>");
                    row.append("<td>" + inputs.eq(4).val() + "</td>>");
                    row.append("<td>" + inputs.eq(5).val() + "</td>>");
                    row.append("<td>" + inputs.eq(6).val() + "</td>>");
                    row.append("<td>" + inputs.eq(7).val() + "</td>>");
                    row.append("<td>" + response['updatetime'] + "</td>>");
                    row.append("<td><button><i class='fa fa-pencil'></i></button><button><i class='fa fa-remove'></i></button></td>");
                } else {
                    alert('failed to add ' + inputs.eq(1).val());
                }
            },
            error: function () {
                alert('failed to add ' + inputs.eq(1).val());
            }
        });
    });
    $("table#users").delegate("i.fa-pencil", "click", function () {
        var row = $(this).closest('tr');
        if (row.find("input").length > 0) {
            var request = new Array();
            $(row.find('td')).each(function (index, element) {
                if (index < 9) {
                    if ($(element).children('input').length == 1) {
                        request[index] = $(element).children('input').eq(0).val();
                    } else {
                        request[index] = $(element).text();
                    }
                }
            });
            $.ajax({
                url: "http://localhost/FaceAlbum/index.php/admin/update_user",
                type: "POST",
                dataType: "json",
                data: {'request': request},
                success: function (response) {
                    if (response['result']) {
                        alert(request[1] + " is updated successfully!");
                        $(row.find('td')).each(function (index, element) {
                            if (index < 9) {
                                if ($(element).children('input').length == 1) {
                                    $(element).prepend($(element).children('input').eq(0).val());
                                    $(element).children('input').remove();
                                }
                            }
                        });
                    } else {
                        alert('failed to update ' + request[1]);
                    }
                },
                error: function () {
                    alert('failed to update ' + request[1]);
                }
            });
        }
    });
    $("table#users").delegate("i.fa-remove", "click", function () {
        var row = $(this).closest('tr');
        if (row.find("input").length == 0) {
            var first_td = row.find("td:first");
            $.ajax({
                url: "http://localhost/FaceAlbum/index.php/admin/delete_user",
                type: "POST",
                dataType: "json",
                data: {'userid': first_td.text()},
                success: function (response) {
                    if (response['result']) {
                        alert(first_td.next().text() + " is deleted successfully!");
                        row.remove();
                    } else {
                        alert('failed to delete ' + first_td.next().text());
                    }
                },
                error: function () {
                    alert('failed to delete ' + first_td.next().text());
                }
            });
        } else {
            row.remove();
        }
    });

    //event
    $("button#add_event").click(function () {
        $("table#events tbody").prepend("<tr><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td>" +
            "<td><input type='text'></td><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td>" +
            "<td><button><i class='fa fa-check'></i></button><button><i class='fa fa-remove'></i></button></td></tr>>");
    });
    $("table#events").delegate("td", "click", function () {
        var row = $(this).closest('tr');
        if ($(this).find("button").length == 0)
            if ($(this).find("input").length == 0) {
                $(this).after("<td><input type='text' placeholder='" + $(this).text() + "'></td>>");
                $(this).remove();
            }
    });
    $("table#events").delegate("i.fa-check", "click", function () {
        var row = $(this).closest('tr');
        var inputs = row.find("input");
        $.ajax({
            url: "http://localhost/FaceAlbum/index.php/admin/add_event",
            type: "POST",
            dataType: "json",
            data: {
                'eventid': inputs.eq(0).val(),
                'title': inputs.eq(1).val(),
                'content': inputs.eq(2).val(),
                'membernum': inputs.eq(3).val(),
                'authorid': inputs.eq(4).val(),
                'starttime': inputs.eq(5).val(),
                'endtime': inputs.eq(6).val(),
            },
            success: function (response) {
                if (response['result']) {
                    alert(inputs.eq(1).val() + " is added successfully!");
                    row.find("td").remove();
                    row.append("<td>" + inputs.eq(0).val() + "</td>>");
                    row.append("<td>" + inputs.eq(1).val() + "</td>>");
                    row.append("<td>" + inputs.eq(2).val() + "</td>>");
                    row.append("<td>" + inputs.eq(3).val() + "</td>>");
                    row.append("<td>" + inputs.eq(4).val() + "</td>>");
                    row.append("<td>" + inputs.eq(5).val() + "</td>>");
                    row.append("<td>" + inputs.eq(6).val() + "</td>>");
                    row.append("<td>" + response['updatetime'] + "</td>>");
                    row.append("<td><button><i class='fa fa-pencil'></i></button><button><i class='fa fa-remove'></i></button></td>");
                } else {
                    alert('failed to add ' + inputs.eq(1).val());
                }
            },
            error: function () {
                alert('failed to add ' + inputs.eq(1).val());
            }
        });
    });
    $("table#events").delegate("i.fa-pencil", "click", function () {
        var row = $(this).closest('tr');
        if (row.find("input").length > 0) {
            var request = new Array();
            $(row.find('td')).each(function (index, element) {
                if (index < 8) {
                    if ($(element).children('input').length == 1) {
                        request[index] = $(element).children('input').eq(0).val();
                    } else {
                        request[index] = $(element).text();
                    }
                }
            });
            $.ajax({
                url: "http://localhost/FaceAlbum/index.php/admin/update_event",
                type: "POST",
                dataType: "json",
                data: {'request': request},
                success: function (response) {
                    if (response['result']) {
                        alert(request[1] + " is updated successfully!");
                        $(row.find('td')).each(function (index, element) {
                            if (index < 9) {
                                if ($(element).children('input').length == 1) {
                                    $(element).prepend($(element).children('input').eq(0).val());
                                    $(element).children('input').remove();
                                }
                            }
                        });
                    } else {
                        alert('failed to update ' + request[1]);
                    }
                },
                error: function () {
                    alert('failed to update ' + request[1]);
                }
            });
        }
    });
    $("table#events").delegate("i.fa-remove", "click", function () {
        var row = $(this).closest('tr');
        if (row.find("input").length == 0) {
            var first_td = row.find("td:first");
            $.ajax({
                url: "http://localhost/FaceAlbum/index.php/admin/delete_event",
                type: "POST",
                dataType: "json",
                data: {'eventid': first_td.text()},
                success: function (response) {
                    if (response['result']) {
                        alert(first_td.next().text() + " is deleted successfully!");
                        row.remove();
                    } else {
                        alert('failed to delete ' + first_td.next().text());
                    }
                },
                error: function () {
                    alert('failed to delete ' + first_td.next().text());
                }
            });
        } else {
            row.remove();
        }
    });
});