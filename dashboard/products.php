<?php 
  // Start Output buffer
  ob_start();

  // Start page session and configure
  session_start();
  if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
  }

  // main includes
  $page_title = 'Products';
  include 'init.php';

  // start page logic
  $action = $_GET['action'];
  $productId = intval($_GET['productid']) or 0;

  switch ($action) {
    // Add Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'add':
      include $temps . 'products/addProduct.php';
      break;

    // Insert Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'insert':
      include 'pages/products/insertProduct.php';
      break;

    // // Edit Page ////////////////////////////////////////////////////////////////////////////////////////
    // case 'edit':
    //   include 'pages/members/editMembers.php';
    //   break;

    // // Update page ////////////////////////////////////////////////////////////////////////////////////////
    // case 'update':
    //   include 'pages/members/updateMembers.php';
    //   break;

    // // Delete page ////////////////////////////////////////////////////////////////////////////////////////
    // case 'delete':
    //   include 'pages/members/deleteMembers.php';
    //   break;

    // // Activate page ////////////////////////////////////////////////////////////////////////////////////////
    // case 'activate':
    //   include 'pages/members/activateMembers.php';
    //   break;

    // Manage Page ////////////////////////////////////////////////////////////////////////////////////////
    default:
      include 'pages/products/manageProduct.php';
      break;
  }
  
  // page footer
  include $temps . "footer.php";


  // End Output buffer
  ob_end_flush();