<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\User;
class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index() {
         return view('admin.usuario.index');
     }
     public function getList()
     {
         Session::put('userSearch', Input::has('ok') ? Input::get('search') : (Session::has('userSearch') ? Session::get('userSearch') : ''));
         Session::put('userField', Input::has('field') ? Input::get('field') : (Session::has('userField') ? Session::get('userField') : 'username'));
         Session::put('userSort', Input::has('sort') ? Input::get('sort') : (Session::has('userSort') ? Session::get('userSort') : 'asc'));
         $users = User::where('username', 'like', '%' . Session::get('userSearch') . '%')
            ->orderBy(Session::get('userField'), Session::get('userSort'))->paginate(8);
         return view('admin.usuario._list', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        if ($user->createModel($request)) {
            return redirect()->route('admin.usuarios.index')->with('success', 'Usuario registrado');
        }

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
    public function edit(User $user)
    {
        $user;
        return view('admin.usuario.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if($user->updateModel($request, $user) == true) {
            return redirect()->route('admin.usuarios.index')->with('success', 'Usuario Acualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuario eliminado ' . $user->username);
    }
}
