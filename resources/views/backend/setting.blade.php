@extends('backend.layouts.app')

@section('content')

<div class="container">
    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
        <p>{{ Session::get('status') }}</p>
        </div>
    @endif
    <form action="{{ route('admin.setting.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
        <label for="">Url callback для Telegrambot</label>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Действие</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="document.getElementById('url_callback_bot').value = '{{ url('')}}'">Вставить url</a>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit();">Отправить информацию</a>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit();">Получить информацию</a>
            </div>
        </div>
        <input type="url" class="form-control" id="url_callback_bot" name="url_callback_bot" value="{{ $url_callback_bot ?? ''}}">
        </div>
        
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

    <form action="{{ route('admin.setting.setwebhook') }}" id="setwebhook" method="POST" style="display: none">
        {{ csrf_field() }}
        <input type="hidden" name="url" value="{{ $url_callback_bot ?? ''}}">
    </form>

    <form action="{{ route('admin.setting.getwebhookinfo') }}" id="getwebhookinfo" method="POST" style="display: none">
        {{ csrf_field() }}
    </form>
</div>
    
@endsection