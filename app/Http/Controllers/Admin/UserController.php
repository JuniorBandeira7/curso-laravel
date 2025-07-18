<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index() : View {
        $users = User::paginate(20); //User::all();

        return view('admin.users.index', ['users' => $users]);//passo o $user como 'user'
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request){
        User::create($request->validated());

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(string $id){
        //$user = User::where('id', '=', $id)->first();
        //$user = User::where('id', $id)->first(); //firstOrFail();
        if(!$user = User::find($id)){
            return redirect()->route('users.index')->with('message', 'Usuario não encontrado');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id){
        if(!$user = User::find($id)){
            return back()->with('message', 'Usuario não encontrado');
        }

        $data = $request->only('name', 'email');
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário editado com sucesso!');
    }

    public function show(string $id){
        if (Gate::denies('is-admin')){
            return back()->with('message', 'Você não é adm');
        }

        if (!$user = User::find($id)){
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id){
        if (!$user = User::find($id)){
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso');
    }
}
