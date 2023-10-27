@extends('adminlte::page')

@section('title', '商品一覧')

    <!-- Bootstrap5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

@section('content_header')
    <h1>Product list</h1>

    <!-- フラッシュメッセージの表示 -->
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" style="max-width: 500px;margin: 0 auto;margin-top: 10px;">
        <svg class="bi flex-shrink-0 me-2" width="1rem" height="1rem" role="img" aria-label="成功:"><use xlink:href="#check-circle-fill"/>
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="閉じる"></button>
            {{ session('success') }}
        </div>
    @endif

@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <div class="card-tools">
                        <div class="input-group input-group-sm">
                            @can('isAdmin')
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                            @endcan
                        </div>
                    </div>
                    <!-- 検索フォームのセクション -->
                    <div class="search mt-5">
                        <!-- 検索のタイトル -->
                        <h6>絞り込み検索</h6>
                        <!-- 検索フォーム GETメソッドで、商品一覧のルートにデータを送信 -->
                        <form action="/items" method="GET" class="row g-3">
                            <!-- 商品名検索用の入力欄 -->
                            <div class="col-sm-12 col-md-2">
                                <input type="text" name="search" class="form-control" placeholder="商品名" value="{{ request('search')}}">
                            </div>
                            <!-- 種別検索用の入力欄 -->
                            <div class="col-sm-12 col-md-2">
                                <!-- <input type="text" name="search" class="form-control" placeholder="商品名" value="{{ request('search')}}"> -->
                                <select type="text" name="type" class="form-control" id="type" placeholder="種別" value="{{ request('type')}}" >
                                <option value=""> 種別を選択 </option>
                                <option value="1" @if(request('type') == '1') selected @endif>珈琲</option>
                                <option value="2" @if(request('type') == '2') selected @endif>食品</option>
                                <option value="3" @if(request('type') == '3') selected @endif>アイテム</option>
                                <option value="4" @if(request('type') == '4') selected @endif>その他</option>
                            </select>
                            </div>
                            <!-- 最小価格の入力欄 -->
                            <div class="col-sm-12 col-md-2">
                                <input type="number" name="min_price" class="form-control" placeholder="最小価格" value="{{ request('min_price') }}">
                            </div>
                            <!-- <p class="align-middle">～</p> -->
                            <!-- 最大価格の入力欄 -->
                            <div class="col-sm-12 col-md-2">
                                <input type="number" name="max_price" class="form-control" placeholder="最大価格" value="{{ request('max_price') }}">
                            </div>
                            <!-- 絞り込みボタン -->
                            <div class="col-sm-12 col-md-1">
                                <button class="btn btn-outline-secondary" type="submit">絞り込み</button>
                            </div>
                        </form>
                        <!-- 検索条件をリセットするためのリンクボタン -->
                        <a href="/items" class="btn btn-success mt-3">検索条件を元に戻す</a>
                    </div>
                    <h3 class="card-title">List</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>商品画像</th>
                                <th>評価</th>
                                <!-- <th>焙煎度</th> -->
                                <th>種別</th>
                                <th>価格</th>
                                <th>在庫数</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="align-middle">{{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}</td>
                                    <td class="align-middle">{{ $item->id }}</td>
                                    <td class="align-middle">{{ $item->name }}</td>
                                    <td class="align-middle">
                                    @if ($item->img)
                                        <img src="data:image/*;base64,{{ $item->img }}" alt="{{ $item->name }}" class="img-thumbnail" width="80" height="80">
                                    @else
                                        画像なし
                                    @endif
                                    </td>
                                    <td class="align-middle">{{ $ratings[$item->rating] }}</td>
                                    <td class="align-middle">{{ $types[$item->type] }}</td>
                                    <td class="align-middle">{{ number_format($item->price) }}</td>
                                    <td class="align-middle">{{ number_format($item->stock) }}</td>
                                    <td class="align-middle"><a href="/item/detail/{{$item->id}}" class="btn btn-primary btn-sm mx-1">詳細</a></td>
                                    <td class="align-middle">
                                        @can('isAdmin')
                                        <a href="/item/edit/{{$item->id}}" class="btn btn-warning btn-sm mx-1">編集</a></td>
                                        @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{$items->appends(request()->query())->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <!-- Bootstrap5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@stop
