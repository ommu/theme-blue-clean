<?php if($model != null) {?>
<div class="box recent-news-album">
	<?php if($module == null && $currentAction == 'site/index') {?>
		<div class="title clearfix">
			<h2><?php echo $this->title ? $this->title : Yii::t('phrase', 'Photo Terbaru');?></h2>
		</div>
	<?php } else {?>
		<h3><?php echo $this->title ? $this->title : Yii::t('phrase', 'Photo Terbaru');?></h3>
	<?php }?>
	
	<?php $this->render('_view_album_recents',array(
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