<style>
            #section-works {
                background-image: url({{asset('images/works.png')}});
            }

            @media only screen and (-Webkit-min-device-pixel-ratio: 1.5),
            only screen and (-moz-min-device-pixel-ratio: 1.5),
            only screen and (-o-min-device-pixel-ratio: 3/2),
            only screen and (min-device-pixel-ratio: 1.5) {
                #section-works {
                    background-image: url({{asset('images/works@2x.png')}});
                }
            }

            ;
        </style>
        @if(isset($abums))
        <section id="section-works" class="page-area vg-section-image vg-color-2">
            <div class="wrapper">
                <hgroup class="title vg-white-force">
                    @if(isset($catWorks))
                    <h1><strong>{{$catWorks->title}}</strong></h1>
                    <p>{{$catWorks->description}}</p>
                    @endif
                </hgroup>
                <div class="entry">

                    <nav id="filter" data-option-key="filter" class="tax inverse">
                        <ul>
                        <li class="filter_current"><a href="#fliter" data-filter="*">All</a></li>
                            @foreach($abums as $abum)
                            <li><a href="javascript:void(0)" data-filter=".mycat-{{$abum->id}}">{{$abum->name}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                    <div class="portfolios columns3">
                        @foreach($abums as $abum)
                            <div class="portfolio-item mycat-{{$abum->id}}">
                                <a class="overlay" href="/gallery/{{$abum->id}}" title="{{$abum->title}}">
                                    <h3>{{$abum->title}}</h3>
                                    <p class="intro">{{$abum->description}}</p>
                                </a>
                                <a href="/gallery/{{$abum->id}}" class="item ">
                                    <img src="{{$abum->getFirstMediaUrl('image')}}" alt="{{$abum->title}}" /></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif