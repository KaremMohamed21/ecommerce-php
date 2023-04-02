<?php

  include "connect.php";
  
  /**
   * Routes for files
   */
   $temps = "includes/temps/"; // Temps dir
   $css = "layout/css/"; // Css dir 
   $js = "layout/js/"; // Css dir
   $lang = "includes/langs/"; // lang dir
   $func = "includes/functions/";

   // includes
   include $func . 'functions.php';
   include $lang . 'en.php';
   include $temps . "header.php";

   if (!isset($no_navbar)) include $temps . "navbar.php";