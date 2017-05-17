// Create task
$('#form__submit-button').on('click', function() {
    // alert();
    $.ajax({
        url: '/leblav/todo/store',
        cache: false,
        data: jQuery("#form__create").serialize(),
        type: "POST",
        dataType: "json",
        success: function (data) {
            $('#message').html(data.html);
            $('#Modal').modal('hide');
        },
        error: function(data) {
            // console.log(data.responseJSON);
            $.each(data.responseJSON, function(i, val) {
                $('#'+i).after(val);
            });
        }
    });
});

// Delete task
function destroy(id) {
    $.ajax({
        url: '/leblav/todo/destroy',
        cache: false,
        data: {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'id': id
        },
        type: "POST",
        dataType: "json",
        success: function (data) {
            $('#task'+data.id).hide();
        }
    });
}
