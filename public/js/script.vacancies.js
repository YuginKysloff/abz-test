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
                $('#parser__button').attr('class','btn btn-default').text('Парсер выключен');
            } else {
                $('#parser__button').attr('class','btn btn-warning').text('Парсер включен');
            }
        }
    });
});

// get vacancy info in the modal window
$('#vacancies_list').on('click', '.vacancy_name', function() {
    $.ajax({
        url: '/2up/show',
        cache: false,
        data: {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'id': $(this).closest('tr').attr('id')
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

//Startup settings for dataTable plugin
$.extend( $.fn.dataTable.defaults, {
    language: {
        "processing": "Подождите...",
        "search": "Поиск по городу:",
        "lengthMenu": "Показать _MENU_ записей",
        "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
        "infoEmpty": "Записи с 0 до 0 из 0 записей",
        "infoFiltered": "(отфильтровано из _MAX_ записей)",
        "infoPostFix": "",
        "loadingRecords": "Загрузка записей...",
        "zeroRecords": "Записи отсутствуют.",
        "emptyTable": "В таблице отсутствуют данные",
        "paginate": {
            "first": "Первая",
            "previous": "Предыдущая",
            "next": "Следующая",
            "last": "Последняя"
        },
        "aria": {
            "sortAscending": ": активировать для сортировки столбца по возрастанию",
            "sortDescending": ": активировать для сортировки столбца по убыванию"
        }
    }
});

function parseDate(input,flag)
{
    switch(flag){
        case "P_DATE":
            st = input.split(/(\d+)\-(\d+)\-(\d+)/);
            output=st[3]+'.'+st[2]+'.'+st[1];
            return output;
        case "P_DATETIME":
            st = input.split(/(\d+)\-(\d+)\-(\d+)\ (\d+)\:(\d+)\:(\d+)/);
            output=st[3]+'.'+st[2]+'.'+st[1]+' '+st[4]+':'+st[5];
            return output;
        default:
            return "01.01.2000 00:00";
    }
}