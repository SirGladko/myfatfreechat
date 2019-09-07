<?php
$f3 = require('lib/base.php');
include('php/dbconn.php');
session_start();


$f3->route('GET @home: /',
    function($f3) {
        if (empty($_SESSION["login"])){
            $f3->reroute('@login');
        }
        else{
            $f3->set('title',$_SESSION["chat"]);
            echo \Template::instance()->render('ui/chat.htm');
        }
    }
);
$f3->route('GET @login: /login',
    function($f3) {
        if (!empty($_SESSION["login"])){
           $f3->reroute('@home');
        }
        $f3->set('title','login');
        $f3->set('template','/ui/login.htm');
        echo \Template::instance()->render('ui/menu.htm');
    }
);
$f3->route('GET @register: /register',
    function($f3) {
        if (!empty($_SESSION["login"])){
           $f3->reroute('@home');
        }
        $f3->set('title','register');
        $f3->set('template','/ui/register.htm');
        echo \Template::instance()->render('ui/menu.htm');
    }
);
$f3->route('POST /login',
    function($f3) {
        if(include('php/auth.php')){
            $f3->reroute('@home');
        }
        else{
            $f3->set('chatErr',$chatErr);
            $f3->set('loginErr',$loginErr);
            $f3->set('title','login');
            $f3->set('template','/ui/login.htm');
            echo \Template::instance()->render('ui/menu.htm');
        }
    }
);
$f3->route('POST /logout',
    function($f3) {
        include('php/logout.php');
    }
);
$f3->route('POST /register',
    function($f3) {
        if(include('php/register.php')){
            $f3->reroute('@login');
        }
        else{
            $f3->set('registerErr',$registerErr);
            $f3->set('title','register');
            $f3->set('template','/ui/register.htm');
            echo \Template::instance()->render('ui/menu.htm');
        }
    }
);
$f3->route('GET /hellomsg',
    function($f3) {
        include('php/hellomsg.php');
    }
);
$f3->route('GET /cont',
    function($f3) {
        include('php/cont.php');
    }
);
$f3->route('GET /activeusers',
    function($f3) {
        include('php/activeusers.php');
    }
);
$f3->route('POST /addmessage',
    function($f3) {
        include('php/addmessage.php');
    }
);
//config
$f3->run();