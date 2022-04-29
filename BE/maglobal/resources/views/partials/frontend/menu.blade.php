<nav id="primary-menu">
    <div class="wrapper">
        <h1 id="site-logo"><a href="/#top" title="Simple Key"></a></h1>
        <div id="primary-menu-container">

            <ul class="menu">
                @if(isset($categories))
                @foreach($categories as $category)
                <li class="item-{{$category->id}} deeper {{count($category->child)>0? 'parent':''}}"><a href='
                            @switch($category->istype)
                                @case(1)
                                    {{"#section-blog"}}
                                    @break;
                                @case(2)
                                    {{"#section-about"}}
                                    @break;
                                @case(3)
                                    {{"#section-services"}}
                                    @break;
                                @case(4)
                                   {{"#section-contact"}}
                                   @break;
                                @default
                                    {{"#section-works"}}
                            @endswitch    
                        '>{{$category->name}}</a>
                    @if(count($category->child)>0)
                    <ul class="sub-menu">
                        @foreach($category->child as $child)
                        <li class="item-{{$child->id}}"><a href='@switch($category->istype)
                                @case(1)
                                    {{"/blog"}}
                                    @break;
                                @case(2)
                                    {{"/blog/$child->id/$child->slug"}}
                                    @break;
                                @case(3)
                                    {{"/blog/$child->id/$child->slug"}}
                                    @break;
                                @case(4)
                                   {{"#section-contact"}}
                                   @break;
                                @default
                                    {{"#section-works"}}
                            @endswitch '>{{$child->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
                @endif
                @if(count(config('panel.available_languages', [])) > 1)
                <li class="nav-item dropdown d-md-down-none">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <ul class="sub-menu">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                        <li> <a
                            href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                         ({{ $langName }})</a></li>
                @endforeach
                 </ul>
            </li>
            @endif
            </ul>
        </div>
        <!--Mobile menu-->
        <div id="mobileMenu"></div>
    </div>
</nav>