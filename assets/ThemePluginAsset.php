<?php
namespace themes\blueclean\assets;

class ThemePluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@themes/blueclean';

	public $js = [];

	public $depends = [
		'yii\web\JqueryAsset',
		'yii\bootstrap4\BootstrapAsset',
		'themes\blueclean\assets\ThemeAsset',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
		'except' => [
			'assets/',
			'components/',
			'controllers/',
			'layouts/',
			'modules/',
			'site/',
			'views/',
		],
	];
}