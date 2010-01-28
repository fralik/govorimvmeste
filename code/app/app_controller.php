<?php
class AppController extends Controller {
    var $components = array('Cookie', 'Auth', 'RememberMe', 'Acl', 'Session', 'PasswordHelper', 'LanguageHelper','ProjectnameHelper');
    
	
	var $project_name = "";
	var $site_address = "http://govorimvmeste.com/";
	
    function beforeFilter() 
	{
        //Configure AuthComponent
        $this->Auth->authorize = 'actions';
		$this->Auth->actionPath = 'controllers/';
		$this->Auth->allowedActions = array('display', 'regulations', 'about');
		$this->Auth->fields = array(
			'username' => 'email',
			'password' => 'password'
		);
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'lang'=> $this->Session->read('Config.language'));
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'home');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'add');
		
		if (isset($this->RememberMe))
			$this->RememberMe->check();  
		
		$locale = $this->LanguageHelper->setLanguage($this->params);
		
		$this->Auth->loginError = __('login_error', true);
		$this->Auth->authError = __('auth_error', true);
		$this->project_name = __('project_name', true);
		//$this->allow_access();
		
		if (isset($_SERVER['HTTP_HOST']))
		{
			$this->site_address = "http://" . $_SERVER['HTTP_HOST'] . "/";
			//echo $this->site_address;
			//pr($_SERVER);
		}
		$this->Session->write('current_menu', '');

		$str = VIEWS . $locale . DS . $this->viewPath;
		//echo "viewPath:
		if ($locale && file_exists(VIEWS . $locale . DS . $this->viewPath)) 
		{
			// e.g. use /app/views/fre/pages/tos.ctp instead of /app/views/pages/tos.ctp
			$this->viewPath = $locale . DS . $this->viewPath;
		}
		
	}
	function redirect( $url, $status = NULL, $exit = true ) 
	{
		if (!isset($url['lang']) && $this->Session->check('Config.language')) 
		{
			$url['lang'] = $this->Session->read('Config.language');
		}
		parent::redirect($url,$status,$exit);
	}	
	
	// private function allow_access()
	// {
		// $ctrl = array('Users', 'Pages', 'Countries', 'Deploy'); // deploy
		// // list of allowed actions, if defined should be used instead of *
		// //$actions = array('Users' => array('search', 'add', 'home', 'view', 'forgot', 'logout', 'email'));
		// //$ctrl = array(''); // production
		// if (in_array($this->name, $ctrl))
		// {
			// if (isset($actions) && array_key_exists($this->name, $actions))
			// {
				// $this->Auth->allowedActions = $actions[$this->name];
			// }
			// else
			// {
				// $this->Auth->allow('*');
				// $this->Auth->allowedActions = array('*');
				// $this->Auth->action('*');
			// }
		// }
	// }
}
?>