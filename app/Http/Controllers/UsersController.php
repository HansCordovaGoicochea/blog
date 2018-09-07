<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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


        //
        return view('mensajes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar el mensaje
//        DB::table('mensajes')->insert([
//            "nombre" => $request->input('nombre'),
//            "email" => $request->input('email'),
//            "mensaje" => $request->input('mensaje'),
//            "created_at" => Carbon::now(),
//            "updated_at" => Carbon::now(),
//        ]);

        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'email|required',
            'mensaje' => 'required|min:5'
        ]);
        //Guardar con ELOQUENT
        $mensaje = new Mensaje;
        $mensaje->nombre = $request->input('nombre');
        $mensaje->email = $request->input('email');
        $mensaje->mensaje = $request->input('mensaje');
        $mensaje->save();

//        Mensaje::created($request->all()); eliminar la linea de toquen y establecer los campos a guardar en el modelo con protect fillable y un array con los campos
        //redireccionar
        return redirect()->route('mensajes.index');
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

        return view('usuarios.edit', compact('user'));
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

        $user->update($request->all());

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
        $user->delete();

        return back()->with('info', 'Usuario eliminado');
    }
}