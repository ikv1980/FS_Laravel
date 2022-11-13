@extends('layout/main')

{{-- передача данных из метода контроллера StaticController.php--}}
@section ('title'){{ $title_page }}@endsection

@section ('content')
    {{-- ВАРИАНТ №1: Вывод данных четыре раза --}}
    <h2>Вариант №1 (4 раза вывел одни и те же данные)</h2>
    @if(count($parameter) > 0)
        @for ($i = 0; $i < 4; $i++)
            <div class="blog">
                <h2>{{ $parameter['RecTitle'] }}</h2>
                <p>{{ $parameter['RecText'] }}</p>
                <button>Детальное</button>
            </div>            
        @endfor
    @endif

    {{-- ВАРИАНТ №2: Вывод данных с добавление индекса --}}
    <h2>Вариант №2 (вывод разных даннх + добавление индекса)</h2>
    @if(count($parameters) > 0)
        @foreach ($parameters as $index=>$value)
            <div class="blog">
                <h2>{{ $value['Title'] }} №{{ $index +1 }}</h2>
                <p>{{ $value['Text'] }}</p>
                <button>Детальное</button>
            </div>            
        @endforeach
    @endif
@endsection