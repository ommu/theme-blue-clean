<?php
namespace themes\blueclean\assets;

class GlyphiconsAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@bower/glyphicons-only-bootstrap';
	
	public $css = [
		'css/bootstrap.css',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}