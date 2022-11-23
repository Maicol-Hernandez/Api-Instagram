<?php

namespace App\Models;

use App\Utils\UUID;

class User
{

    private string $name;
    private string $username;
    private string $email;
    private string $password;

    private string $id;
    private array $posts;
    private array $followers;

    public function __construct(
        string $name,
        string $username,
        string $email,
        string $password
    ) {
        // echo "Se creo un id unico:" . UUID::generate() . "\n";
        $this->id = UUID::generate();
        $this->posts = [];
        $this->followers = [];
        $this->username = $username;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function publish(Post $post)
    {
        array_push($this->posts, $post);
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function getFollowers(): array
    {
        return $this->followers;
    }

    public function showPosts()
    {
        foreach ($this->posts as $post) {
            var_dump("xxxxxxxxxxxxxxxxxxxxxxx", $post->toString());
        }
    }

    private function hastFollower(User $user)
    {
        $found = array_filter(
            $this->followers,
            fn (User $follower) => $follower->id == $user->id,
        );
        return count($found) == 1;
    }

    public function addFollower(User $user)
    {
        if (!$this->hastFollower($user)) {
            if ($this->id == $user->id) {
                print_r("No te puedes agregar a ti mismo como follower \n");
            } else {
                array_push($this->followers, $user);
            }
        } else {
            print_r("El usuario $user->username ya es un follower \n");
        }
    }

    public static function showProfile(User $user)
    {
        $profile = [
            "name" => $user->username,
            "followers" => count($user->followers),
            "posts" => count($user->posts)
        ];

        return $profile;
    }
}
