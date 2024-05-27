$(document).ready(function() {

    // calendar

    $('.logo-header').on('click', () => {
        window.location.href = '/jacar_project/index.php';
    });

    $('.logo-footer').on('click', () => {
        window.location.href = '/jacar_project/index.php';
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

    // services page

    $('.service').on('click', (e) => {
        const chosenService = $(e.target).attr('class').match(/\b(service-\d+)\b/)[0];
        window.location.href = '/jacar_project/service.php?service=' + chosenService;
    });

    // login / register

    $('#login-back, #register-back').on('click', () => {
        window.location.href = '/jacar_project/index.php';
    });
});