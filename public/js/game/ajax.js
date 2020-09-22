"use strict"
$(document).ready(function () {

    setInterval(() => $.ajax({
        type: "POST",
        url: '/newgame',
        data: {'load_data': 'ok'}, // serializes the form's elements.
        success: function (world_gen) {
            console.log(world_gen);
        }
    }), 2000);

});