@extends('layouts.details')
@section('content')
<section id="vg-main-body" class="page-area">
    <div class="wrapper">
        <!-- mainbody -->
        <div id="system-message-container">
        </div>
        @if(isset($blog))
        <div class="item-page">
            <h2>
                <a href="#">{{$blog->title}}</a>
            </h2>
            <dl class="article-info">
                @if(isset($cat_blog))
                <dd class="category-name">
                    Category: <a href="/index.php/works/portfolios-4-columns">{{$cat_blog->name}}</a> </dd>
                @endif
                <dd class="published">
                    Published: {{$blog->created_at}} </dd>
            </dl>

            {!!$blog->summary!!}
            {!!$blog->content!!}
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