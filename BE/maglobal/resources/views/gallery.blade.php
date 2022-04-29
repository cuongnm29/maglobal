@extends('layouts.details')
@section('content')
<section id="vg-main-body" class="page-area">
    <div class="wrapper">
        <!-- mainbody -->
        <div id="system-message-container">
        </div>
        @if(isset($gallery))
        <div class="item-page">
            <h2>
                <a href="#">{{$gallery->title}}</a>
            </h2>
            {!!$gallery->description!!}
            <div class="portfolios columns3">
                @foreach($gallery->media as $item)
                <div class="portfolio-item mycat-{{$item->id}}">
                    <a data-toggle="lightbox" href="#gallery-{{$item->id}}">
                        <img src="/storage/{{$item->id}}/{{$item->file_name}}" class="small-img">
                    </a>
                    <div id="#gallery-{{$item->id}}" class="lightbox fade" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class='lightbox-dialog'>
                            <div class='lightbox-content'>
                                <img src="/storage/{{$item->id}}/{{$item->file_name}}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <!-- mainbody -->

    </div>
</section>
@include('partials.frontend.service')
@include('partials.frontend.gallery')
@include('partials.frontend.about')
@include('partials.frontend.map')
@include('partials.frontend.contact')
@endsection