@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
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
                <form method="POST" action="/item/update/{{$item->id}}" enctype="multipart/form-data" style="padding-right: 30px;">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$item->name) }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select type="text" class="form-control" id="type" name="type" >
                                <option value="99"> 選択してください </option>
                                @foreach([1 => '珈琲', 2 => '食品', 3 => 'アイテム', 4 => 'その他',] as $value => $label)
                                <option value="{{ $value }}" {{ old('type', $item->type) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price',$item->price) }}">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="origin">産地</label>
                            <input type="text" class="form-control" id="origin" name="origin" value="{{ old('origin',$item->origin) }}">
                        @error('origin')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="level">焙煎度</label>
                            <select type="text" class="form-control" id="level" name="level">
                                <option value="99"> 選択してください </option>
                                @foreach([1 => '浅煎り', 2 => '中煎り', 3 => '深煎り', 4 => '--',] as $value => $label)
                                <option value="{{ $value }}" {{ old('level', $item->level) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        @error('level')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="rating">評価</label>
                            <select type="text" class="form-control" id="rating" name="rating">
                                <option value="99"> 選択してください </option>
                                @foreach([1 => '☆☆☆☆★', 2 => '☆☆☆★★', 3 => '☆☆★★★', 4 => '☆★★★★', 5 => '★★★★★',] as $value => $label)
                                <option value="{{ $value }}" {{ old('rating', $item->rating) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        @error('rating')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock',$item->stock) }}">
                        @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="detail">商品詳細</label>
                            <textarea rows="3" style="resize:none" type="text" class="form-control" id="detail" name="detail">{{ old('detail',$item->detail) }}</textarea>
                            <!-- <textarea rows="3" style="resize:none" id="detail" type="text" name="detail" class="form-control">{{ old('detail') }}</textarea> -->
                            <!-- <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail',$item->detail) }}"> -->
                        @error('detail')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="img">商品画像:</label>
                            <input id="img" type="file" name="img" class="form-control" value="{{ old('img',$item->img) }}">
                            <label for="img" class="form-label text-danger">*画像を変更しない場合は選択不要です</label>
                        @error('img')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        </div>

                        <div class="form-group">
                            <label for="comment">コメント</label>
                            <input type="text" class="form-control" id="comment" name="comment" placeholder="コメント">
                        @error('comment')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </form>
                <form method="POST" action="/item/destroy/{{$item->id}}" class="d-inline">
                @csrf
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" style="margin-top: 10px; margin-left: 20px;">削除</button>
                </form>
            </div>
        </div>
    </div>

    <!-- モーダル -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">削除の確認</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            本当にこの商品を削除しますか？
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <!-- 削除ボタンを押した際のアクションをここで実行する -->
            <form method="POST" action="/item/destroy/{{$item->id}}">
            @csrf
            <!-- @method('DELETE') -->
            <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

@stop

@section('css')
@stop

@section('js')
@stop
