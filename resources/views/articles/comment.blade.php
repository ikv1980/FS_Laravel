{{-- Выыод комментариев  --}}
<div>
    @foreach ($comment as $el)
        <div class="comment">
            <p>{{ $el->text }}</p>
        </div>
    @endforeach
</div>

{{-- Добавление комментариев  --}}
<div>
<h2>Форма комментариев</h2>
{!! Form::open(['class' => 'article-form']) !!}
    {{ Form::label('text', 'Комментарий') }}
    {{ Form::textarea('text', '', ['placeholder' => 'Введите текст комментария']) }}

    {{ Form::submit('Добавить', ['class' => 'add-button']) }}
{!! Form::close() !!}
</div>