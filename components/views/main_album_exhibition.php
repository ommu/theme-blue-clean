<?php if($model != null) {
	$title = ucwords(strtolower($model->title));
	$url = Yii::app()->createUrl('album/exhibition/main', array('id'=>$model->album_id, 'slug'=>Utility::getUrlTitle($model->title)));
	
	$photos = $model->photos;
	if(!empty($photos)) {
		$media = $model->view->photo_cover ? $model->view->photo_cover : $photos[0]->media;
		$image = Yii::app()->request->baseUrl.'/public/album/'.$model->album_id.'/'.$media;
	}
?>
<div class="box recent-news-album no-margin">
	<div class="title clearfix">
		<h2><?php echo $title;?></h2>
	</div>
	<a class="cover-full" href="<?php echo $url;?>" title="<?php echo $title;?>">
		<?php if(!empty($photos)) {?><img src="<?php echo Utility::getTimThumb($image, 250, 270, 1)?>" alt="<?php echo $title;?>" /><?php }?>
		<span>
			<strong><?php echo $model->view->photo_tags ? $model->view->photo_tags : 0;?></strong> <?php echo Yii::t('phrase', 'category');?>, 
			<strong><?php echo $model->view->photos ? $model->view->photos : 0;?></strong> <?php echo Yii::t('phrase', 'photos');?>
		</span>
	</a>
</div>
<?php }?>