$('#parser__button').on('click', function() {
    // alert($(this).attr('data-status'));
    $.ajax({
        url: '/2up/status',
        cache: false,
        data: {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'status': $(this).attr('data-status')
        },
        type: "POST",
        dataType: "json",
        success: function (data) {
            // alert(data.status);
            $('#parser__button').attr('data-status', data.status);
            if(data.status == 1) {
                $('#parser__button').attr('class','btn btn-success').text('Парсер выключен');
            } else {
                $('#parser__button').attr('class','btn btn-warning').text('Парсер включен');
            }
        }
    });
});
