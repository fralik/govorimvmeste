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
			$this->Session->setFlash(__('Invalid LanguagesUser.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('languagesUser', $this->LanguagesUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->LanguagesUser->create();
			if ($this->LanguagesUser->save($this->data)) {
				$this->Session->setFlash(__('The LanguagesUser has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The LanguagesUser could not be saved. Please, try again.', true));
			}
		}
		$languages = $this->LanguagesUser->Language->find('list');
		$users = $this->LanguagesUser->User->find('list');
		$this->set(compact('languages', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid LanguagesUser', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->LanguagesUser->save($this->data)) {
				$this->Session->setFlash(__('The LanguagesUser has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The LanguagesUser could not be saved. Please, try again.', true));
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
			$this->Session->setFlash(__('Invalid id for LanguagesUser', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->LanguagesUser->del($id)) {
			$this->Session->setFlash(__('LanguagesUser deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>