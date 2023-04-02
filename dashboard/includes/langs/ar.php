<?php

  function lang($key) {
    static $lang = 
    [
      'HOME'          => 'Home',
      'CATEGORIES'    => 'Categories',
      'ITEMS'         => 'Items',
      'MEMBERS'       => 'Members',
      'STATS'         => 'Statistics',
      'LOGS'          => 'Logs'    
    ];

    return $lang[$key];
  }