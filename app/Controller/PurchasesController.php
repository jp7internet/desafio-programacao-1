<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class PurchasesController extends AppController {
	
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');
	public $name = 'Purchases';
	public $uses = array('Purchase');
	

	
	/**
	 * index function
	 * @return void
	 */
	public function index(){
		$this->set('title_for_layout', Configure::read('Settings.title') . ' - Compra | ' . Configure::read('Settings.mark'));

		$this->set('purchases', $this->paginate());
	}
	
	/**
	 * view function
	 * @param int $id
	 * @return $this->request->data
	 */
	public function view($id = null) {
		$this->set('title_for_layout', Configure::read('Settings.title') . ' - Visualizar Compra | ' . Configure::read('Settings.mark'));
		
		$this->Purchase->id = $id;
		
		if (!$this->Purchase->exists()) {
			throw new NotFoundException('Compra inválida');
		}
		$this->request->data = $this->Purchase->read(null, $id);	
		$this->set('purchase', $id);
	}
	
	/**
	 * add function
	 * @return void
	 */
	public function add () {
	$this->set('title_for_layout', Configure::read('Settings.title') . '  Cadastro de Compra | ' . Configure::read('Settings.mark'));
	
	if ($this->request->is('post')) {
		$this->Purchase->create();
		if ($this->Purchase->save($this->request->data)) {
			$this->Session->setFlash('A compra foi salva', 'default', array('class' => 'pmsp-alert alert-success'));
			$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('A compra não foi salva, por favor tente novamente', 'default', array('class' => 'pmsp-alert alert-error'));
			}
		}
	}
	
	/**
	 * edit function
	 * @param int $id
	 * @return void
	 */
	public function edit ($id =  null){
		$this->set('title_for_layout', Configure::read('Settings.title') . ' - Editar Compra | ' . Configure::read('Settings.mark'));
		
		
		$this->Purchase->id = $id;
		
		if(!$this->Purchase->exists()) {
			throw new NotFoundException('Compra inválida');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Purchase->save($this->request->data)) {
				$this->Session->setFlash('A compra foi salva', 'default', array('class' => 'pmsp-alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('A compra não pode ser salva, por favor tente de novo.', 'default', array('class' => 'pmsp-alert alert-error'));
			}
		} else {
			$this->request->data = $this->Purchase->read(null, $id);
		}
		$this->set('purchase', $id);
	}
	
	/**
	 * edit function
	 * @param int $id
	 */
	
	public function delete($id = null) {
		$this->Purchase->id = $id;
		if (!$this->Purchase->exists()) {
			throw new NotFoundException(__('Compra invalida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Purchase->delete()) {
			$this->Session->setFlash(__('A compra foi deletada.'));
		} else {
			$this->Session->setFlash(__('A compra não pode ser deletada'));
		}
		return $this->redirect(array('action' => 'index'));
	}


}
