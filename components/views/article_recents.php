<?php if($model != null) {?>
<div class="box recent-news-article">
	<?php if($module == null && $currentAction == 'site/index') {?>
		<div class="title clearfix">
			<h2><?php echo $this->title ? $this->title : Yii::t('phrase', 'Berita Terbaru');?></h2>
		</div>
	<?php } else {?>
		<h3><?php echo $this->title ? $this->title : Yii::t('phrase', 'Berita Terbaru');?></h3>
	<?php }?>
	
	<?php $this->render('_view_article_recents',array(
		'code' => $this->code,
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