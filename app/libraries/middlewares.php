<?php

function isAuth() {
    return isset($_SESSION["id_utilisateur"]) ? true : false;
}

function isAdmin() {
    return (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") ? true : false;
}
function isCyclist() {
    return (isset($_SESSION["role"]) && $_SESSION["role"] === "cyclist") ? true : false;
}
