<ul>
    @foreach ($workers as $worker)
        <li id="{{ $worker->id }}" class="worker">
                <button class="btn btn-link">{{ $worker->post->name }} - {{ $worker->name }}</button>
        </li>
    @endforeach
</ul>