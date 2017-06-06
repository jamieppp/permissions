<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getUserInfo();
        return view('home', ["data" => $data]);
    }

    /**
     * Function to retrieve return user information
     *
     */
     
    public function getUserInfo(){

        return array(
          "name" => Auth::user()->name,
          "email" => Auth::user()->email,
          "role" => $this->getRole(Auth::user()->role_id)
        );

    }

    /**
     * Function to retrieve role title from id
     *
     */

    public function getRole($id){
        $result = Role::where("id", $id)->first();
        return $result->title;
    }
}
