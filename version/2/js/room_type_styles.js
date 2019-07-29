$(document).ready(function() {
    $(document).on('click', '.owl-carousel .owl-item .item .item-overlay', function(event) {
        event.preventDefault();
        let itemImg = $(this).siblings('img');
        $('body').css({ backgroundImage: 'url(' + itemImg.attr('src') + ')' });
        let itemId = itemImg.attr('data-id');
        $('#selectThisInputId').val(itemId);
        $('#selectThisForm').attr('action', $('#selectThisForm').attr('action') + '/' + itemId);
        $('.item-overlay-check').hide();
        $(this).find('.item-overlay-check').show();
    });
    $(document).on('click', '#selectThisInputSubmit', function(event) {
        event.preventDefault();
        if (!$('#selectThisInputId').val() || $('#selectThisInputId').val() == '') {
            alert('You must select a room type first.');
        } else {
            $(this).parent('form').submit();
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
