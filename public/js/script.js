// get worker info in the modal window
$('#table_workers').on('click', '.worker_name', function() {
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

if($('#workers_list').length != 0) {
    $.ajax({
        url: '/admin',
        cache: false,
        data: {
            '_token': $('meta[name=csrf-token]').attr('content'),
        },
        type: "POST",
        dataType: "json",
        success: function (data) {
            $('#workers_list').html(data.html);
        }
    });
}