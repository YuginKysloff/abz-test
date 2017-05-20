<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Подробная информация</h4>
            </div>
            <div class="modal-body">
                <h3 class="page-header">{{ $vacancy->vacancy_name }}</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <p><strong>Компания: </strong> <a href="{{ $vacancy->employer_url }}" target="_blank">{{ $vacancy->employer_name }}</a></p>
                        <p><strong>Город: </strong> {{ $vacancy->city }}</p>
                        <hr>
                        <p><strong>Обязанности: </strong> {{ $vacancy->responsibility }}</p>
                        <p><strong>Требования: </strong> {{ $vacancy->requirement }}</p>
                        @if($vacancy->salary_from || $vacancy->salary_to)
                            <p><strong>Зарплата: </strong>
                                @if($vacancy->salary_from)
                                    <strong> от </strong> {{ $vacancy->salary_from }} {{ $vacancy->salary_currency }}
                                @endif
                                @if($vacancy->salary_to)
                                    <strong> до </strong> {{ $vacancy->salary_to }} {{ $vacancy->salary_currency }}
                                @endif
                            </p>
                        @endif
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <p><strong>Дата создания: </strong> {{ $vacancy->created_at->format('d-m-Y') }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p><strong>Последние изменения:</strong> {{ $vacancy->updated_at->format('d-m-Y') }}</p>
                            </div>
                        </div>
                        <p><strong>Ссылка на оригинал: </strong> <a href="{{ $vacancy->vacancy_url }}" target="_blank">{{ $vacancy->vacancy_url }}</a></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>