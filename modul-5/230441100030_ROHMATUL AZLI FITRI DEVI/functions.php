<?php
function isLoggedIn() {
    return isset($_SESSION['username']);
}

function redirectIfNotLoggedIn() {
    if(!isLoggedIn()) {
        header("Location: index.php");
        exit;
    }
}
?>
