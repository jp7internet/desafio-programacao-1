<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Product
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */

class Purchase extends AppModel {
	public $name = 'Purchase';

	public $validate = array(
			'purchaser_name' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Preencha o campo Nome do comprador'
					)
			
			),
			'item_description' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Preencha o campo Descrição do item'
					)
			
			),
			'item_price' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Preencha o campo Preço do item'
					)
			
			),
			'purchase_count' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Preencha o campo Contagem da compra'
					)
			
			),
			'merchant_addres' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Preencha o campo Endereço do comerciante'
					)
			
			),
			'merchant_name' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Preencha o campo Nome do comerciante'
					)
						
			),

	);

}
