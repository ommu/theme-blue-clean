<?php if($model != null) {?>
<ul>
	<?php 
	$i=0;
	foreach($model as $key => $val) {
	$i++;
		//$title = ucwords(strtolower($val->title));
		$title = $val->title;
		$url = Yii::app()->createUrl('album/site/view', array('id'=>$val->album_id, 'slug'=>Utility::getUrlTitle($val->title)));
	
		$photos = $val->photos;
		if(!empty($photos)) {
			$media = $val->view->photo_cover ? $val->view->photo_cover : $photos[0]->media;
			$image = Yii::app()->request->baseUrl.'/public/album/'.$val->album_id.'/'.$media;
		}
		
		if($i == 1 && $this->coverShow == true) {?>			
			<li <?php echo !empty($photos) ? 'class="solid"' : '';?>>
				<a href="<?php echo $url;?>" title="<?php echo $title;?>">
					<?php if(!empty($photos)) {?><img src="<?php echo Utility::getTimThumb($image, 230, 100, 1)?>" alt="<?php echo $title;?>" /><?php }?>
					<?php echo Utility::shortText(Utility::hardDecode($title),90);?>
				</a>
				<span><?php echo $val->creation->displayname.' / '.Utility::dateFormat($val->creation_date);?></span>
			</li>
		<?php } else {?>
			<li>
				<a href="<?php echo $url;?>" title="<?php echo $title;?>"><?php echo Utility::shortText(Utility::hardDecode($title),90);?></a>
				<span><?php echo $val->creation->displayname.' / '.Utility::dateFormat($val->creation_date);?></span>
			</li>
		<?php }
	}?>
</ul>
<?php }?>