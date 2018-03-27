<?php

class MainBannerRecent extends CWidget
{
	public $category=null;

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
		Yii::import('application.modules.banner.models.BannerSetting');
		Yii::import('application.modules.banner.models.Banners');
		Yii::import('application.modules.banner.models.BannerCategory');
		Yii::import('application.modules.banner.models.BannerViews');

		$setting = BannerSetting::model()->findByPk(1, array(
			'select' => 'banner_file_type',
		));
		$banner_file_type = unserialize($setting->banner_file_type);
		if(empty($banner_file_type))
			$banner_file_type = array();
		$category = BannerCategory::model()->findByAttributes(array('cat_code' => $this->category), array(
			'select' => 'banner_limit',
		));

		$criteria=new CDbCriteria;
		$criteria->with = array(
			'category' => array(
				'alias'=>'category',
			),
		);
		$now = new CDbExpression("NOW()");
		$criteria->condition = '(t.expired_date >= curdate() OR t.published_date >= curdate()) OR ((t.expired_date = :date OR t.expired_date = :datestr) OR t.published_date >= curdate())';
		$criteria->params = array(
			':date'=>'0000-00-00', 
			':datestr'=>'1970-01-01', 
		);
		$criteria->compare('t.publish', 1);
		$criteria->compare('category.cat_code', $this->category);
		$criteria->order = 't.expired_date ASC';
		$criteria->limit = $category->banner_limit;

		$model = Banners::model()->with('category')->findAll($criteria);

		$this->render('main_banner_recent',array(
			'model' => $model,
			'banner_file_type' => $banner_file_type,
			'module' => $module,
			'controller' => $controller,
			'action' => $action,
			'currentAction' => $currentAction,
			'currentModule' => $currentModule,
			'currentModuleAction' => $currentModuleAction,
		));
	}
}
