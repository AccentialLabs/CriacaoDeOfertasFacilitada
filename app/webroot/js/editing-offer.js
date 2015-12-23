/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function removeRow(row) {
    $("#row" + row).remove();
}

var mask = {
    money: function() {
        var el = this
                , exec = function(v) {
                    v = v.replace(/\D/g, "");
                    v = new String(Number(v));
                    var len = v.length;
                    if (1 == len)
                        v = v.replace(/(\d)/, "0.0$1");
                    else if (2 == len)
                        v = v.replace(/(\d)/, "0.$1");
                    else if (len > 2) {
                        v = v.replace(/(\d{2})$/, '.$1');
                    }
                    return v;
                };

        setTimeout(function() {
            el.value = exec(el.value);
        }, 1);
    }

}

$(function() {
    $('.current-input').bind('keypress', mask.money);
});