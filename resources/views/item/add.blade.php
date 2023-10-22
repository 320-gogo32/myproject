@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

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

            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ url('/items') }}" class="btn btn-default">一覧に戻る</a>
                        </div>
                    </div>
                </div>
            </div>

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
