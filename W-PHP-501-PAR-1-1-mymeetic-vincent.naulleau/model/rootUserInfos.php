<?php
require('rootLog.php');
session_start(); 
$query = "SELECT firstname AS prenom, lastname AS nom, email AS mail, birthdate AS naissance, gender AS genre, city AS ville from user where user.id = " . implode($_SESSION['id_user']);
include('rootPlug.php');