<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class HomeController extends BackendController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home.index');
    }

    public function edit(Request $request)
    {
        $user = $request->user();
        return view('backend.home.edit', compact('user'));
    }

    public function update(Requests\AccountUpdateRequest $request )
    {
        $data = $request->all();
        if (empty($data['password'])) unset($data['password']);
        else $data['password'] = bcrypt($data['password']);

        $user  = User::findOrFail($id);
        $user->update($data);

        $user->detachRoles();
        $user->attachRole($request->role);
        return redirect("/backend/users")->with("message", "User was updated successfully!");
    }
}
