<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('created_at', 'desc')->paginate(6);
        return view('welcome', compact('user'));
    }

    public function store(Request $Request){
        $this->validate($Request,[
            'name' => 'required|max:100|string|unique:users',
            'email' => 'required|string|email|unique:users',
        ]);

        User::create([
            'name' => $Request->name,
            'email' => $Request->email,
        ]);

        return redirect()->route('user.index');
    }

    public function edit($id){
        $user = User::find($id);
        return view('edit',compact('user'));
    }

    public function update(Request $Request,$id){
        $user = User::find($id);

        if($Request->email == $user->email){
            $this->validate($Request,[
                'name' => 'required|max:100|string',
                'email' => 'required|string|email',
            ]);
        }else{
            $this->validate($Request,[
                'name' => 'required|max:100|string|unique:users',
                'email' => 'required|string|email|unique:users',
            ]);
        }

        User::where('id', $id)->update([
            'name' => $Request->name,
            'email' => $Request->email,
        ]);
        return redirect()->route('user.index');

    }

    public function delete($id){

        $users = User::find($id);
        $users->delete();

        return redirect()->route('user.index');

    }

    public function show($id){
        $user = User::find($id);
        return view('show',compact('user'));
    }
}
