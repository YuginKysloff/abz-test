$('#parser__button').on('click', function() {
    // alert($(this).data('status'));
    $.ajax({
        url: '/2up/status',
        cache: false,
        data: {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'status': $(this).data('status')
        },
        type: "POST",
        dataType: "json",
        success: function (data) {
            alert(data.status);
        }
    });
});
