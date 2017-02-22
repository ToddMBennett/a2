$(document).ready(function() {
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'split') {
            $('#splitBill').show() && $('#footBill').hide();
       }

       else {
            $('#footBill').show() && $('#splitBill').hide();
       }
   });
});
