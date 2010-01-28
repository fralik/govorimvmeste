<?php
class AppHelper extends Helper {

   function url($url = null, $full = false) 
   {
        if(!isset($url['lang']) && isset($this->params['lang'])) 
		{
          $url['lang'] = $this->params['lang'];
        }     

        return parent::url($url, $full);
   }

}
?>