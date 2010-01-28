<?php
class InfoController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Info';
/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array();

	function about()
	{
		$this->pageTitle = __('About', true);
		$this->Session->write('current_menu', 'about');
	}
	
	function regulations()
	{
		$this->pageTitle = __('Regulations', true);
		$this->Session->write('current_menu', 'terms');
	}
	
}
?>