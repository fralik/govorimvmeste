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
			echo $this->Html->link($link_content, array('action' => 'email', $user_id), 
					array('target' => '_blank'));
			echo __('new_window', true);
		}
		//build the mailto link 
        // $unencrypted_link = '<a href="mailto:' . $addr . '">' . $link_content . '</a>'; 
        // //build this for people with js turned off 
        // $noscript_link = '<noscript><span style="unicode-bidi:bidi-override;direction:rtl;">'.strrev($link_content.' > '.$addr.' <').'</span></noscript>'; 
        // //put them together and encrypt 
        // $encrypted_link = '<script type="text/javascript">Rot13.write(\''.str_rot13($unencrypted_link).'\');</script>'.$noscript_link; 

        //return $encrypted_link; 
    } 
} 
?>