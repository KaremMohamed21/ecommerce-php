<?php

  // Get page title function
  function get_title() {
    global $page_title;

    if (isset($page_title)) {
      return $page_title;
    } else {
      return 'Default';
    }
    
  }