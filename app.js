$.getJSON("cars.php", function(result){
    $.each(result['cars'], function(i, field){
        $("#cars").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.make + "</td><td>" + field.model + "</td><td>" + field.license + "</td><td>" + field.date + "</td></tr>");
    });
});
    
$("#add").click(function(){

    $.post("cars.php",// endpoint
    { // payload
        owner: $("#owner").val(),
        make: $("#make").val(),
        model: $("#model").val(),
        license: $("#license").val()
    },
    function(data, status){

        $("#alert").html("<div class='alert alert-"+data.message.type+"'>" + data.message.body + "</div>");
           
        $.getJSON("cars.php", function(result){

            $("#cars").html('');
            $.each(result['cars'], function(i, field){
                $("#cars").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.make + "</td><td>" + field.model + "</td><td>" + field.license + "</td><td>" + field.date + "</td></tr>");
            });
        });
    });
});

$("#search").keyup(function() {

    $.getJSON("cars.php",
    {
        search: $("#search").val(),
    },
    function(result){

        $("#cars").html('');
        $.each(result['cars'], function(i, field){
            $("#cars").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.make + "</td><td>" + field.model + "</td><td>" + field.license + "</td><td>" + field.date + "</td></tr>");
        });
    });

});

$("#last5").click(function() {

    $.getJSON("cars.php",
    {
        last: 5,
    },
    function(result){

        $("#cars").html('');
        $.each(result['cars'], function(i, field){
            $("#cars").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.make + "</td><td>" + field.model + "</td><td>" + field.license + "</td><td>" + field.date + "</td></tr>");
        });
    });

});