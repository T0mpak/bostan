@extends('layouts.app')

@section('title', 'Новости')

@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/news-style.css') }}">
@endsection

@section('content')
    <div class="container1">
        <section class="our-news">
            <a href="{{ route('news') }}" style="text-decoration: none;">
                <h1 style="font-size: 56px; margin-bottom: 0.4em;"><strong>Новости</strong></h1>
            </a>

            @foreach($news as $new)
                <div class="news">
                    <div class="news-img">
                        <img src="{{ asset("/uploads/$new->file_path") }}">
                    </div>

                    <h3 class="news-title">
                        <a href="{{ route('news.single', $new->id) }}" class="text-decoration-none">{{ $new->title }}</a>
                    </h3>

                    <p class="news-content" style="overflow-wrap: break-word;  word-wrap: break-word; word-break: keep-all;">
                        {{ $new->text }}
                    </p>

                    <i>{{ $new->created_at->diffForHumans() }}</i>

                </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{ $news->links() }}
            </div>
        </section>
    </div>
@endsection
