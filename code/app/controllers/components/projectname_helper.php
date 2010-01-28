<?php 
class ProjectnameHelperComponent extends Object
{ 
	function get()
	{
		$project_name = __('project_name', true);
		// if (strpos($_SERVER['HTTP_HOST'], 'govorimvmeste') !== FALSE || strpos($_SERVER['HTTP_HOST'], 'localhost') !== FALSE)
		// {
			// $project_name = __('project_name_rus', true);
		// }
		return $project_name;
	}
	
	function address($complete = false)
	{
		if ($complete)
			$address = __('project_complete_address', true);
		else
			$address = __('project_address', true);
		
		return $address;
	}

	//this function provide helper functionality in view
	function startup(&$controller)
	{
		$this->controller = &$controller;
		$this->controller->set('projectnameHelper', $this);
	}
} 
?>