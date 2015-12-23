/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    $("#chose-enter-text").keyup(function() {
        var content = $("#chose-enter-text").val();
        var splitedContent = content.split(",");
        var returnContent = '';

        jQuery.each(splitedContent, function(i, val) {
            returnContent += "<span class='chose-tag' content-val='" + val + "-' id='" + val + "-'>" + val + "<strong class='chose-tag-close' id='strong-" + val + "-' onclick='clickChoseTagClose(this)'>x</strong></span>";
        });
        $("#chose-recebe").html(returnContent);
        $("#chose-recebe").val(returnContent);
    });

    //adiciona select color nos spans
    $("#teste").click(function() {
        $("span.chose-tag").prepend("<input type='color' class='chose-color'/>");
    });

    $("#result-see").click(function() {
        alert($("#chose-recebe").val());
    });

    //clique no X
    $(".chose-tag-close").click(function() {
        alert();
    });

    $(".chose-enter-text").live('keypress', function(e) {
        if (e.keyCode === 9) {
            e.preventDefault();
            alert("tab");
        }
    });



});

function clickChoseTagClose(element) {
    var id = $(element).attr("id");
    var replacedID = id.replace("strong-", "");
    alert(replacedID);
    $("#" + replacedID).remove();
}


