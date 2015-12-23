/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $(function() {

        $("ul").on("click", ".init", function() {
            $(this).closest("ul").children('li:not(.init)').toggle();
        });

        var allOptions = $("ul").children('li:not(.init)');
        $("ul").on("click", "li:not(.init)", function() {
            allOptions.removeClass('selected');
            $(this).addClass('selected');
            $("ul").children('.init').html($(this).html());
            allOptions.toggle();
        });


        $("#submit").click(function() {
            alert("The selected Value is " + $("ul").find(".selected").data("value"));
        });


    });

