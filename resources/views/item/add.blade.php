@extends('adminlte::page')

@section('title', '商品登録')


@section('content_header')
    <h1>商品登録</h1>
@stop

    <!-- フラッシュメッセージの表示 -->
    @if(session('success'))
        <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" role="alert" style="max-width: 500px;margin: 0 auto;margin-top: 10px;">
        <svg class="bi flex-shrink-0 me-2" width="1rem" height="1rem" role="img" aria-label="成功:"><use xlink:href="#check-circle-fill"/>
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="閉じる"></button>
            {{ session('success') }}
        </div>
    @endif


@section('content')
    <div class="row">
        <div class="col-md-10">
            <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <div class="card card-primary">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="商品名">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select type="text" class="form-control" id="type" name="type" >
                                <option value="99"> 選択してください </option>
                                <option value="1" @if(old('type') == '1') selected @endif>珈琲</option>
                                <option value="2" @if(old('type') == '2') selected @endif>食品</option>
                                <option value="3" @if(old('type') == '3') selected @endif>アイテム</option>
                                <option value="4" @if(old('type') == '4') selected @endif>その他</option>
                            </select>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="価格">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="origin">産地</label>
                            <input type="text" class="form-control" id="origin" name="origin" placeholder="産地">
                        @error('origin')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="level">焙煎度</label>
                            <select type="text" class="form-control" id="level" name="level">
                            <option value="99"> 選択してください </option>
                                <option value="1" @if(old('type') == '1') selected @endif>浅炒り</option>
                                <option value="2" @if(old('type') == '2') selected @endif>中炒り</option>
                                <option value="3" @if(old('type') == '3') selected @endif>深炒り</option>
                                <option value="4" @if(old('type') == '4') selected @endif>--</option>
                            </select>
                        @error('level')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="rating">評価</label>
                            <select type="text" class="form-control" id="rating" name="rating">
                            <option value="99"> 選択してください </option>
                                <option value="1" @if(old('type') == '1') selected @endif>☆☆☆☆★</option>
                                <option value="2" @if(old('type') == '2') selected @endif>☆☆☆★★</option>
                                <option value="3" @if(old('type') == '3') selected @endif>☆☆★★★</option>
                                <option value="4" @if(old('type') == '4') selected @endif>☆★★★★</option>
                                <option value="4" @if(old('type') == '5') selected @endif>★★★★★</option>
                            </select>
                        @error('rating')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>


                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数">
                        @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="detail">商品詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        @error('detail')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="img">商品画像:</label>
                            <input id="img" type="file" name="img" class="form-control" value="{{ old('img') }}">
                        @error('img')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
