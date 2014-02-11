<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ItemsController extends AppController {

	//add sessions component
	public $component = array('Session');
	public function delete($id=null)
	{
			//set the model id
			$this->Item->id=$id;
			//check if id is set
			if(!$id|| !$this->Item->exists())
			{
				throw new NotFoundException(__("ID was not set."));
			}
			if($this->request->is('post'))
			{
				if($this->Item->delete())
				{
					$this->Session->setFlash(__("Item deleted Successfully."));
				}else
				{
					$this->Session->setFlash(__("Item not deleted Successfully."));
				}
			}

			$this->redirect('index');
	}
	public function edit($id=null)
	{
			//check if id is set
			if(!$id)
			{
				throw new NotFoundException(__("ID was not set."));
			}
			$data=$this->Item->findById($id);
			//check if id corresponds to DB entry
			if(!$data)
			{
				throw new NotFoundException(__("ID was not in database."));
			}
			//handle post to DB
			if($this->request->is('post')||$this->request->is('put'))
			{
				$this->Item->create();
				if($this->Item->save($this->request->data))
				{
					$this->Session->setFlash(__('Item was updated Successfully.'));
					$this->redirect('index');
				}else
				{
					//
					//if fails do something
					$this->Session->setFlash(__('Item was not updated Successfully.'));
				}
			}
			$this->request->data=$data;
			$this->set('categories',$this->Item->Category->find('list',array('order'=>'name')));
	}
	public function add()
	{
			$this->set('title_for_layout','Add an item');
			
			if($this->request->is('post'))
			{
				$this->Item->create();
				if($this->Item->save($this->request->data))
				{
					$this->redirect('index');
				}else
				{
					//
					//if fails do something
					//
				}
			}
			$this->set('categories',$this->Item->Category->find('list',array('order'=>'name')));
	}


	public function view($id=null)
	{
		$this->layout='_default';
		if(!$id)
		{
			throw new NotFoundException(__("ID was not set."));
		}
		$data=$this->Item->findById($id);

		if(!$data)
		{
			throw new NotFoundException(__("ID was not in database."));
		}
		$this->set('item',$data);
	}

	public function index()
	{
			$data = $this->Item->find('all',array('order'=>'year'));
			$count = $this->Item->find('count');

			$info = array('items'=>$data,'count'=>$count);
			$this->set($info);


			// $this->set('items',$data);
			// $this->set('count',$count);




	}
	public function search($search = null)
	{
			if(!$search)
			{
				$data = $this->Item->find('all',array('order'=>'year'));
			}else 
			{
				$data = $this->Item->find('all',array('order'=>'year','conditions'=>array('title LIKE'=>'%'.$search.'%')));
				//where title is like '% search %'

			}
			
			//$count = $this->Item->find('count');

			$info = array('items'=>$data,'count'=>count($data));
			$this->set($info);
			//render index from search action
			$this->render('index');
	}
	// public function _countItems()
	// {


	// }
}
?>