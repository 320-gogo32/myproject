@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1>商品詳細</h1>
    <div class="card-header">
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <div class="input-group-append">
                    <a href="{{url()->previous()}}" class="btn btn-default" >商品一覧に戻る</a> <!-- 元いたページに戻る実装 -->
                    <!-- <a href="{{ url('/items') }}" class="btn btn-default">一覧に戻る</a> -->
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')

<div align="center p-0" style="background: #d4e9e2; border-radius: 4px;">
<p style="font-weight: bold; color:rgb(30, 57, 50); text-align: center;padding: 10px 5px; font-size: 25px;">Welcome to the coffee shop</p>
</div>

<div id="bottom-info" style="background: rgb(30, 57, 50);"> <!-- rgb(30, 57, 50) --> <!-- rgb(255, 215, 0) -->

        <div class="row">
            <!-- 左側の画像表示 -->
            <div class="col-md-4">
            @if ($item->img)
                <img src="data:image/*;base64,{{ $item->img }}" alt="{{ $item->name }}" class="img-thumbnail" width="400" height="200"
                style="margin-top: 50px; margin-left: 30px; margin-right: 50px; margin-bottom: 25px;">
            @else
            画像なし
            @endif
            </div>
            <div class="col-md-4" style="color:white">
                <br>
                <p style="font-size: 18px;">{{ $types[$item->type] }}</p>
                <br>
                <h3>　{{ $item->name }}</h3>
                <h5>　　Made in ： {{ $item->origin }}</h5>
                <br>


                <p style="font-size: 50px;">　¥ {{ number_format($item->price) }}</p>
                <p style="font-size: 18px;">　　在庫数 ：{{ number_format($item->stock) }} 個</p>
                <br>
                <p style="font-size: 18px;">おすすめ ： {{ $ratings[$item->rating] }}</p>
                <p style="font-size: 18px;">
                @if (isset($levels[$item->level]))
                    焙煎 ：{{ $levels[$item->level] }}
                @else
                    --
                @endif
                </p>

            </div>
            <div class="col-md-4" style="color:white">
                <img src="/img/deco1_3.png" alt="珈琲豆" style="float: right;" height="450">

            </div>
        </div>
</div>
<div>
    <p style="font-weight: bold; font-size: 16px; color:#999999">商品説明</p>
    <p style="font-size: 20px;">{!!nl2br(e($item->detail))!!}</p>
</div>



@stop

@section('css')

@stop

@section('js')
@stop
