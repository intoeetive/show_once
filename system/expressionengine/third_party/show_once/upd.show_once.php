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

class Show_once_upd {

    var $version = SHOW_ONCE_ADDON_VERSION;
    
    function __construct() { 
        // Make a local reference to the ExpressionEngine super object 
        $this->EE =& get_instance(); 
    } 
    
    function install() { 
        
        $this->EE->load->dbforge(); 
        
        $data = array( 'module_name' => 'Show_once' , 'module_version' => $this->version, 'has_cp_backend' => 'n'); 
        $this->EE->db->insert('modules', $data); 
        
        $fields = array(
			'member_id'		=> array('type' => 'INT',		'unsigned' => TRUE, 'default' => 0),
			'code'			=> array('type' => 'VARCHAR',	'constraint' => 250, 'default' => ''),
			'show_date'		=> array('type' => 'INT',		'unsigned' => TRUE, 'default' => 0)
		);

		$this->EE->dbforge->add_field($fields);
		$this->EE->dbforge->add_key('member_id');
		$this->EE->dbforge->add_key('code');
		$this->EE->dbforge->create_table('show_once', TRUE);
        
        return TRUE; 
        
    } 
    
    function uninstall() { 

        $this->EE->db->select('module_id'); 
        $query = $this->EE->db->get_where('modules', array('module_name' => 'Show_once')); 
        
        $this->EE->db->where('module_id', $query->row('module_id')); 
        $this->EE->db->delete('module_member_groups'); 
        
        $this->EE->db->where('module_name', 'Show_once'); 
        $this->EE->db->delete('modules'); 
        
        $this->EE->db->where('class', 'Show_once'); 
        $this->EE->db->delete('actions'); 
        
        return TRUE; 
    } 
    
    function update($current='') { 
        if ($current < 2.0) { 
            // Do your 2.0 version update queries 
        } if ($current < 3.0) { 
            // Do your 3.0 v. update queries 
        } 
        return TRUE; 
    } 
	

}
/* END */
?>