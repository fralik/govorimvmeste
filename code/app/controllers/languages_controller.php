<?php
class LanguagesController extends AppController {

	var $name = 'Languages';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Language->recursive = 0;
		$this->set('languages', $this->paginate());
	}
	
	function beforeFilter() 
	{
		parent::beforeFilter(); 
		//$this->Auth->allowedActions = array('*');
		$this->Auth->allowedActions = array('search', 'add');
		$this->Recaptcha->publickey = "6LeT9QkAAAAAAGAKi6_FkC4H27iuaS8OWZwMqRDj"; 
		$this->Recaptcha->privatekey = "6LeT9QkAAAAAAF3y-t-b0E-bLiK-RdybOXoPzsya"; 
	}

	
	// dumps all languages from the database
	// dump in a .php file so that string extraction
	// tool could find all the strings
	function dump($filename = "langs.php")
	{
		$this->Language->recursive = 0;
		$languages = $this->Language->find('all');
		
		$fp = fopen($filename, "w");
		if ($fp == FALSE)
			return;
		fwrite($fp, "<?php\n\n");
		foreach ($languages as &$language)
		{
			//$country = $this->Country->read(null, $country_not_full['Country']['id']);
			$name = $language['Language']['name'];
			$str = "echo __(\"{$name}\");\n";
			fwrite($fp, $str);
		}
		fwrite($fp, "?>");
		fclose($fp);
		$this->Session->setFlash('Everything has been done.');
		//$this->redirect(array('action'=>'index'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Language.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('language', $this->Language->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) 
		{
			$this->Language->create();
			if ($this->Language->save($this->data)) {
				$this->Session->setFlash('The Language has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Language could not be saved. Please, try again.');
			}
		}
		$users = $this->Language->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Language');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Language->save($this->data)) {
				$this->Session->setFlash('The Language has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Language could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Language->read(null, $id);
		}
		$users = $this->Language->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Language');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Language->del($id)) {
			$this->Session->setFlash('Language deleted');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>