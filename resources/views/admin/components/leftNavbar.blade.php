<div uk-height-viewport="expand: true" class="uk-width-1-6 uk-background-muted uk-padding-small uk-flex uk-flex-column uk-flex-between">
    <div>
        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
            <div class="uk-logo">
                {{$title}}
            </div>
            <li class="uk-nav-divider"></li>
            <li class="uk-nav-header">Header</li>
{{--            <li class="uk-active"><a href="#"><span class="uk-margin-small-right" uk-icon="icon: pencil"></span> Посты</a></li>--}}
            <li class=""><a href="#"><span class="uk-margin-small-right" uk-icon="icon: pencil"></span> Посты</a></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: comments"></span> Комментарии</a></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: menu"></span> Меню</a></li>

            <li class="uk-nav-divider"></li>
            <li class="uk-nav-header">Магазин</li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: comments"></span> Категории</a></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: comments"></span> Товары</a></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: comments"></span> Заказы</a></li>

            <li class="uk-nav-divider"></li>
            <li><a href="#"><img class="uk-margin-small-right" src="https://image.flaticon.com/icons/svg/633/633606.svg" uk-svg width="20" height="20"> Аналитика</a></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: user"></span> Пользователи</a></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: cog"></span> Система</a></li>
        </ul>
    </div>
    <div>
        <div class="uk-text-left uk-flex uk-flex-between uk-flex-middle">
            Привет, {{$user->login}}!
            <form id="logout" action="/admin/logout" method="get">
                <a onclick="document.getElementById('logout').submit();" class="uk-icon-button" uk-icon="sign-out"></a>
            </form>
        </div>
    </div>


</div>