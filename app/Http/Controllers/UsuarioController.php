<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use App\Models\Rol;
use App\Models\Unidad;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function loginView(){

        $visitas=Pagina::where('url','loginView')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('login',compact('visitas'));
    }

    public function login(Request $request){
        $this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string',
        ]);

        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)){ 
            return redirect(route('usuario.documento.index'));
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no concuerdan con nuestros registros.'])
        ->withInput(request(['email']));
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect(route('loginview'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=Usuario::join('rol','rol.id','usuario.id_rol')
        ->join('unidad','unidad.id','usuario.id_unidad')->select('usuario.*','rol.nombre as nombre_rol','unidad.nombre as nombre_unidad')->get();
        
        $visitas=Pagina::where('url','administrador.usuario.index')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);
        
        return view('admin.usuario.index',compact('usuarios'),compact('visitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Rol::all();
        $unidades=Unidad::all();

        $visitas=Pagina::where('url','administrador.usuario.create')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('admin.usuario.create',compact('roles','unidades'),compact('visitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'ci'=>'required',
            'email'=>'required',
            'password'=>'required',
            'nombre'=>'required',
            'ap_paterno'=>'required',
            'ap_materno'=>'required',
            'telefono'=>'required',
            'id_rol'=>'required',
            'id_unidad'=>'required',
        ]);

        $data=[
            'ci'=>$request->ci,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'nombre'=>$request->nombre,
            'ap_paterno'=>$request->ap_paterno,
            'ap_materno'=>$request->ap_materno,
            'telefono'=>$request->telefono,
            'id_rol'=>$request->id_rol,
            'id_unidad'=>$request->id_unidad,
        ];

        $usuario=Usuario::create($data);
        return redirect(route('administrador.usuario.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $usuario=Usuario::join('rol','rol.id','usuario.id_rol')
        ->join('unidad','unidad.id','usuario.id_unidad')
        ->where('usuario.id',$usuario->id)
        ->select('usuario.*','rol.nombre as nombre_rol','unidad.nombre as nombre_unidad')->first();
        $roles=Rol::all();
        $unidades=Unidad::all();
        
        $visitas=Pagina::where('url','administrador.usuario.edit')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('admin.usuario.edit',compact('roles','unidades'),compact('usuario','visitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $this->validate(request(),[
            'ci'=>'required',
            'email'=>'required',
            //'password'=>'required',
            'nombre'=>'required',
            'ap_paterno'=>'required',
            'ap_materno'=>'required',
            'telefono'=>'required',
            'id_rol'=>'required',
            'id_unidad'=>'required',
        ]);

        $data=[
            'ci'=>$request->ci,
            'email'=>$request->email,
            //'password'=>$request->password,
            'nombre'=>$request->nombre,
            'ap_paterno'=>$request->ap_paterno,
            'ap_materno'=>$request->ap_materno,
            'telefono'=>$request->telefono,
            'id_rol'=>$request->id_rol,
            'id_unidad'=>$request->id_unidad,
        ];

        if (!is_null($request->password)){
            $usuario->update(['password'=>Hash::make($request->password)]);
        }

        $usuario->update($data);
        return redirect(route('administrador.usuario.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect(route('administrador.usuario.index'));
    }
}
