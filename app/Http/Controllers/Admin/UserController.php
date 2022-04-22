<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const PAGINATION_NUMBER = 5;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    protected function findUserById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function index()
    {
        $users = $this->user::orderBy('id', 'DESC')->paginate(self::PAGINATION_NUMBER);

        return view('admin.users.listuser')->with(compact('users'));
    }

    public function edit($id)
    {
        $user = $this->findUserById($id);

        return view('admin.users.edituser', compact('user'));
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
        $user = $this->findUserById($id);
        $user->status = $request->status;
        $user->update();

        return redirect()->route('admin.users.index')->with('success', 'Update success');
    }
}
