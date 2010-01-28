<?php  

class CaptchaHelpersController extends AppController { 
     
    var $name = 'CaptchaHelpers'; 
    var $components = array('Captcha'); 
      
	function beforeFilter() 
	{
		parent::beforeFilter(); 
		$this->Auth->allowedActions = array('*');
		//$this->Auth->allowedActions = array('search', 'add');
	}

    function securimage($random_number)
	{ 
        $this->autoLayout = false; //a blank layout 

        //override variables set in the component - look in component for full list 
        $this->captcha->image_height = 75; 
        $this->captcha->image_width = 450; 
        $this->captcha->image_bg_color = '#ffffff'; 
        $this->captcha->line_color = '#cccccc'; 
        $this->captcha->arc_line_colors = '#999999,#cccccc'; 
        $this->captcha->code_length = 6; 
        $this->captcha->font_size = 45; 
        $this->captcha->text_color = '#000000'; 

		ob_clean();
        $this->set('captcha_data', $this->captcha->show()); //dynamically creates an image 
    } 

    function index(){ 
        $this->set('captcha_form_url', $this->webroot.'CaptchaHelpers/index'); //url for the form 
        $this->set('captcha_image_url', $this->webroot.'CaptchaHelpers/securimage/0'); //url for the captcha image 

        $captcha_success_msg = 'The code you entered matched the captcha'; 
        $captcha_error_msg = 'The code you entered does not match'; 

        if( empty($this->data) ){ //form has not been submitted yet 
            $this->set('error_captcha', ''); //error message displayed to user 
            $this->set('success_captcha', ''); //success message displayed to user 
            $this->render(); //reload page 
        } else { //form was submitted      
            if( $this->captcha->check($this->data['Contact']['captcha_code']) == false ) { 
                //the code was incorrect - display an error message to user 
                $this->set('error_captcha', $captcha_error_msg); //set error msg 
                $this->set('success_captcha', ''); //set success msg 
                $this->render(); //reload page 
            } else { 
                //the code was correct - display a success message to user 
                $this->set('error_captcha', ''); //set error msg 
                $this->set('success_captcha', $captcha_success_msg); //set success msg 
                $this->render(); //reload page 

                //after testing is complete, you would process the other form data here and save it 
            } 
        } 
    } 
} 

?>