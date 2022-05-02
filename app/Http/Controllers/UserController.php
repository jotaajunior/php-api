<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|min:6|required',
            'email' => 'email|required',
            'password' => 'min:6|required',
        ]);

        return [
            'success' => true,
        ];
    }
}
