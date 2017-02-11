<div class="col-md-3">

    @foreach($laravelAdminMenus->menus as $section)
        @if($section->items)
            <div class="panel panel-default panel-flush">
                <div class="panel-heading">
                    {{ $section->section }}
                </div>

                <div class="panel-body">
                    <ul class="nav" role="tablist">
                        @foreach($section->items as $menu)
                            <li role="presentation">
                                <a href="{{ url($menu->url) }}">
                                    {{ $menu->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endforeach
</div>
