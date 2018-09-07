<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Mensaje;
use Carbon\Carbon;
//use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\RegularExpressionTest; // puedo utilizar esta tbn para insertar a la db


class MensajesController extends Controller
{
    /**
     * MensajesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

//        $mensajes = DB::table('mensajes')->get();
        $mensajes = Mensaje::all();


        return view('mensajes.index', compact('mensajes'));
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
    public function store(CreateMessageRequest $request)
    {
        //Guardar el mensaje

        //Guardar con ELOQUENT
//        $mensaje = new Mensaje;
//        $mensaje->nombre = $request->input('nombre');
//        $mensaje->email = $request->input('email');
//        $mensaje->mensaje = $request->input('mensaje');
//        $mensaje->save();
        $mensaje = Mensaje::create($request->all()); //eliminar la linea de toquen y establecer los campos a guardar en el modelo con protect fillable y un array con los campos

        //si el usuario esta autenticado en la pagina
        if (auth()->check()){
            auth()->user()->mensajes()->save($mensaje);
        }
        //redireccionar
        return redirect()->route('mensajes.create')->with('info','Hemos recibido tu mensaje');
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
        $mensaje = Mensaje::findOrFail($id);

        return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
//        $mensaje = DB::table('mensajes')->where('id', $id)->first();
        $mensaje = Mensaje::findOrFail($id);

        return view('mensajes.edit', compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMessageRequest $request, $id)
    {


        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update($request->all());

        return redirect()->route('mensajes.index');
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

        $mensaje = Mensaje::findOrFail($id);
        $mensaje->delete();

        return redirect()->route('mensajes.index');
    }
}
