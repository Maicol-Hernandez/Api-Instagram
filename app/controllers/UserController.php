<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use Api\Instagram\Request;

class UserController extends Controller
{
    public function create()
    {
        # code...
        // echo "create";
        $user = new User("Michael Hernandez", "Maicol-Hernandez", "maicolhernandez420@gmail.com", "Maicol20016");

        // Router::post('/users', function () {
        //     return new \Api\Instagram\Response('json', 'User created succesfulley', 201);
        // });



        return view('json', 'User created succesfulley', 201);
    }

    public function all()
    {
        # code...

        // echo "all";

        $user = new User("Michael Hernandez", "Maicol-Hernandez", "maicolhernandez420@gmail.com", "Maicol20016");

        // $viviana = new User("Viviana Hernandez", "Viviana-Hernandez", "vivianahernandez123@gmail.com", "Viviana123");
        // $camilo = new User("Camilo Hernandez", "Camilo-Hernandez", "camilohernandez123@gmail.com", "Camilo123");
        // $julio = new User("Julio Sanchez", "Julio-Sanchez", "juliosanchez12@gmail.com", "Julio123");

        // print_r(User::showProfile($maicol));
        // print_r(User::showProfile($viviana));
        // print_r(User::showProfile($camilo));
        // print_r(User::showProfile($julio));




        return view('json', User::showProfile($user));
    }

    public function show(int $id, Request $request)
    {
        # code...
        // echo "id", $id;

        return view('json', "show user id {$id}");
    }

    public function edit(int $id)
    {
        # code...
    }

    public function update(Request $request,  User $user)
    {
        # code...
    }

    public function delate(User $user)
    {
        # code...
    }
}
