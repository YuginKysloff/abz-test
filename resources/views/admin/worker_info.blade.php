<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Подробная информация</h4>
            </div>
            <div class="modal-body">
                <h1>{{ $worker->name }}</h1>
                <h2>{!! $worker->post->name !!}</h2>
                <div class="row">
                    <div class="col-sm-7">
                        <p><strong>Начальник:</strong> {{ $worker->boss_name }} - {{ $worker->boss_post }}</p>
                        <p><strong>Зарплата:</strong> {{ $worker->salary }}</p>
                        <p><strong>Принят:</strong> {{ $worker->created_at->format('d-m-Y') }}</p>
                        <p><strong>Последние изменения:</strong> {{ $worker->updated_at->format('d-m-Y') }}</p>
                    </div>
                    <div class="col-sm-5">
                        <img src="{{ asset('/uploads/avatars/'.$worker->avatar) }}" alt="{{ $worker->name }}" class="img-thumbnail center-block">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>