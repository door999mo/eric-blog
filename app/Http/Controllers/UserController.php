<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(config('user.users_per_page'));

        return view('user.index', compact('users'));
    }

    /**
     * Show the post edit form
     *
     * @param  User $user
     * @return Response
     */
    public function editUser(User $user)
    {
        return view('user.edit')->withUser($user);
    }

    /**
     * Show the new post form
     *
     * @return Response
     */
    public function newUser()
    {
        return view('user.new');
    }


    /**
     * Show the new post form
     *
     * @return Response
     */
    public function createUser()
    {
        $validator = $this->getUserValidator();

        if ($validator->fails()) {
            return Redirect::to('user/new')->withErrors($validator);
        }

        $user = User::create([
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => bcrypt(Input::get('password'))
        ]);

        $user->setAttribute('role_id', Role::USER);
        $user->save();

        return Redirect::to('user')->with('message', 'User ID: ' . $user->getAttribute('id') . ' is created.');
    }

    /**
     * Delete the post
     *
     * @param  User $user
     * @return Response
     */
    public function deleteUser(User $user)
    {
        $user->delete();
        return Redirect::to('user')->with('message', 'User ID: ' . $user->getAttribute('id') . ' is deleted.');
    }

    /**
     * Update the post
     *
     * @param  User $user
     * @return Response
     */
    public function updateUser(User $user)
    {
        $validator = $this->getUserValidator(false, $user->id);

        if ($validator->fails()) {
            return Redirect::to('user/' . $user->id)->withUser($user)->withErrors($validator);
        }

        $user->setAttribute('name', Input::get('name'));
        $user->setAttribute('email', Input::get('email'));
        if (Input::get('password')) {
            $user->setAttribute('password', bcrypt(Input::get('password')));
        }
        $user->save();
        return Redirect::to('user')->with('message', 'User ID: ' . $user->getAttribute('id') . ' is updated.');
    }

    /**
     * Get validator for user input
     *
     * @param bool $isPasswordRequired
     * @param int $exceptUserId
     * @return mixed
     */
    protected function getUserValidator($isPasswordRequired = true, $exceptUserId = 0)
    {
        return Validator::make(Input::all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . ($exceptUserId ?: ''),
            'password' => ($isPasswordRequired ? 'required|' : '') . 'confirmed|min:6',
        ]);
    }

}
