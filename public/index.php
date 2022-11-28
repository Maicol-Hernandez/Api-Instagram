<?php

declare(strict_types=1);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, PATCH, OPTIONS, PUT, DELETE');
header('Allow: GET, POST, PATCH, OPTIONS, PUT, DELETE');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/helpers/helpers.php';
require __DIR__ . '/../app/routes/web.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'OPTIONS') {
    die();
}
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


$app = new Api\Instagram\App();
$app->send();



// use Dyalogo\Scriptdelete\Models\ImagePost;
// use Dyalogo\Scriptdelete\Models\Post;
// use Dyalogo\Scriptdelete\Models\User;
// use Dyalogo\Scriptdelete\Models\VideoPost;


// $maicolPost = new ImagePost("Programando en las noches", "IMG001.jpg");
// $vivianaPost = new VideoPost("En la playa de Cancun, con mi amorcito", "VID001.mov");
// $camiloPost = new ImagePost("De vacaciones con su novia, Julia", "IMG002.jpg");
// $julioPost = new VideoPost("Haciendo streaming, con mis seguidores", "VID002.mov");

// $maicol->publish($maicolPost);
// $maicol->publish($maicolPost);
// $maicol->publish($maicolPost);
// $maicol->publish($maicolPost);
// $viviana->publish($vivianaPost);
// $camilo->publish($camiloPost);
// $julio->publish($julioPost);


// $maicolPost->addLike($viviana);
// $maicolPost->addLike($camilo);

// $vivianaPost->addLike($camilo);
// $vivianaPost->addLike($julio);
// $vivianaPost->addLike($maicol);

// $camiloPost->addLike($viviana);
// $camiloPost->addLike($maicol);

// $julioPost->addLike($maicol);
// $julioPost->addLike($viviana);
// $julioPost->addLike($camilo);
// $julioPost->addLike($julio);


// $camilo->addFollower($maicol);
// $camilo->addFollower($viviana);

// $julio->addFollower($viviana);

// $maicol->addFollower($camilo);
// $maicol->addFollower($viviana);
// $maicol->addFollower($julio);

// $maicol->showPosts();




// print_r($maicolPost->toString());
// print_r($vivianaPost->toString());
// print_r($camiloPost->toString());
// print_r($julioPost->toString());





// $miObjeto = new  Post("Este es mi primer post");
// $postImage = new ImagePost("Foto de mis vacacines en la palaya", "playa.png");


// echo $miObjeto->getMensaje();
// echo $postImage->getMensajeImagePost();
// echo $postImage->getMensajeImagePost();

// $miObjeto->setId('asc-123');
// echo $miObjeto->getId();

// var_dump($miObjeto);
