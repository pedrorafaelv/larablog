<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    } 
    
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(4);
        return view('dashboard.User.index', ['users'=>$users]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.User.create', ['user' =>new User()]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create(
            [
                'name' => $request['name'],
                'surname' => $request['surname'],
                'rol_id' => '1',// rol de usuario
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]
        );
        return back()->with('status', 'Usuario creado satisfactoriamente ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return view('dashboard.user.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('dashboard.User.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {
        //  echo $request->route('user')->id;
        $user->update(
            [
                'name' => $request['name'],
                'surname' => $request['surname'],
                'email' => $request['email'],
            ]
        );
        return back()->with('status', 'Usuario actualizado satisfactoriamente ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return back()->with('status', 'Usuario eliminado con éxito ');
    }
}
