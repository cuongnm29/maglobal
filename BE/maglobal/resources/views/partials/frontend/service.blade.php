<style>
            #section-services {
                background-image: url({{asset('images/services.png')}});
            }
        </style>
        @if(isset($services))
        <section id="section-services" class="page-area vg-section-image vg-color-2">
            <div class="wrapper">
                <hgroup class="title">
                @if(isset($catService))
                    <h1><strong>{{$catService->title}}</strong></h1>
                    <p>{{$catService->description}}</p>
                    @endif
                </hgroup>
                <div class="entry ">
                    <div class="config">
                        @foreach($services as $service)
                        <div class="item">
                            <h2>{{$service->name}}</h2>
                            {!!$service->description!!}
                            <div class="thumbnail"><img
                                    src="{{$service->photo}}"
                                    alt="{{$service->name}}"></div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </section>       
        @endif