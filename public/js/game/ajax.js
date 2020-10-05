"use strict"
$(document).ready(function () {

    setInterval(() => $.ajax({
        type: "POST",
        url: '/newgame',
        data: {'load_data': 'ok'},
        success: function (world_gen_arr) {
            // render world generation arr in table
            var world_gen_obj = JSON.parse(world_gen_arr);
            $(".coordinates_row").text(world_gen_obj.coordinates['1']); //view current coordinate first mob
            $(".coordinates_col").text(world_gen_obj.coordinates['2']);
            for (var i in world_gen_obj) {
                for (var k in world_gen_obj[i]) {
                    if (world_gen_obj[i][k] === '@') { // colorize '@' in red color
                        $('tr.' + i + '> td.' + k).text(world_gen_obj[i][k]);
                        $('tr.' + i + '> td.' + k).css('color', 'red');
                    } else if (world_gen_obj[i][k] === '#') {
                        $('tr.' + i + '> td.' + k).text(world_gen_obj[i][k]);
                        $('tr.' + i + '> td.' + k).css('color', 'green');
                    } else if (world_gen_obj[i][k] === 'M') { //colorize mountain 'M' in black color
                        $('tr.' + i + '> td.' + k).text(world_gen_obj[i][k]);
                        $('tr.' + i + '> td.' + k).css('color', 'black');
                    } else { //colorize other in green color
                        $('tr.' + i + '> td.' + k).text(world_gen_obj[i][k]);
                        $('tr.' + i + '> td.' + k).css('color', 'white');
                    }
                }
            }
        }
    }), 1000);

});