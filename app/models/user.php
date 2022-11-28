<?php

namespace App\Models;


use Api\Instagram\Exceptions\HttpException;
use App\Utils\UUID;
use App\Database\Connection;
use PDO;

class User
{

    private string $email, $password, $username, $name, $id;
    private array $posts, $followers;
    public Connection $conn;

    private const TABLE = "api_users.users";


    /**
     * @return string emial
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array posts
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

    /**
     * @return string followers
     */
    public function getFollowers(): array
    {
        return $this->followers;
    }

    /**
     * @param string email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param object Post
     */
    public function setPublish(Post $post): void
    {
        array_push($this->posts, $post);
    }

    /**
     * @param array followers
     */
    public function setFollowers(array $followers): void
    {
        $this->followers = $followers;
    }


    public function __construct(
        string $name,
        string $username,
        string $email,
        string $password
    ) {
        // properties
        $this->id = UUID::generate();
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        // arrays
        $this->followers = [];
        $this->posts = [];
        // connection
        $this->conn = new Connection();
    }


    /**
     * 
     */
    public function showPosts()
    {
        foreach ($this->posts as $post) {
            var_dump("xxxxxxxxxxxxxxxxxxxxxxx", $post->toString());
        }
    }

    /**
     * 
     */
    private function hastFollower(User $user)
    {
        $found = array_filter(
            $this->followers,
            fn (User $follower) => $follower->id == $user->id,
        );
        return count($found) == 1;
    }

    /**
     * 
     */
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

    /**
     * @return int id 
     */
    public function create(): int
    {
        // echo "create model";

        $password = password_hash($this->password, PASSWORD_DEFAULT);
        $table = self::TABLE;

        $users = $this->getAll();

        foreach ($users as $user) {

            if ($this->username === $user['username'] && $this->email === $user['email']) {
                # validate username and email
                throw new HttpException("Username and email already exists", 422);
                exit;
            }

            if ($this->username === $user['username']) {
                # validate username
                throw new HttpException("Username already exists", 422);
                exit;
            }

            if ($this->email === $user['email']) {
                # validate email
                throw new HttpException("Email already exists", 422);
                exit;
            }
        }

        $consulta = "INSERT INTO {$table} (nombre, username, email, password) VALUES (:nombre, :username, :email, :password)";
        $stmt = $this->conn->prepare($consulta);

        $stmt->execute(array(':nombre' => $this->name, ':username' => $this->username, ':email' => $this->email, ':password' => $password));

        $this->id = $this->conn->lastInsertId();

        return $this->id;
    }


    /**
     * get all users
     * @return array users
     */
    public static  function getAll(): array
    {
        $conn = new Connection;
        $table = self::TABLE;
        $data = [];

        $consulta = "SELECT id, nombre, username, email, password FROM {$table} ORDER BY nombre";

        $stmt = $conn->prepare($consulta);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            # code...
            array_push($data, $row);
        }

        return $data;
    }

    /**
     * @return array User
     */
    public static function showProfile(User $user): array
    {
        $profile = [
            "id" => $user->getId(),
            "uusername" => $user->username,
            "name" => $user->username,
            "followers" => count($user->followers),
            "posts" => count($user->posts)
        ];

        return $profile;
    }
}
