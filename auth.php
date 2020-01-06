<?php 
/*Checks if the login is not set, if this is the case the user has got here without logging in therefor the program informs the user they shouldnt be here and stops.*/
session_start();

if (!isset($_SESSION['login'])) {
  echo "Naughty, you cant be here!";
  die();
}
