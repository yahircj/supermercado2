<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Support\Facades\Hash;
// use App\Models\User;

// class AuthController extends Controller
// {
//     use AuthenticatesUsers, RegistersUsers;

//     protected $redirectTo = RouteServiceProvider::HOME;

//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }

//     protected function create(array $data)
//     {
//         return User::create([
//             'name' => $data['name'],
//             'email' => $data['email'],
//             'password' => Hash::make($data['password']),
//             'phone' => $data['phone'] ?? null
//         ]);
//     }
// }
