<?php
/*






*/

class Item extends AppModel{

	public $belongsTo= 'Category';
	
	public $validate = array(
		'category_id'=>'numeric',
		'title'=>'notEmpty',
		'year'=>array(
			'rule'=>'numeric',
			'message'=>'Please enter a 4 digit year.'),
		'length'=>'numeric');


}


?>