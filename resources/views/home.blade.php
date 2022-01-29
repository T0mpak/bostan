@extends('layouts.app')

@section('title', 'Главная')

@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/news-style.css') }}">
@endsection

@section('content')
    <div class="container1">
        <section class="our-news">
            <div class="news">
                <h3>"BOSTAN" официальная организация при АО "МУИТ"</h3>
                <br>
                <h5>Мы являемся студенческой организацией, которая проводит спортивные, культурно-массовые, патриотические мероприятия и семинары-тренинги.</h5>
                <p>Организация состоит из нескольких <span class="text-decoration-underline"><i>подразделений</i></span>:</p>
                    📌 Спорт<br>
                    📌 Киберспорт<br>
                    📌 Благотворительность<br>
                    📌 Кино-клуб<br>
                    📌 Дебаты<br>
                    📌 Studex<br>
                    📌 Шахматы<br>
                    📌 IT<br>
                    📌 Экология<br>
                    📌 Fashion design<br>
                <hr>
                <i><h4 style="color: #4D4D4D;">Вступай к нам, мы каждому рады!</h4></i>
            </div>
        </section>
    </div>
@endsection
