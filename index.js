$(document).ready(function() {

    // calendar

    $('.logo-header').on('click', () => {
        window.location.href = '/jacar_project/index.html';
    });

    $('.logo-footer').on('click', () => {
        window.location.href = '/jacar_project/index.html';
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
        window.location.href = '/jacar_project/service.html?service=' + chosenService;
    });

    // service page

    const services = [
        {
            id: 'service-1',
            name: 'Wymiana akumulatora',
            img: 'service-1.jpg',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac lacus nec orci tincidunt tincidunt. Nullam nec nisl in mi ultrices aliquet. Donec nec dolor nec orci ultricies tincidunt. Cras nec nunc nec justo tincidunt ultrices. Sed nec nisl nec ipsum sollicitudin fermentum. Donec nec nisl nec nunc ultricies tincidunt.',
            price: '200 zł'
        },
        {
            id: 'service-2',
            name: 'Klocki hamulcowe',
            img: 'service-2.jpg',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac lacus nec orci tincidunt tincidunt. Nullam nec nisl in mi ultrices aliquet. Donec nec dolor nec orci ultricies tincidunt. Cras nec nunc nec justo tincidunt ultrices. Sed nec nisl nec ipsum sollicitudin fermentum. Donec nec nisl nec nunc ultricies tincidunt.',
            price: '150 zł'
        },
        {
            id: 'service-3',
            name: 'Wymiana oleju',
            img: 'service-3.jpg',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac lacus nec orci tincidunt tincidunt. Nullam nec nisl in mi ultrices aliquet. Donec nec dolor nec orci ultricies tincidunt. Cras nec nunc nec justo tincidunt ultrices. Sed nec nisl nec ipsum sollicitudin fermentum. Donec nec nisl nec nunc ultricies tincidunt.',
            price: '100 zł'
        },
        {
            id: 'service-4',
            name: 'Naprawa klimatyzacji',
            img: 'service-4.jpg',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac lacus nec orci tincidunt tincidunt. Nullam nec nisl in mi ultrices aliquet. Donec nec dolor nec orci ultricies tincidunt. Cras nec nunc nec justo tincidunt ultrices. Sed nec nisl nec ipsum sollicitudin fermentum. Donec nec nisl nec nunc ultricies tincidunt.',
            price: '300 zł'
        
        },
        {
            id: 'service-5',
            name: 'Wymiana opon',
            img: 'service-5.jpg',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac lacus nec orci tincidunt tincidunt. Nullam nec nisl in mi ultrices aliquet. Donec nec dolor nec orci ultricies tincidunt. Cras nec nunc nec justo tincidunt ultrices. Sed nec nisl nec ipsum sollicitudin fermentum. Donec nec nisl nec nunc ultricies tincidunt.',
            price: '50 zł'
        },
        {
            id: 'service-6',
            name: 'Geometria kół',
            img: 'service-6.jpg',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac lacus nec orci tincidunt tincidunt. Nullam nec nisl in mi ultrices aliquet. Donec nec dolor nec orci ultricies tincidunt. Cras nec nunc nec justo tincidunt ultrices. Sed nec nisl nec ipsum sollicitudin fermentum. Donec nec nisl nec nunc ultricies tincidunt.',
            price: '80 zł'
        
        },
        {
            id: 'service-7',
            name: 'Badanie diagnostyczne',
            img: 'service-7.jpg',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac lacus nec orci tincidunt tincidunt. Nullam nec nisl in mi ultrices aliquet. Donec nec dolor nec orci ultricies tincidunt. Cras nec nunc nec justo tincidunt ultrices. Sed nec nisl nec ipsum sollicitudin fermentum. Donec nec nisl nec nunc ultricies tincidunt.',
            price: '100 zł'
        },
        {
            id: 'service-8',
            name: 'Przegląd techniczny',
            img: 'service-8.jpg',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac lacus nec orci tincidunt tincidunt. Nullam nec nisl in mi ultrices aliquet. Donec nec dolor nec orci ultricies tincidunt. Cras nec nunc nec justo tincidunt ultrices. Sed nec nisl nec ipsum sollicitudin fermentum. Donec nec nisl nec nunc ultricies tincidunt.',
            price: '150 zł'
        
        }
    ];

    const urlParams = new URLSearchParams(window.location.search);
    const service = urlParams.get('service');

    if (service) {
        const serviceImg = $('.service-img');
        const serviceName = $('.service-name');
        const serviceDescription = $('.service-description');
        const servicePrice = $('.service-price');

        const chosenService = services.find(s => s.id === service);

        serviceImg.attr('src', './assets/' + chosenService.img);
        serviceName.text(chosenService.name);
        serviceDescription.text(chosenService.description);
        servicePrice.text(chosenService.price);
    }
});