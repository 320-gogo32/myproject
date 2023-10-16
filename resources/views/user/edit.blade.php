@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ url('/user') }}" class="btn btn-default">一覧に戻る</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-primary">
                <form method="POST" action="/user/update/{{$user->id}}" enctype="multipart/form-data" style="padding-right: 30px;">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">ユーザー名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$user->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="email">メール</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$user->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="role">権限</label>
                            <input type="radio" name="role" required value="1" @if($user->role==1) checked @endif>管理者
                            <input type="radio" name="role" required value="0" @if($user->role==0) checked @endif>利用者
                        </div>

                    <div class="card-footer">
                        <button type="hidden" class="btn btn-primary">編集</button>
                    </div>
                </form>
                <form method="POST" action="/user/destroy/{{$user->id}}" class="d-inline">
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
            <form method="POST" action="/user/delete/{{$user->id}}">
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
