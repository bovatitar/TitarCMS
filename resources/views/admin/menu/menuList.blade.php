<div class="uk-list uk-width-1-1">
    <div class="uk-flex uk-flex-between uk-width-1-1 uk-padding-small">
        <div class="uk-width-small">Название</div>
        <div class="uk-width-small">Создано</div>
        <div class="uk-width-small uk-text-right">Управление</div>
    </div>
    <ul class="uk-list uk-width-1-1 uk-padding-remove uk-list-striped" uk-sortable="handle: .uk-sortable-handle; group: menu">
        @foreach($menu as $menuItem)
            <li class="uk-width-1-1 uk-padding-small">
                <div>
                    <div class="uk-flex uk-flex-between uk-width-1-1">
                        <div class="uk-width-small"><span class="uk-sortable-handle uk-margin-small-right" uk-icon="icon: table"></span>{{$menuItem->name}}</div>
                        <div class="uk-width-small">{{date("m.d.Y H:i:s",strtotime($menuItem->created_at))}}</div>
                        <div class="uk-width-small uk-flex uk-flex-right">
                            <ul class="uk-iconnav">
                                <li><a href="/admin/menu/{{$menuItem->id}}" uk-icon="icon: pencil"></a></li>
                                {{--                        <li><a href="/admin/menu/{{$menuItem->id}}" uk-icon="icon: trash"></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class=" uk-list uk-padding-remove" uk-sortable="handle: .menu-item-sortable; group: menuItem">
                        @foreach($menuItem->items as $item)
                            <li class="uk-padding-remove">
                                <div class="uk-flex uk-flex-between uk-width-1-1">
                                    <div class="uk-width-small t-padding-small-left"><span class="menu-item-sortable uk-margin-small-right" uk-icon="icon: table"></span>{{$menuItem->name}}</div>
                                    <div class="uk-width-small">{{date("m.d.Y H:i:s",strtotime($menuItem->created_at))}}</div>
                                    <div class="uk-width-small uk-flex uk-flex-right">
                                        <ul class="uk-iconnav">
                                            <li><a href="/admin/menu/{{$menuItem->id}}" uk-icon="icon: pencil"></a></li>
                                            {{--                        <li><a href="/admin/menu/{{$menuItem->id}}" uk-icon="icon: trash"></a></li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>