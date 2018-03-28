<?php
	$cs = Yii::app()->getClientScript();
$js=<<<EOP
	$('.main.article .navigation li, .sidebar .navigation li').on('click', function() {
		var id = $(this).attr('id');
		$(this).parents('.box').find('.navigation li').removeClass('active');
		$(this).addClass('active');
		$(this).parents('.box').find('.main-content').hide();
		$(this).parents('.box').find('#main-'+id).show();		
	});
EOP;
	$cs->registerScript('main', $js, CClientScript::POS_END); 
?>

<div class="box recent-news-album no-margin">
	<?php if($module == null && $currentAction == 'site/index') {?>
		<div class="title clearfix">
			<h2><?php echo $this->title ? $this->title : Yii::t('phrase', 'Album Terbaru');?></h2>
		</div>
	<?php } else {?>
		<h3><?php echo $this->title ? $this->title : Yii::t('phrase', 'Album Terbaru');?></h3>
	<?php }?>
	
	<div class="navigation no-padding-bottom clearfix">
		<ol>
			<li id="photo" class="active"><a href="javascript:void(0);" title="<?php echo Yii::t('phrase', 'Photo');?>"><?php echo Yii::t('phrase', 'Photo');?></a></li>
			<li id="video"><a href="javascript:void(0);" title="<?php echo Yii::t('phrase', 'Video');?>"><?php echo Yii::t('phrase', 'Video');?></a></li>
		</ol>
	</div>
	
	<div id="main-photo" class="main-content">
		<?php $this->widget('AlbumRecents', array(
			'catNotIn'=>true,
			'category'=>2,
			'headline'=>false,
			'limit'=>4,
			'coverShow'=>false,
			'render'=>'partial',
		));?>
	</div>
	
	<div id="main-video" class="main-content hide">
		<?php $this->widget('VideoRecents', array(
			'headline'=>false,
			'limit'=>4,
			'videoShow'=>false,
			'render'=>'partial',
		));?>
	</div>
	
</div>