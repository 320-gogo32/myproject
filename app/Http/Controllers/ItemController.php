<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        // $items = Item::all();

        // 追加項目
        $types = [
            1 => '珈琲',
            2 => '食品',
            3 => 'アイテム',
            4 => 'その他',
        ];
        $levels = [
            1 => '浅炒り',
            2 => '中炒り',
            3 => '深炒り',
        ];
        $ratings = [
            1 => '☆☆☆☆★',
            2 => '☆☆☆★★',
            3 => '☆☆★★★',
            4 => '☆★★★★',
            5 => '★★★★★',
        ];
        $items = Item::paginate(10);

        return view('item.index', compact('items', 'types', 'levels', 'ratings'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [[
                // 追加項目
                'name' => 'required|max:100',
                'price' => 'required|numeric',
                'type' => 'required|max:1',
                // 'origin'  => 'required|max:1',
                // 'level'  => 'required|max:1',
                'rating'  => 'required|max:1',
                'stock' => 'required|numeric',
                'detail' => 'required|max:500',
                'img' => 'nullable|max:50|mimes:jpg,jpeg,png,gif',
                // 'comment'  => 'required|max:100',
            ],
            [
                'name.required' => '*商品名は必須です',
                'name.max' => '*商品名は100文字以内です',
                'price.required' => '*価格は必須です',
                'price.numeric' => '*入力は数字のみです',
                'type.max' => '*種別は必須です',
                // 'origin' => '',
                // 'level' => '',
                'rating'  => '*評価は必須です',
                'stock.required' => '*在庫数は必須です',
                'stock.numeric' => '*入力は数字のみです',
                'detail.required' => '*商品詳細は必須です',
                'detail.max' => '*商品詳細は500文字以内です',
                'img.mimes' => '*画像のフォーマットが無効です',
                'img.max' => '*画像は50KB以内です',    
                // 'comment' => '',
            ]
            ]);

            // 追加項目
            // 新規登録に画像が含まれている場合にDBへ保存する方法
            $encoded_image=null;
            if ($request->hasFile('img')) {
                $image = file_get_contents($request->img);
                $encoded_image = base64_encode($image);
            }

            // 商品登録
            Item::create([
                'user_id' => 1 , //Auth::user()->id,
                'ID' => Auth::id(),
                'name' => $request->name,
                'price' => $request->price,
                'type' => $request->type,
                'origin' => $request->origin,
                'level' => $request->level,
                'rating' => $request->rating,
                'stock' => $request->stock,
                'detail' => $request->detail,
                'img' => $request->image,
            ]);

            return redirect('/items')->with('success', '商品を登録しました');;
        }

        return view('item.add');
    }

    // 追加項目（編集・追加）

    // 商品編集フォーム表示
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('item.edit', compact('item'));
    }

    // 商品を更新
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $request->validate([
            'name' => 'required|max:100', 
            'price' => 'required|numeric',
            'type' => 'required|max:1',
            'stock' => 'required|numeric',
            'detail' => 'required|max:500',
            'comment' => 'required|max:100', 
            'img'=> 'nullable|max:50|mimes:jpg,jpeg,png,gif',
        ],
        [
            'name.required' => '*商品名は必須です',
            'name.max' => '*商品名は100文字以内です',
            'price.required' => '*価格は必須です',
            'price.numeric' => '*入力は数字のみです',
            'type.max' => '*種別は必須です',
            'stock.required' => '*在庫数は必須です',
            'stock.numeric' => '*入力は数字のみです',
            'detail.required' => '*商品詳細は必須です',
            'detail.max' => '*商品詳細は500文字以内です',
            'comment' => '*編集理由を入力してください', 
            'comment.max' => '*編集理由は100文字以内です',
            'img.mimes' => '*画像のフォーマットが無効です',
            'img.max' => '*画像は50KB以内です',
        ]);

        $encoded_image=null;
        if ($request->hasFile('img')) {
            $image = file_get_contents($request->img);
            $encoded_image = base64_encode($image);
        

        // 商品をデータベースで更新
        $item->update([
            'user_id' => 1 ,//Auth::id(),
            'ID' => Auth::id(),
            'name' => $request->name, 
            'price' => $request->price,
            'type' => $request->type,
            'stock' => $request->stock,
            'detail' => $request->detail,
            'img' => $encoded_image,
            'comment' => $request->comment,
        ]);
        } else {
            $item->update([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'price' => $request->price,
                'type' => $request->type,
                'stock' => $request->stock,
                'detail' => $request->detail,
                'img' => $item->img, // 既存の画像データをそのまま使う
                'comment' => $request->comment,
    ]);
        }

        return redirect('/item')->with('success', '商品を更新しました');
    }

    // 商品削除
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect('/item')->with('success', '商品を削除しました');
    }

}
