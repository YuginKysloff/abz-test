// Create task
$('#form__submit-button').on('click', function() {
    // alert();
    $.ajax({
        url: '/leblav/store',
        cache: false,
        data: jQuery("#form__create").serialize(),
        type: "POST",
        dataType: "json",
        success: function (data) {
            alert('success');
            var temp = jQuery.parseJSON(data);
            console.log(temp);
            // $('h1').html(data);
        },
        error: function(data) {
            alert('error');
            var temp = jQuery.parseJSON(data);
            console.log(temp);
        },
        complete: function () {
            $('#Modal').modal('hide');
        }
    });
});

// Delete task
function destroy(id) {
    $.ajax({
        url: '/leblav/destroy',
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
