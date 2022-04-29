@if(isset($sliders))
<section id="featured" class="flexslider">
    <ul class="slides">
        @foreach($sliders as $slider)
        <li>
            <div class="slide_content oneColumn">
                <h1 class="vg-firstTitle">{{$slider->title}}</h1>
                {!! $slider->description!!}
                <p id="btns"><a class="van_large_btn anchor" href="{{$slider->link}}" target="_self"
                        style="float: none; margin: auto; background: #55ac4a; color: #fff;">More Details</a>
                </p>
            </div>
            <div class="slide_bg" style="background:#000000"><img src="{{$slider->photo}}" alt="One page" /></div>
        </li>
        @endforeach
    </ul>
</section>
@endif
<script>
//adding height to the top
jQuery(document).ready(function($) {
    $('.home #top').addClass('vg-TopHeight');
    $('.flexslider').flexslider({
        slideshow: true
    });
});
</script>