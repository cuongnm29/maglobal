@if(isset($abouts))
<section id="section-about" class="page-area vg-section-image vg-color-2">
    <div class="wrapper">
        <hgroup class="title ">
            @if(isset($catAbout))
            <h1><strong>{{$catAbout->title}}</strong></h1>
            <p>{{$catWorks->description}}</p>
            @endif
        </hgroup>
        <div class="entry">
            <div class="new-main">
                <div class=new-main-left>
                    <div class="flexslider vg-slide-about-98">
                        <ul class="slides maxHeight">
                            @foreach($abouts as $about)
                            <li>
                                <img src="{{$about->photo}}"
                                    alt="About, first image" />
                                <div class="new-main-content">
                                    <h2><a href="/blog/{{$about->id}}/{{$about->slug}}">{{$about->title}}</a></h2>
                                    <div class="desc">
                                       {!!$about->summary!!}
                                    </div>
                                    <div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class=new-main-right>
                    <div class="new-other">
                        <ul>
                        @foreach($news as $new)
                            <li>
                                <div class="item">
                                    <div class="left"><img
                                            src="{{$new->photo}}"></div>
                                    <div class="right">
                                    <div class="tag"><a href="/blog/{{$new->id}}/{{$new->slug}}">{{$new->catname}}</a></div>
                                        <h2><a href="/blog/{{$new->id}}/{{$new->slug}}">{{$new->title}}</a></h2>
                                        <div class="date">{{$new->created_at}}</div>
                                       
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <script>
        //adding height to the top
        jQuery(document).ready(function($) {
            $('.vg-slide-about-98').flexslider({
                slideshow: false
            });
        });
        </script>




    </div>
</section>
@endif