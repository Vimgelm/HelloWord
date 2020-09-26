"use strict"
$(document).ready(function () {

    setInterval(() => $.ajax({
        type: "POST",
        url: '/newgame',
        data: {'load_data': 'ok'},
        success: function (world_gen_arr) {
            // render world generation arr in table
            var js = JSON.parse(world_gen_arr);
            console.log(js['1']['2']);
        }
    }), 2000);

});