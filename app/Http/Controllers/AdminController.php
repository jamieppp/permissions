<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Check if user is an Admin when directed to a route
     */

    public function isAdmin(){
        $result = Role::where("id", Auth::user()->role_id)->first();
        if($result->title == "Administrator"){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Return a view if the registration form
     */

    public function registerform(){
      if($this->isAdmin()){
        return view('admin.register');
      }
    }

    /**
     * Get user list and return a view with the list data
     */

    public function userlist(){
      if($this->isAdmin()){

        $data = array();

        $list = User::select("id", "name", "email")->get();

        foreach($list as $value){

          array_push($data, array(
            "id" => $value->id,
            "name" => $value->name,
            "email" => $value->email
          ));

        }

        return view('admin.userlist', ["data" => $data]);

      }
    }

    /**
     * Handle the creation of a new user by the admin
     */

    public function registercreate(Request $request){
      if($this->isAdmin()){
        $this->validator($request->all())->validate();

        $this->create($request->all());

        return redirect($this->redirectTo);
      }
    }

    /**
     * Vvalidate admin new user submission
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */

    public function create(array $data)
    {
        return User::create([
            'role_id' => $this->getRoleId($data['role']),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function userupdate(Request $request){

      $data = $request->all();

      User::where("id", $data["id"])->update(["role_id" => $this->getRoleId($data["role"])]);

      return redirect($this->redirectTo);

    }

    /**
     * Get database id of the role title
     */

    protected function getRoleId($title)
    {
        $result = Role::where("title", $title)->first();
        return $result->id;
    }

}
