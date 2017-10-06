<?php

function login($login, $password){
    $user = isUser($login);
        foreach($user as $regUser){
           if ((!$regUser) || ($regUser["password"] != $password)) {
            return false;
        } else {
            unset($regUser['password']);
            $_SESSION['$user'] = $regUser;
            return true;
        } 
    }  
}

function isPost(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function getParam($name){
    return isset($_REQUEST[$name]) ? trim(mb_strtolower(htmlspecialchars($_REQUEST[$name]))) : null;
}

function isUser($login){
    if (!file_exists($login . '.json')) {
        return [];
    }else{
    $fileData = file_get_contents($login . '.json');
    $user = json_decode($fileData, true);
        if (!$user) {
            return [];
        }else{
        return $user;
        }
    }
}

function guestMan($guest){
    if(!$guest){
        return false;
    }else{
        $_SESSION['$guest'] = $guest;
        return true;
    }
}

function isGuest(){
    return !empty($_SESSION['$guest']);
}

function isAuthorized(){
    return !empty($_SESSION['$user']);
}

function getAuthorizedUser() {
    return isset($_SESSION['$user']) ? $_SESSION['$user'] : null;
}

function getGuest() {
    return isset($_SESSION['$guest']) ? $_SESSION['$guest'] : null;
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
