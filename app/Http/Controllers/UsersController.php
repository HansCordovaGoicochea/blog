<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('verificarrol:admin', ['except' => ['edit', 'update', 'show']]);


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('nombre', 'id');


        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RegisterUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserRequest $request)
    {

        $user = User::create($request->all());


        $user->roles()->attach($request->roles);

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
//        $mensaje = DB::table('mensajes')->where('id', $id)->first();
        $user = User::findOrFail($id);

        return view('usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $user = User::findOrFail($id);

        $this->authorize('edit', $user); //pasar el metodo que creemos en el UserPolicy junto con el usuarios autenticado

        $roles = Role::pluck('nombre', 'id');

        return view('usuarios.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

        $user= User::findOrFail($id);

        $this->authorize('update', $user); //pasar el metodo que creemos en el UserPolicy junto con el usuarios autenticado

        $user->update($request->only('name', 'email'));
        $user->roles()->sync($request->roles); //sync para evitar duplicaciones

        return back()->with('info', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
//        DB::table('mensajes')->where('id', $id)->delete();

        $user = User::findOrFail($id);
        $this->authorize('destroy', $user); //pasar el metodo que creemos en el UserPolicy junto con el usuarios autenticado
        $user->roles()->detach();

        $user->delete();

        return back()->with('info', 'Usuario eliminado');
    }
}