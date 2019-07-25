<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
use  Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

    return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

            // $users = User::all();
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        // // $file = $request->photo_id;


        // // return $file;
        // return $input;
        // // if ($name = $request->file('photo_id')) {
        // //     return $name;

        // // }

       if($request->file('photo_id')){
           $name = $request->file('photo_id');
           $name->move('images', $name);
        //    return $name;
        //    $name = $input['photo_id'];

           $foto = Photo::create(['file' => $name]);
           $input['photo_id'] = $foto->id;

       }

       $input['password'] = encrypt($request->password);
       User::create($input);

       return redirect('/admin/user');
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
        $user = User::findOrfail($id);
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrfail($id);
        $input = $request->all();
        if($request->file('photo_id')){
            $name = $request->file('photo_id');
            $name->move('images', $name);
         //    return $name;
         //    $name = $input['photo_id'];

            $foto = Photo::create(['file' => $name]);
            $input['photo_id'] = $foto->id;

        }

        $input['password'] = encrypt($request->password);
        $user->update($input);

        // $user->update($request->all());


        return redirect('admin/user');


        // $user->update($id);
        // return redirect('/admin/user');

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
