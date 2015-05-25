<?php 
include "functions.php";
session_start();


create_competition();
add_questions();

header("Location: competitions.php");



