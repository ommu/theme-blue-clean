<?php

class AlbumRecents extends CWidget
{
	/**
	 * Example
	 *
	 *	$this->widget('AlbumRecents', array(
	 *		'title'=>Yii::t('phrase', 'Berita Terbaru'),
	 *		'catNotIn'=>true,
	 *		'category'=>array(2,3,5,6,7,18),
	 *		'limit'=>3,
	 *		'readmore'=>array(
	 *			'status'=>true,
	 *			'url'=>'http://'
	 *		),
	 *	));
	 *
	 **/
	public $title;
	public $catNotIn;
	public $category;
	public $headline;
	public $limit;
	public $coverShow;
	public $readmore;
	public $render;

	public function init() {
		if($this->coverShow)
			$this->coverShow = true;
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() {
		$module = strtolower(Yii::app()->controller->module->id);
		$controller = strtolower(Yii::app()->controller->id);
		$action = strtolower(Yii::app()->controller->action->id);
		$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
		$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		
		//import model
		Yii::import('application.modules.album.models.AlbumPhoto');
		Yii::import('application.modules.album.models.Albums');
		Yii::import('application.modules.album.models.ViewAlbums');
		
		$criteria=new CDbCriteria;
		$criteria->condition = 'publish = :publish';
		$criteria->params = array(
			':publish'=>1,
		);
		if($this->catNotIn == null || ($this->catNotIn != null && $this->catNotIn == false)) {
			if($this->category != null) {
				if(is_array($this->category))
					$criteria->addInCondition('cat_id', $this->category);
				else
					$criteria->compare('cat_id',$this->category);
			}			
		} else {
			if($this->category != null) {
				if(is_array($this->category))
					$criteria->addNotInCondition('cat_id', $this->category);
				else
					$criteria->addNotInCondition('cat_id', array($this->category));
			}			
		}
		if($this->headline && $this->headline == false)
			$criteria->compare('headline', 0);
		$criteria->order = 'creation_date DESC';
		$criteria->limit = $this->limit != null ? $this->limit : 5;
			
		$model = Albums::model()->findAll($criteria);

		if($this->render == null || ($this->render != null && $this->render != 'partial'))
			$render = 'album_recents';
		else
			$render = '_view_album_recents';

		$this->render($render,array(
			'model' => $model,
			'module' => $module,
			'controller' => $controller,
			'action' => $action,
			'currentAction' => $currentAction,
			'currentModule' => $currentModule,
			'currentModuleAction' => $currentModuleAction,
		));	
	}
}
