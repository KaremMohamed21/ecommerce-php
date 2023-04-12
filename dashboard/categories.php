<?php
  // Start Output Buffer
  ob_start();

  /**
   * Start and Configure session
   */
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
  }

  // main includes
  $page_title = 'Categories';
  include 'init.php';

  $action = $_GET['action'];
  $catId = intval($_GET['catid']) or 0;
  switch ($action) {
    // Add Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'add':
      include $temps . 'categories/addCategory.php';
      break;

    // Insert Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'insert':
      include 'pages/categories/insertCategory.php';
      break;

    // Edit Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'edit':
      include 'pages/categories/editCategory.php';
      break;

    // Update page ////////////////////////////////////////////////////////////////////////////////////////
    case 'update':
      include 'pages/categories/updateCategory.php';
      break;

    // // Delete page ////////////////////////////////////////////////////////////////////////////////////////
    // case 'delete':
    //   include 'pages/members/deleteMembers.php';
    //   break;

    // // Activate page ////////////////////////////////////////////////////////////////////////////////////////
    // case 'activate':
    //   include 'pages/members/activateMembers.php';
    //   break;

    // // Manage Page ////////////////////////////////////////////////////////////////////////////////////////
    // default:
    //   include 'pages/members/manageMembers.php';
    //   break;
  }
  
  // page footer
  include $temps . "footer.php";

  ob_end_flush();