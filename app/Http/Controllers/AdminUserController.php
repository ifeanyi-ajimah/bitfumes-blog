<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\admin\Admin;
use App\Model\admin\Role;

class AdminUserController extends Controller
{

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
        $admins = Admin::all();
        return view('admin.user.show',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(); //return $roles;
        return view('admin.user.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'phone' => 'required|numeric',
        'password' => 'required|string|min:6|confirmed',
            ]);
        $request['password'] = bcrypt($request->password);
        $admins = Admin::create($request->all());
        $admins->roles()->sync($request->role);
        return redirect(route('admin.index'));
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
    {   $roles = Role::all();
        $admins = Admin::find($id);
        return view('admin.user.edit',compact('admins','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //dd($request->all());
        $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone' => 'required|numeric',
        
            ]);
        $request['password'] = bcrypt($request->password);
        $request->status ? : $request['status'] =0;
        $admins = Admin::where('id',$id)->update($request->except('_token','_method','role'));
        Admin::find($id)->roles()->sync($request->role);
        return redirect(route('admin.index'))->with('status','Admin updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return back()->with('status','User admin deleted');
    }
}
