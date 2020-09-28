"use strict"
$(document).ready(function () {

    setInterval(() => $.ajax({
        type: "POST",
        url: '/newgame',
        data: {'load_data': 'ok'},
        success: function (world_gen_arr) {
            // render world generation arr in table
            var world_gen_obj = JSON.parse(world_gen_arr);
            for (var i in world_gen_obj) {
                for (var k in world_gen_obj[i]) {
                    $('tr.'+i + '> td.' +k).text(world_gen_obj[i][k]);
                }
            }
        }
    }), 4000);

});