$(document).ready(function () {
    $(".alert").delay(5000).slideUp(200, function () {
        $(this).alert('close');
    });

    $('th[data-href]').on('click', function () {
        window.location.href = $(this).attr('data-href');
    });
});