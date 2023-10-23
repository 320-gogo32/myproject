@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@700;800&family=Potta+One&family=Rampart+One&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!-- <h1>Dashboard</h1> -->
    <!-- <p style="font-size: 35px; font-family: 'Playpen Sans', serif;">Good Coffee Smile</p> -->
    <img src="/img/title_3.png" alt="珈琲豆" style="align-items: center;" height="100">
    <a style="font-size: 30px; font-family: 'Playpen Sans', serif;">　　　　　珈琲の時間を大切にする全ての人に</a>
    <img src="/img/coffee_3.jpg" alt="main" style="align-items: center;" width="100%" height="auto">



@stop

@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@600&family=Playpen+Sans:wght@700;800&family=Potta+One&family=Rampart+One&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <br>
    <img src="/img/title_1.png" alt="main" style="align-items: center;" width="75%" height="auto">

    <p style="font-size: 30px; font-family: 'Noto Sans JP', serif; text-align: center;">スペシャルティコーヒーの世界を知ろう！</p>
    <p style="font-size: 15px; font-family: 'Noto Sans JP', serif; text-align: center;">Explore the world of specialty coffee</p>
    <br>

    <div class="row">
        <div class="col-md-6">
            <br>
            <p style="font-size: 25px; font-family: 'Noto Sans JP', serif; text-align: center;">スペシャルティコーヒーとは？</p>
            <p style="font-size: 18px; font-family: 'Noto Sans JP', serif; ">　　　●流通量の5%がスペシャルティコーヒー</p>
            <p style="font-size: 15px; font-family: 'Noto Sans JP', serif; ">
            　　　　　コーヒーには、ワインのようにグレードが明確にあります。<br>
            　　　　そのグレードのトップ、世界全体の流通のたったの5%の特別な<br>
            　　　　コーヒーがスペシャルティコーヒーです。<br>
            　　　　　産地の小規模農家が質の高いコーヒーを創るために、精魂込めて<br>
            　　　　工夫を重ね生産しています。<br>
            　　　　　ひとたび口にすると、その味わいの心地よさや香りの豊かさに、<br>
            　　　　今までの飲んだことのあるコーヒーとの違いを感じるでしょう。
            </p>


            <p></p>
        </div>

        <div class="col-md-6">
            <img src="/img/coffee_4.png" alt="main" height="300">
        </div>



@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
