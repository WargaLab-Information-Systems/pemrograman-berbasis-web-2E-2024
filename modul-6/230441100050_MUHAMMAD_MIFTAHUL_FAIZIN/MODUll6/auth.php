<?php
session_start();



$users = [
    'Nakama' => 'Onepiece',
    'roger' => 'kingofpirate'
];

function login($username, $password) {
    global $users;
    
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        return true;
    } else {
        return false;
    }
}

function logout() {
    session_unset();
    session_destroy();
}

function isLogged() {
    return isset($_SESSION['username']);
}

function getCurrentUsername() {
    return $_SESSION['username'] ?? '';
}
?>
