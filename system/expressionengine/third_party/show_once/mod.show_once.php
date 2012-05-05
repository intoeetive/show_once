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


class Show_once {

    var $return_data	= ''; 						// Bah!
    
    var $settings = array();

    /** ----------------------------------------
    /**  Constructor
    /** ----------------------------------------*/

    function __construct()
    {        
    	$this->EE =& get_instance(); 
    }
    /* END */
	
	
	
	
	function check()
	{
		
		if ($this->EE->TMPL->fetch_param('code')=='' || ctype_alnum($this->EE->TMPL->fetch_param('code'))==false)
		{
			return $this->EE->TMPL->no_results();
		}
		
		$insert = array(
					'member_id'	=> $this->EE->session->userdata('member_id'),
					'code'		=> $this->EE->TMPL->fetch_param('code'),
					'show_date'=> $this->EE->localize->now
				);
		
		//logged in? check database record
		if ($this->EE->session->userdata('member_id')!=0)
		{
			$q = $this->EE->db->select('show_date')
					->from('show_once')
					->where('member_id', $this->EE->session->userdata('member_id'))
					->where('code', $this->EE->TMPL->fetch_param('code'))
					->get();
			if ($q->num_rows()>0)
			{
				return $this->EE->TMPL->no_results();
			}
		}
		
		//check cookie
		if ($this->EE->input->cookie('show_once_'.$this->EE->TMPL->fetch_param('code'))!='')
		{
			if ($this->EE->session->userdata('member_id')!=0)
			{
				$this->EE->db->insert('show_once', $insert);
			}
			return $this->EE->TMPL->no_results();
		}
		
		//no cookie and no record
		if ($this->EE->session->userdata('member_id')!=0)
		{
			$this->EE->db->insert('show_once', $insert);
		}

		$this->EE->functions->set_cookie('show_once_'.$this->EE->TMPL->fetch_param('code'), $insert['show_date'], 60*60*24*365);
		
		return $this->EE->TMPL->tagdata;
	}
	
	


}
/* END */
?>