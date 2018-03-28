<?php if($model != null) {?>
<ul>
	<?php 
	$i=0;
	foreach($model as $key => $val) {
		$i++;
		
		//$title = ucwords(strtoupper($val->title));
		$title = $val->title;
		if($code == 'archive') {
			if($val->cat_id == 9)
				$code = 'library';
			else
				$code = 'archive';
		}

		$url = Yii::app()->createUrl('article/'.$code.'/view', array('id'=>$val->article_id, 'slug'=>Utility::getUrlTitle($val->title)));
		
		$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
		$medias = $val->medias;
		if(!empty($medias)) {
			$media = $val->view->article_cover ? $val->view->article_cover : $medias[0]->cover_filename;
			$image = Yii::app()->request->baseUrl.'/public/article/'.$val->article_id.'/'.$media;
		}
		
		if($i == 1 && $this->photoShow == true) {?>
			<li <?php echo !empty($medias) ? 'class="solid"' : '';?>>
				<a href="<?php echo $url;?>" title="<?php echo $title;?>">
					<?php if(!empty($medias)) {?><img src="<?php echo Utility::getTimThumb($image, 230, 100, 1)?>" alt="<?php echo $title;?>" /><?php }?>
					<?php echo Utility::shortText(Utility::hardDecode($title),90);?>
				</a>
				<span><?php echo $val->creation->displayname.' / '.Utility::dateFormat($val->published_date);?></span>
			</li>
		<?php } else {?>
			<li>
				<a href="<?php echo $url;?>" title="<?php echo $title?>"><?php echo Utility::shortText(Utility::hardDecode($title),90);?></a>
				<span><?php echo $val->creation->displayname.' / '.Utility::dateFormat($val->published_date);?></span>
			</li>
		<?php }
	}?>
</ul>
<?php }?>