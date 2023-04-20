<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPutRequest;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function insert() {
        if(isset($error)) {
            dd($error);
        }
        return view('user.insert');
    }

    public function store(UserPostRequest $request) {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        $user->save();
        $request->session()->flash('success', 'O usuário foi criado com sucesso.');
        return redirect()->route('user.insert');
    }

    public function list(Request $request) {
        $users = User::orderBy('id', 'ASC')->get();;
        return view('user.list', ['users'=>$users]);
    }

    public function edit(Request $request, User $user) {
        $users = User::all();
        return view('user.edit', ['users'=>$users, 'user'=>$user]);
    }

    public function update(UserPutRequest $request, User $user) {
        $validated = $request->validated();
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password))
            $user->password = Hash::make($request->password);
        
        $user->update();
        $request->session()->flash('success', 'O usuário foi editado com sucesso.');
        return redirect()->route('user.list');
    }

    public function delete(Request $request, User $user) {
        $user->delete();
        $request->session()->flash('success', 'O usuário foi deletado com sucesso.');
        return redirect()->route('user.list');
    }
}
