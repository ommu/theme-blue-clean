<?php

class FooterStatistic extends CWidget
{

	public function init() {
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() 
	{
		$module = strtolower(Yii::app()->controller->module->id);
		$controller = strtolower(Yii::app()->controller->id);
		$action = strtolower(Yii::app()->controller->action->id);
		$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
		$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
		
		//import		
		Yii::import('application.extensions.gapi-google-analytics.OGapi');

		$model = OmmuSettings::model()->findByPk(1,array(
			'select' => 'site_url, analytic, analytic_id, analytic_profile_id',
		));
		$configPath = YiiBase::getPathOfAlias('application.config');

		$analytic = $model->analytic;
		$analytic_id = $model->analytic_id;
		$ga_profile_id = $model->analytic_profile_id;

		$ga = new OGapi(Yii::app()->params['Analytics']['gserviceaccount'], $configPath.'/'.Yii::app()->params['Analytics']['gservicecertificate']);

		$this->render('footer_statistic',array(
			'model' => $model,
			'ga_profile_id' => $ga_profile_id,
			'ga' => $ga,
			'module' => $module,
			'controller' => $controller,
			'action' => $action,
			'currentAction' => $currentAction,
			'currentModule' => $currentModule,
			'currentModuleAction' => $currentModuleAction,
		));	
	}
}
