// get worker info in the modal window
$('#workers_list').on('click', '.worker_name', function() {
    $.ajax({
        url: '/admin/show',
        cache: false,
        data: {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'id': $(this).data('id')
        },
        type: "POST",
        dataType: "json",
        success: function (data) {
            $('#modal__wrapper').html(data.html);
        },
        complete: function () {
            $('#Modal').modal('show');
        }
    });
});

// get bosses list for chosen post
$('form[name=worker-crud] select[name=post]').on('change', function () {
    $.ajax({
        url: '/admin/get_bosses',
        cache: false,
        data: {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'post_id': $(this).val()
        },
        type: "POST",
        dataType: "json",
        success: function (data) {
            $('#boss').html(data.html);
        }
    });
});


$(function() {
    $('#workers_list').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('.panel-footer a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/img/loading2.gif" />');

        var url = $(this).attr('href');
        getWorkers(url);
        window.history.pushState("", "", url);
    });

    function getWorkers(url) {
        $.ajax({
            url: url,
            cache: false,
            data: {
                '_token': $('meta[name=csrf-token]').attr('content')
            },
            type: "POST",
            dataType: "json",
            success: function (data) {
                $('#workers_list').html(data.html);
            },
            error: function() {
                alert('Ошибка загрузки данных');
            }
        });
    }
});