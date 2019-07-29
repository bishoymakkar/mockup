$(document).ready(function() {
    $('body').addClass('d-block').css({overflow: 'auto'});
    $(document).on('click', '.select-this-anchor', function(event) {
        event.preventDefault();
        let itemId = $(this).attr('data-id');
        if (!itemId || itemId == '') {
            alert('You must select a valid style configuration.');
        } else {
	        $('#selectThisForm').attr('action', $('#selectThisForm').attr('action') + '/' + itemId);
            $('#selectThisForm').submit();
        }
    });
});
$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 15,
    nav: false,
    dots: false,
    lazyLoad: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        576: {
            items: 2,
            nav: false
        },
        768: {
            items: 3,
            nav: false
        },
        992: {
            items: 4,
            nav: true,
            loop: false
        },
        1200: {
            items: 5,
            nav: true,
            loop: false
        }
    }
});
