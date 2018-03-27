<?php

class MainArticleRecentNews extends CWidget
{
	public $title;
	public $category;

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
		Yii::import('application.modules.article.models.ArticleCategory');
		
		$criteria=new CDbCriteria;
		$criteria->compare('publish', 1);
		if(is_array($this->category))
			$criteria->addInCondition('cat_id', $this->category);
		else
			$criteria->compare('cat_id',$this->category);
		$criteria->order = 'cat_id DESC';
		
		$category = ArticleCategory::model()->findAll($criteria);

		$this->render('main_article_recent_news',array(
			'category' => $category,
			'module' => $module,
			'controller' => $controller,
			'action' => $action,
			'currentAction' => $currentAction,
			'currentModule' => $currentModule,
			'currentModuleAction' => $currentModuleAction,
		));	
	}
}
