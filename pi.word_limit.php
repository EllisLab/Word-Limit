<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
						'pi_name'			=> 'Word Limiter',
						'pi_version'		=> '1.1',
						'pi_author'			=> 'Rick Ellis',
						'pi_author_url'		=> 'http://expressionengine.com/',
						'pi_description'	=> 'Permits you to limit the number of words in some text',
						'pi_usage'			=> Word_limit::usage()
					);


/**
 * Word_limit Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			ExpressionEngine Dev Team
 * @copyright		Copyright (c) 2004 - 2009, EllisLab, Inc.
 * @link			http://expressionengine.com/downloads/details/word_limiter/
 */

class Word_limit {

	var $return_data;
	
	/**
	 * Constructor
	 *
	 */
	function Word_limit($str = '')
	{
		$this->EE =& get_instance();

		$total = ( ! $this->EE->TMPL->fetch_param('total')) ? 500 :  $this->EE->TMPL->fetch_param('total');		
		$total = ( ! is_numeric($total)) ? 500 : $total;
		
		$str = ($str == '') ? $this->EE->TMPL->tagdata : $str;
		
 		$this->return_data = $this->EE->functions->word_limiter($str, $total);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Usage
	 *
	 * Plugin Usage
	 *
	 * @access	public
	 * @return	string
	 */
	function usage()
	{
		ob_start(); 
		?>
		Wrap anything you want to be processed between the tag pairs.

		{exp:word_limit total="100"}

		text you want processed

		{/exp:word_limit}

		Note:  The "total" parameter lets you specify the number of words.

		Version 1.1
		******************
		- Updated plugin to be 2.0 compatible

		<?php
		$buffer = ob_get_contents();
	
		ob_end_clean(); 

		return $buffer;
	}

	// --------------------------------------------------------------------

}
// END CLASS

/* End of file pi.word_limit.php */
/* Location: ./system/expressionengine/third_party/word_limit/pi.word_limit.php */