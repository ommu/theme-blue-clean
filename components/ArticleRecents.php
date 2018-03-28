<?php

class ArticleRecents extends CWidget
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
	 *		'code'=>'code',
	 *	));
	 *
	 **/
	public $title;
	public $catNotIn = false;
	public $category;
	public $code = 'news';
	public $headline = false;
	public $limit = 4;
	public $photoShow = true;
	public $readmore;
	public $render;
	
	public function init() {
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
		Yii::import('application.vendor.ommu.article.models.Articles');
		Yii::import('application.vendor.ommu.article.models.ArticleCategory');
		Yii::import('application.vendor.ommu.article.models.ArticleMedia');
		Yii::import('application.vendor.ommu.article.models.ViewArticles');
		
		$criteria=new CDbCriteria;
		$criteria->condition = 'publish = :publish AND published_date <= curdate()';
		$criteria->params = array(
			':publish'=>1,
		);
		
		if($this->catNotIn == false) {
			if(is_array($this->category))
				$criteria->addInCondition('cat_id', $this->category);
			else
				$criteria->compare('cat_id', $this->category);
		} else {
			if(is_array($this->category))
				$criteria->addNotInCondition('cat_id', $this->category);
			else
				$criteria->addNotInCondition('cat_id', array($this->category));
		}
		if($this->headline == true)
			$criteria->compare('headline', 0);
		$criteria->order = 'published_date DESC, article_id DESC';
		$criteria->limit = $this->limit;
			
		$model = Articles::model()->findAll($criteria);
		
		$render = $this->render == 'partial' ? '_view_article_recents' : 'article_recents';

		$this->render($render, array(
			'model' => $model,
			'code' => $this->code,
			'module' => $module,
			'controller' => $controller,
			'action' => $action,
			'currentAction' => $currentAction,
			'currentModule' => $currentModule,
			'currentModuleAction' => $currentModuleAction,
		));	
	}
}
