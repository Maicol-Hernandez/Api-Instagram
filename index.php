<?php
require 'vendor/autoload.php';

use Dyalogo\Scriptdelete\models\ImagePost;
use Dyalogo\Scriptdelete\models\Post;
use Dyalogo\Scriptdelete\models\User;
use Dyalogo\Scriptdelete\models\VideoPost;

$maicol = new User("Michael Hernandez", "Maicol-Hernandez", "maicolhernandez420@gmail.com", "Maicol20016");
$viviana = new User("Viviana Hernandez", "Viviana-Hernandez", "vivianahernandez123@gmail.com", "Viviana123");
$camilo = new User("Camilo Hernandez", "Camilo-Hernandez", "camilohernandez123@gmail.com", "Camilo123");
$julio = new User("Julio Sanchez", "Julio-Sanchez", "juliosanchez12@gmail.com", "Julio123");

$maicolPost = new ImagePost("Programando en las noches", "IMG001.jpg");
$vivianaPost = new VideoPost("En la playa de Cancun, con mi amorcito","VID001.mov");
$camiloPost = new ImagePost("De vacaciones con su novia, Julia","IMG002.jpg");
$julioPost = new VideoPost("Haciendo streaming, con mis seguidores", "VID002.mov");

$maicol->publish($maicolPost);
$maicol->publish($maicolPost);
$maicol->publish($maicolPost);
$maicol->publish($maicolPost);
$viviana->publish($vivianaPost);
$camilo->publish($camiloPost);
$julio->publish($julioPost);


$maicolPost->addLike($viviana);
$maicolPost->addLike($camilo);

$vivianaPost->addLike($camilo);
$vivianaPost->addLike($julio);
$vivianaPost->addLike($maicol);

$camiloPost->addLike($viviana);
$camiloPost->addLike($maicol);

$julioPost->addLike($maicol);
$julioPost->addLike($viviana);
$julioPost->addLike($camilo);
$julioPost->addLike($julio);


$camilo->addFollower($maicol);
$camilo->addFollower($viviana);

$julio->addFollower($viviana);

$maicol->addFollower($camilo);
$maicol->addFollower($viviana);
$maicol->addFollower($julio);


print_r(User::showProfile($maicol));
print_r(User::showProfile($viviana));
print_r(User::showProfile($camilo));
print_r(User::showProfile($julio));

print_r($maicolPost->toString());
print_r($vivianaPost->toString());
print_r($camiloPost->toString());
print_r($julioPost->toString());




// $miObjeto = new  Post("Este es mi primer post");
// $postImage = new ImagePost("Foto de mis vacacines en la palaya", "playa.png");


// echo $miObjeto->getMensaje();
// echo $postImage->getMensajeImagePost();
// echo $postImage->getMensajeImagePost();

// $miObjeto->setId('asc-123');
// echo $miObjeto->getId();

// var_dump($miObjeto);
