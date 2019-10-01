<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="/admin">{{$title}}</a>
        <ul class="uk-navbar-nav">
            <li class=""><a href="/admin/products">Товары</a></li>
            <li>
                <a href="/admin/orders">Заказы</a>
            </li>
            <li><a href="/admin/emails">Email подписка</a></li>
            <li><a href="/admin/contacts">Контакты</a></li>
        </ul>
    </div>
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li>
                <a href="#" onclick="logout()">Выйти</a>
            </li>
        </ul>
    </div>
</nav>
