<?php 
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/responsiveslides.css');
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/responsiveslides.min.js', CClientScript::POS_END);
	$js=<<<EOP
		$("#rslides").responsiveSlides({
			//nav: true,
			pager: true,
		});
EOP;
	$cs->registerScript('banner', $js, CClientScript::POS_END);
	
if($model != null) {?>
<div class="banner top">
	<ul id="rslides" class="clearfix">
	<?php foreach($model as $key => $val) {
		$extension = pathinfo($val->banner_filename, PATHINFO_EXTENSION);
		if(in_array(strtolower($extension), $banner_file_type))
			$image = Yii::app()->request->baseUrl.'/public/banner/'.$val->banner_filename;?>
		<li>
			<?php 
			BannerViews::insertView($val->banner_id);		
			if($val->url != '-') {?>
				<a href="<?php echo Yii::app()->createUrl('banner/site/click', array('id'=>$val->banner_id, 'slug'=>$this->urlTitle($val->title)))?>" title="<?php echo $val->title?>"><img src="<?php echo $image;?>" alt="<?php echo $val->title?>" /></a>
			<?php } else {?>
				<img src="<?php echo $image;?>" alt="<?php echo $val->title?>" />
			<?php }?>
		</li>
	<?php }?>
	</ul>
</div>
<?php }?>