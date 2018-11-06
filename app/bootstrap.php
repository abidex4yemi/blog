<?php
ob_start();
session_start();
  /**
   *load config file
   */
  require_once "config/config.php";

  /**
   *load helpers
   */

   require_once "helpers/redirect_to.php";
   require_once "helpers/session_helper.php";

  /**
   * Auto load Core libraries
   */
   spl_autoload_register(function($className){
      require_once  "lib/" . $className . ".php";
   });