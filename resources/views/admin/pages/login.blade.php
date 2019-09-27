@extends('admin.layouts.app')

@section('content')
    <div uk-height-viewport="expand: true" class="uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-width-1-1">
        <h3>{{$title}} - Админ-панель</h3>
        <form onsubmit="event.preventDefault(); auth(event.target);">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input name="login" placeholder="Логин" class="uk-input" type="text">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                    <input name="password" placeholder="Пароль" class="uk-input" type="password">
                </div>
            </div>
            <div class="uk-width-1-1 uk-flex uk-flex-center">
                <button class="uk-button uk-button-primary">
                    Войти
                </button>
            </div>
        </form>
    </div>

@endsection



