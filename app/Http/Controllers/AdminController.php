<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin/admin');
    }

    public function login()
    {

        return view('admin/adminlogin');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'admin_name' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('admin_name', 'password');
        if (Auth::attempt($credentials)) {
            return view('welcome')
                        ->with('message', 'Signed in!');
        }
   
        return back()->with('message', 'Sai tài khoản hoặc mật khẩu');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminrole = DB::table('tb_adminrole')->select('*');
        $adminrole = $adminrole->get();
        return view('admin/adminregister',compact('adminrole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'admin_name'=>'required|unique:tb_admin',
            'adminrole_id'=>'required',
            'password'=>'required',
            'password_confirm' => 'required|same:password'
        ]);
        $Admin = new Admin([
            'admin_name' => $request->admin_name,
            'password'=> Hash::Make($request->password),
        ]);
        $Admin->adminrole_id=$request->adminrole_id;
        $Admin->save();
        return redirect()->route('account')->with('success','Đăng kí thành công . Mời bạn đăng nhập');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
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
        //
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
        //
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
    }
}