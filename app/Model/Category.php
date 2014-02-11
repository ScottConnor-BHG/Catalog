<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 */
class Category extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	// public $displayField = 'name';

	public $hasMany = 'Items';

	public $validate = array(
		'name'=>'notEmpty',
		'length_type'=>'notEmpty'
	);

	// public $displayField = 'length_type';

}
