<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }

    public function edit(Request $request)
    {
        $user=User::find($request->id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user=User::find($request->id);
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required'
        ],
        [
            'name.required' => '*ユーザー名は必須です',
            'name.max' => '*ユーザー名は100文字以内です',
            'email.required' => '*emailは必須です'
        ]
        );

        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->save();
        return redirect('/user');
    }

    public function destroy(Request $request)
    {
        $user=User::find($request->id);
        
        $user->delete();
    
        return redirect('/user');
    }
}
