<?php

/*
=====================================================
 Show Once
-----------------------------------------------------
 http://www.intoeetive.com/
-----------------------------------------------------
 Copyright (c) 2011-2012 Yuri Salimovskiy
=====================================================
 This software is intended for usage with
 ExpressionEngine CMS, version 2.0 or higher
=====================================================
 File: upd.show_once.php
-----------------------------------------------------
 Purpose: Show user certain content only once
=====================================================
*/

if ( ! defined('EXT'))
{
    exit('Invalid file request');
}

require_once PATH_THIRD.'show_once/config.php';

class Show_once_mcp {

    var $version = SHOW_ONCE_ADDON_VERSION;
    
    var $settings = array();
    
    var $docs_url = "https://github.com/intoeetive/show_once/README";
    
    function __construct() { 
        // Make a local reference to the ExpressionEngine super object 
        $this->EE =& get_instance(); 
    } 
    
    function index()
    {
  
    }


}
/* END */
?>