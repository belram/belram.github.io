<?php

function login($login, $password){

    $user = getUsers();
    foreach($user as $regUser){
        if (($regUser['login'] == $login) && ($regUser['password'] == $password)){
            unset($regUser['password']);
            $_SESSION['user'] = $regUser;
            return true;
        }
    }
    return false;
}

function isPost(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function getParam($name){
    return isset($_REQUEST[$name]) ? trim(htmlspecialchars($_REQUEST[$name])) : null;
}

function getUsers(){
    $fileData = file_get_contents('users.json');
    $users = json_decode($fileData, true);
    if(!$users){
        return [];
    }
    return $users;
}

function guestMan($guest){
    if(!$guest){
        return false;
    }else{
        $_SESSION['guest'] = $guest;
        return true;
    }
}

function isGuest(){
    return !empty($_SESSION['guest']);
}

function isAuthorized(){
    return !empty($_SESSION['user']);
}

function getAuthorizedUser() {
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}

function getGuest() {
    return isset($_SESSION['guest']) ? $_SESSION['guest'] : null;
}

function redirect($page) {
    header("Location: $page.php");
    die;
}
function logout() {
    if (isAuthorized()) {
        session_destroy();
    }
    redirect('index');
}

?>
