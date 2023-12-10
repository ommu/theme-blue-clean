<?php
namespace themes\blueclean\assets;

class ThemeAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@themes/blueclean';
	
	public $css = [
		'css/layout.css',
	];

	public $depends = [
		'themes\blueclean\assets\GlyphiconsAsset',
		"themes\blueclean\assets\FontAwesomeAsset",
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