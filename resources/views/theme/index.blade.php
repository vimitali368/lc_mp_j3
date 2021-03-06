@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Сайт портфолио</h1>
            @if($themes->count() > 0)
                <section class="featured-posts-section">
                    <div class="row">
                        @foreach($themes as $theme)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                                <a href="{{ route('theme.show', $theme->id) }}" class="blog-post-permalink">
                                    @if( $theme->randomPath() != '' )
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ asset('storage/' . $theme->randomPath()) }}"
                                             alt="{{ $theme->title }}">
                                    </div>
                                    @endif
                                    <p class="blog-post-category"></p>
                                    {{--                            <p class="blog-post-category">{{ $theme->category->title }}</p>--}}
                                    <h6 class="blog-post-title">{{ $theme->title }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="mx-auto" style="margin-top: -100px;">
                            {{ $themes->links() }}
                        </div>
                    </div>
                </section>
            @endif
            @if($randomPhotos->count() > 0)
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="widget-title">Случайные фото</h5>
                        <section>
                            <div class="row blog-post-row">
                                @foreach($randomPhotos as $photo)
                                    <div class="col-md-6 blog-post" data-aos="fade-up">
                                        <a href="{{ route('theme.show', $photo->theme->id) }}"
                                           class="blog-post-permalink">
                                            <div class="blog-post-thumbnail-wrapper">
                                                <img src="{{ $photo->path }}" alt="blog post">
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="blog-post-category">{{ $photo->theme->title }}</p>
                                            </div>
                                            <h6 class="blog-post-title">{{ $photo->description }}</h6>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection
