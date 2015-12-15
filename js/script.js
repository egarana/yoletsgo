$(document).ready(function() {
	$(".numberbox").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: +
            (e.keyCode == 107 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $('#fill-form').off().on('click', function(){
        $('input[name=name]').val('John');
        $('input[name=partnerName]').val('Jack');
        $('input[name=age]').val(34);
        $('input[name=emailAddress]').val('john@email.com');
        $('input[name=phoneNumber]').val('0361456789');
        $('input[name=address]').val('Jl. Nusa Kambangan');
        $('input[name=city]').val('Denpasar');
        $('input[name=favouriteSport]').val('Soccer');
        $('textarea[name=reason]').val('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam qu ');
    });
});