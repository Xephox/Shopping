<?php 
session_start();

if (!isset($_SESSION['login'])) {
  echo "Naughty, you cant be here!";
  die();
}
