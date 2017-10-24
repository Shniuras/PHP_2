//    function add() {
//        name = document.getElementById('form_name').value;
//        surname = document.getElementById('form_surname').value;
//        email = document.getElementById('form_email').value;
//        number = document.getElementById('form_number').value;
//
//        user_table_body = document.getElementById('user_table_body');
//
//        user_table_body.innerHTML += "<tr><td>" + name + "</td><td>" + surname + "</td><td>" + email + "</td><td>" + number + "</td></tr>";
//
//    }
$("#ajax_post").click(function(){
    $.post("users.php",
        {
            name: $("#form_name").val(),
            surname: $("#form_surname").val(),
            email: $("#form_email").val(),
            number: $("#form_number").val()
        },
        function(data, status){
            $("#alert").html("<div class='alert alert-"+data.message.type+"'>" + data.message.body + "</div>");
            $("#user_table_body").html('');

            $.getJSON("users.php", function(result){
                $.each(result['users'], function(i,field){
                    $("#user_table_body").append("<tr><td>" + field.Id + "</td><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.number + "</td></tr>");
                });
            });
        });
//        $.get("show.php", function(data, status){
//            console.log(data);
//        });
});

$("#filter").keyup(function(){
    $.getJSON("users.php",
        {
            filter: $("#filter").val(),
        },
        function(result){
        $("#user_table_body").html('');

        $.each(result['users'], function(i,field){
            $("#user_table_body").append("<tr><td>" + field.Id + "</td><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.number + "</td></tr>");
        });
    });
});

$.getJSON("users.php", function(result){
    $("#user_table_body").html('');

    $.each(result['users'], function(i,field){
        $("#user_table_body").append("<tr><td>" + field.Id + "</td><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.number + "</td></tr>");
    });
});