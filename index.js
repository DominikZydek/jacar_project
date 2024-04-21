$(document).ready(function() {

    $('.logo-header').on('click', () => {
        window.location.href = '/';
    });

    $('.logo-footer').on('click', () => {
        window.location.href = '/';
    });

    $('.menu-toggle').on('click', () => {
        $('.menu-dropdown').toggleClass('active');
    });

    $("#datepicker").datepicker({
        firstDay: 1,
        dateFormat: 'yy-mm-dd',
        dayNamesMin: ['Nd', 'Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'So'],
        monthNames: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
        minDate: 0,
        maxDate: '+1M',
        onSelect: function(dateText) {
            $("#date").val(dateText);
        }
    });
});