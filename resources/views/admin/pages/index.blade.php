@extends('admin.layouts.app')

@section('content')
    <div uk-height-viewport="expand: true" class="uk-flex ">
        @include("admin.components.leftNavbar")
        <div class="uk-width-5-6 uk-padding-small">
            @include("admin.components.toolbar")
            @switch($routeName)
                @case("menu")
                    @include("admin.menu.menuList")
                    @break
            @endswitch
        </div>
    </div>

@endsection



