<?php
/**
 * @var $this SiteController
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2012 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/ommu
 *
 */

	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
?>

<div class="main article clearfix">
	<?php 
	$this->widget('MainArticleRecents', array(
		'title'=>Yii::t('phrase', 'Berita Terbaru'),
		'category'=>array(2,7,18),
	));
	$this->widget('MainAlbumVideoRecents', array(
		'title'=>Yii::t('phrase', 'Album Terbaru'),
	));
	echo '<div class="clear"></div>';
	$this->widget('MainAlbumExhibition');
	?>
</div>