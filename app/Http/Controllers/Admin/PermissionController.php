<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\role;


class PermissionController extends Controller
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
          $permissions = Permission::all();
        //$totaluser = Admin::count();
        return view ('admin.permission.index', compact('permissions'));
       // return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $roles = role::all(); //return $roles;
        return view('admin.permission.permission',compact('roles'));
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

            'name' => 'required|max:100|unique:roles',
            'para' => 'required'

            ]);
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->para = $request->para;
        $permission ->save();

        return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //$permission = Permission::find($id);
        $permission = Permission::where('id', $permission->id)->first();
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
         $this->validate($request, [

            'name' => 'required|max:100',
            'para' => 'required|max:100'

            ]);
        $permission = Permission::find($permission->id);
        $permission->name = $request->name;
        $permission->para = $request->para;
        $permission ->save();

        return redirect(route('permission.index'))->with('message','Permissão Actualizada com Sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
         Permission::where('id',$permission->id)->delete();

        return redirect()->back()->with('msg_del','Permissão Apagada com Sucesso.');
    }
}
