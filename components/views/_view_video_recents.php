<?php
/**
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Video-Albums
 * @contect (+62)856-299-4114
 *
 */
?>

<?php if($model != null) {?>
<ul>
	<?php
	$i=0;
	foreach($model as $key => $val) {
	$i++;
		//$title = ucwords(strtolower($val->title));
		$title = $val->title;
		$url = Yii::app()->createUrl('video/site/view', array('id'=>$val->video_id, 'slug'=>Utility::getUrlTitle($val->title)));
		
		if($i == 1 && $this->videoShow == true) {?>	
			<li <?php echo $val->media != '' ? 'class="solid"' : '';?>>
				<a href="<?php echo $url;?>" title="<?php echo $title;?>">
					<?php if($val->media != '') {?><iframe width="230" src="https://www.youtube.com/embed/<?php echo $val->media;?>?disablekb=1&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe><?php }?>
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
	