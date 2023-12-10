<?php
namespace themes\blueclean\assets;

class FontAwesomeAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@bower/font-awesome';
	
	public $css = [
		'css/all.min.css',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}