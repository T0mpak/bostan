@extends('layouts.app')

@section('title', 'News number: '.$new->id)

@section('style-css')
    <style>
        body {
            background-color: #f8f9fc;
            background-image: none;
        }
    </style>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ session('status') }}.
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $new->title }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{ $new->created_at->format('F d, Y') }} by Bostan</div>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset("/uploads/$new->file_path") }}" alt="Image..."></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{ $new->text }}</p>
                        <h2 class="fw-bolder mb-4 mt-5">{{ $new->title }}</h2>
                        <p class="fs-5 mb-4">{{ $new->text }}</p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            @if(auth()->user())
                                <form class="mb-4" action="{{ route('admin.comment.store') }}" method="post" id="form">
                                    @csrf

                                    <input type="hidden" name="news_id" value="{{ $new->id }}">

                                    <textarea id="input" name="body" class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                    @error('body')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                    <div><button type="submit" class="btn btn-dark btn-outline-dark text-light mt-2">Отправить комментарий</button></div>
                                </form>
                            @endif

                            <!-- Comment with nested comments-->
                            @foreach($comments as $comment)
                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-circle" width="50px" height="50px" src="{{ asset('/img/Graphicloads-Flat-Finance-Person.ico') }}">
                                    </div>
                                    <div class="ms-3">
                                        <div>
                                            <span class="fw-bold">{{ $comment->user->name }}</span> <span class="text-secondary">{{ $comment->created_at->format('Y-m-d g:m a') }}</span>
                                        </div>
{{--                                        <p class="text-small">{{ printf(str_replace(array("\r\n","\n"),'<br>', $comment->body)) }}</p>--}}
                                        <p class="text-small">{{  substr(print(nl2br($comment->body)), 0, -1) }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Последние новости</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach($news_3 as $n3)
                                        <li>
                                            <i><a class="text-decoration-none" href="{{ route('admin.news.show', $n3->id) }}">{{ $n3->title }}</a></i>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Temporary</div>
                    <div class="card-body">{{ $new->text }}</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#input').keydown(function(e) {
            if (!e.shiftKey && e.keyCode === 13) {
                $('#form').submit();
                e.preventDefault();
            }
        });
    </script>
@endsection
