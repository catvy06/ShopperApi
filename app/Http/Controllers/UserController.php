<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function getAll() {       
        return User::with("product")->get(); 
    }
}
