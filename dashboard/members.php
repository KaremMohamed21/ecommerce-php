<?php

  /**
   * Start and configure session
   * 
   */
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
  }

  // main includes
  $page_title = 'Members';
  include 'init.php';

  // start page logic
  $action = $_GET['action'];
  $userId = intval($_GET['userid']) or 0;

  switch ($action) {
    // Add Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'add':
      include $temps . 'members/addMember.php';
      break;

    // Insert Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'insert':
      include 'pages/members/insertMembers.php';
      break;

    // Edit Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'edit':
      include 'pages/members/editMembers.php';
      break;

    // Update page ////////////////////////////////////////////////////////////////////////////////////////
    case 'update':
      include 'pages/members/updateMembers.php';
      break;

    // Delete page ////////////////////////////////////////////////////////////////////////////////////////
    case 'delete':
      include 'pages/members/deleteMembers.php';
      break;

    // Activate page ////////////////////////////////////////////////////////////////////////////////////////
    case 'activate':
      include 'pages/members/activateMembers.php';
      break;

    // Manage Page ////////////////////////////////////////////////////////////////////////////////////////
    default:
      include 'pages/members/manageMembers.php';
      break;
  }
  
  // page footer
  include $temps . "footer.php";