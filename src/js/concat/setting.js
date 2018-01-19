$(document).ready(function () {
    var device_type = $('body').data('device'),
        bs_container_width= {
        sm: '540px',
        md: '720px',
        lg: '960px',
        xl: '1140px'
    };

    // Добавляем класс к textarea
    $('.textarea').addClass('form-control');

    // Инициализация tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });


    $(function () {
        if (device_type === 'desktop') {
            $('.navbar .dropdown').hover(function () {
                $(this).children('.dropdown-menu').stop(true, true).delay(100).fadeIn(200);
            }, function () {
                $(this).children('.dropdown-menu').stop(true, true).delay(100).fadeOut(200);
            });
        } else {
            $('.navbar .dropdown').addClass('dropdown-click').children('a').removeClass('dropdown-toggle');
            $('.dropdown-level-1 .nav-link').after('<a role="button" class="nav-link dropdown-toggle nav-link-toggle" data-toggle="dropdown" href="#"></a>');
        }
    });
});