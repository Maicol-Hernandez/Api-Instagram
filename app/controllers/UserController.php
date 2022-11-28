<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Api\Instagram\Exceptions\HttpException;
// use app\Middleware\
use App\Models\User;
use Api\Instagram\Request;


class UserController extends Controller
{

    /**
     * 
     */
    public function create(Request $request)
    {

        $fields = ['name', 'username', 'email', 'password'];

        foreach ($fields as $field) {
            # all fiels data
            if (!isset($_POST[$field])) {
                # error 400 Bad request
                throw new HttpException("You must send field {$field}", 400);
                exit;
            }
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            # error 422 Payment required
            throw new HttpException("Invalid 'email' format", 422);
            exit;
        }

        if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 64) {
            # error 422 Payment required
            throw new HttpException("The 'password' field must be between 6 and 64 characters long", 422);
            exit;
        }

        $user = new User($_POST['name'],  $_POST['username'], $_POST['email'], $_POST['password']);


        return view('json', "User created succesfulley, id user {$user->create()}", 201);
    }

    /**
     * @return object Users
     */
    public function all()
    {
        # code...

        // echo "all";

        // $viviana = new User("Viviana Hernandez", "Viviana-Hernandez", "vivianahernandez123@gmail.com", "Viviana123");
        // $camilo = new User("Camilo Hernandez", "Camilo-Hernandez", "camilohernandez123@gmail.com", "Camilo123");
        // $julio = new User("Julio Sanchez", "Julio-Sanchez", "juliosanchez12@gmail.com", "Julio123");

        // print_r(User::showProfile($maicol));
        // print_r(User::showProfile($viviana));
        // print_r(User::showProfile($camilo));
        // print_r(User::showProfile($julio));


        return view('json',  User::getAll());
    }

    /**
     * 
     */
    public function show(int $id, Request $request)
    {
        # code...
        // echo "id", $id;

        return view('json', "show user id {$id}");
    }

    /**
     * 
     */
    public function edit(int $id)
    {
        # code...
    }

    /**
     * 
     */
    public function update(Request $request,  User $user)
    {
        # code...
    }

    /**
     * 
     */
    public function delate(User $user)
    {
        # code...
    }
}
