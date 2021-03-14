<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\role;

class UserController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = admin::all();
        $totaluser = admin::count();
        return view ('admin.user.index', compact('users','totaluser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all(); //return $roles;
        return view('admin.user.user',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
		'name' => 'required|string|max:255',
		'email' => 'required|string|email|max:255|unique:admins',
		'password' => 'required|string|min:6|confirmed',
        'phone'=>'required|numeric',
        'status' => 'required'
        // 'role'=>'required'
        ]);
       // para encriptar a password
       $request['password'] = bcrypt($request->password);

       $user = admin::create($request->all());
       $user ->roles()->sync($request->role);
       return redirect(route('user.index'))->with('message','Utilizador Registado com Sucesso.');
       //return $request->all();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = admin::find($id);
        $roles = role::all();
        return view('admin.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
       'name' => 'required|string|max:255',
       'email' => 'required|string|email|max:255',
       // 'password' => 'required|string|min:6|confirmed',
        'phone'=>'required|numeric'
        // 'status' => 'required'
        // 'role'=>'required'
        ]);

        $request->status? : $request['status']=0; //verifica se o status esta vazio, apos o sinal de interrogacao deixa-se espaco significando true e depois do : significa false.
        $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
        // actualizando a regra/permissao
        admin::find($id)->roles()->sync($request->role);
         return redirect(route('user.index'))->with('message','Dados do utilizador actualizados com Sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       admin::where('id', $id)->delete();
        return redirect()->back()->with('msg_del','Utilizador Apagado com Sucesso.');

    }
}
