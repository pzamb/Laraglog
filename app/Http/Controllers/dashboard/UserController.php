<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    }

    public function index()
    {
        $users = User::with('rol')->orderBy('created_at','desc')->simplePaginate(5);
        return view('dashboard.user.index',['users'=>$users]);
    }

    public function create()
    {
        return view('dashboard.user.create',['user' => new User()]);
    }

    
    public function store(StoreUserPost $request)
    {
        User::create(
            [
                'name' => $request['name'],
                'rol_id' => 1,
                'surname' => $request['surname'],
                'email' => $request['email'],
                'password' => $request['password'],
            ]
        );
        return back()->with('Maquina','Usuario CREADO CON EXITO');
    }

    public function show(User $user)
    {
        return view('dashboard.user.show',['user'=>$user]);
    }

    public function edit(User $user)
    {
        $this->authorize('edit',$user);
        return view('dashboard.user.edit',['user'=>$user]);
    }

    public function update(UpdateUserPut $request, User $user)
    {

        $this->authorize('update',$user);

        $user->update(
            [
                'name' => $request['name'],
                'surname' => $request['surname'],
                'email' => $request['email'],
            ]
        );
        return back()->with('Maquina','USUARIO ACTUALIZADO CON ÉXITO');
    }

    public function destroy($id)
    {
        $user->delete();
        return back()->with('Maquina','OBJETIVO ELIMINADO');
    }

}
