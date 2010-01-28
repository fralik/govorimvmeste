<?php
class LanguagesUsersController extends AppController {

	var $name = 'LanguagesUsers';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->LanguagesUser->recursive = 0;
		$this->set('languagesUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid LanguagesUser.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('languagesUser', $this->LanguagesUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->LanguagesUser->create();
			if ($this->LanguagesUser->save($this->data)) {
				$this->Session->setFlash('The LanguagesUser has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The LanguagesUser could not be saved. Please, try again.');
			}
		}
		$languages = $this->LanguagesUser->Language->find('list');
		$users = $this->LanguagesUser->User->find('list');
		$this->set(compact('languages', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid LanguagesUser');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->LanguagesUser->save($this->data)) {
				$this->Session->setFlash('The LanguagesUser has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The LanguagesUser could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->LanguagesUser->read(null, $id);
		}
		$languages = $this->LanguagesUser->Language->find('list');
		$users = $this->LanguagesUser->User->find('list');
		$this->set(compact('languages','users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for LanguagesUser');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->LanguagesUser->del($id)) {
			$this->Session->setFlash('LanguagesUser deleted');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>