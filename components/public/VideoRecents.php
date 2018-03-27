<?php
/**
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Video-Albums
 * @contect (+62)856-299-4114
 *
 */

class VideoRecents extends CWidget
{	 
	/**
	 * Example
	 *
	 *	$this->widget('AlbumRecents', array(
	 *		'title'=>Yii::t('phrase', 'Berita Terbaru'),
	 *		'catNotIn'=>true,
	 *		'cat'=>array(2,3,5,6,7,18),
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
	public $cat;
	public $headline;
	public $limit;
	public $videoShow;
	public $readmore;
	public $render;

	public function init() {
		if($this->videoShow)
			$this->videoShow = true;
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
		Yii::import('application.modules.video.models.Videos');

		$criteria=new CDbCriteria;
		$criteria->condition = 'publish = :publish';
		$criteria->params = array(
			':publish'=>1,
		);
		if($this->catNotIn == null || ($this->catNotIn != null && $this->catNotIn == false)) {
			if($this->cat != null) {
				if(is_array($this->cat))
					$criteria->addInCondition('cat_id', $this->cat);
				else
					$criteria->compare('cat_id',$this->cat);
			}
		} else {
			if($this->cat != null) {
				if(is_array($this->cat))
					$criteria->addNotInCondition('cat_id', $this->cat);
				else
					$criteria->addNotInCondition('cat_id', array($this->cat));
			}
		}
		if($this->headline && $this->headline == false)
			$criteria->compare('headline', 0);
		$criteria->order = 'creation_date DESC';
		$criteria->limit = $this->limit != null ? $this->limit : 5;

		$model = Videos::model()->findAll($criteria);

		if($this->render == null || ($this->render != null && $this->render != 'partial'))
			$render = 'video_recents';
		else
			$render = '_view_video_recents';
		
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
