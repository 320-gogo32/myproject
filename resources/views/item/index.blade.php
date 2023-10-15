@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
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
                                    <!-- <td class="align-middle">{{ $levels[$item->level] }}</td> -->
                                    <td class="align-middle">{{ $types[$item->type] }}</td>
                                    <td class="align-middle">{{ number_format($item->price) }}</td>
                                    <td class="align-middle">{{ number_format($item->stock) }}</td>
                                    <td class="align-middle"><a href="/item/detail/{{$item->id}}" class="btn btn-primary btn-sm mx-1">詳細</a></td>
                                    <td class="align-middle"><a href="/item/edit/{{$item->id}}" class="btn btn-primary btn-sm mx-1">編集</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
