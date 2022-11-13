@extends('layout/main')

{{-- передача данных из метода контроллера StaticController.php--}}
@section ('title'){{ $title }}@endsection  

@section ('content')
    <div class="presentation"></div>
@endsection

    