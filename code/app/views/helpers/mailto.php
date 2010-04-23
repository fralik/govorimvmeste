<?php
class MailtoHelper extends Helper { 
     
	// $addr - email address
	// $link_content
	var $helpers = array('Html', 'Session');
	
    function createLink($addr, $user_id, $link_content) 
	{ 
		$session_user_id = $this->Session->read('Auth.User.id');
		if (isset($session_user_id) && $session_user_id > 0)
		{
			echo $addr;
		}
		else
		{
            $title = __('new_window', true);
			echo $this->Html->link($link_content, array('action' => 'email', $user_id), 
					array('target' => '_blank', 'title' => $title ));
		}
    } 
} 
?>