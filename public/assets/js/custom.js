/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(function(){
	$('#demoInput4').fileInput({
        iconClass: 'mdi mdi-fw mdi-upload'
    });
    if($(".datetimepicker").length) {
      $('.datetimepicker').daterangepicker({
        locale: {format: 'YYYY-MM-DD hh:mm a'},
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
      });
    }
    if($("#reservation_date").length) {
      $('#reservation_date').daterangepicker({
        locale: {format: 'MM/DD/YYYY'},
      });
    }
    $('#packages-table').DataTable({
        order: [[0, 'desc']]
    });
});