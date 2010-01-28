<?php
class CitiesController extends AppController {

	var $name = 'Cities';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->City->recursive = 0;
		$this->set('cities', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid city');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('city', $this->City->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->City->create();
			if ($this->City->save($this->data)) {
				$this->Session->setFlash('The City has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The City could not be saved. Please, try again.');
			}
		}
		$countries = $this->City->Country->find('list');
		$this->set(compact('countries'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid city');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->City->save($this->data)) {
				$this->Session->setFlash('City has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('City could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->City->read(null, $id);
		}
		$countries = $this->City->Country->find('list');
		$this->set(compact('countries'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for City');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->City->del($id)) {
			$this->Session->setFlash('City deleted');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>