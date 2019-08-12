<?php
/**
 * @author Putra Sudaryanto <putra@ommu.co>
 * @copyright Copyright (c) 2014 Ommu Platform (www.ommu.co)
 * @link https://github.com/oMMu/Ommu-Video-Albums
 * @contect (+62)856-299-4114
 *
 */
?>

<?php if($model != null) {?>
<div class="box recent-news-video">
	<?php if($module == null && $currentAction == 'site/index') {?>
		<div class="title clearfix">
			<h2><?php echo $this->title ? $this->title : Yii::t('phrase', 'Video Terbaru');?></h2>
		</div>
	<?php } else {?>
		<h3><?php echo $this->title ? $this->title : Yii::t('phrase', 'Video Terbaru');?></h3>
	<?php }?>
	
	<?php $this->render('_view_video_recents',array(
		'model'=>$model,
		'module' => $module,
		'controller' => $controller,
		'action' => $action,
		'currentAction' => $currentAction,
		'currentModule' => $currentModule,
		'currentModuleAction' => $currentModuleAction,
	)); ?>
</div>
<?php }?>