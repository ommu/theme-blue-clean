<?php
/**
 * @var $this SiteController
 * @var $dataProvider CActiveDataProvider
 *
 * @author Putra Sudaryanto <putra@ommu.co>
 * @copyright Copyright (c) 2014 Ommu Platform (www.ommu.co)
 * @link http://company.ommu.co
 * @contact (+62)856-299-4114
 *
 */
?>

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

<div class="box recent-news-article no-margin">
	<?php if($module == null && $currentAction == 'site/index') {?>
		<div class="title clearfix">
			<h2><?php echo $this->title ? $this->title : Yii::t('phrase', 'Berita Terbaru');?></h2>
		</div>
	<?php } else {?>
		<h3><?php echo $this->title ? $this->title : Yii::t('phrase', 'Berita Terbaru');?></h3>
	<?php }?>
	
	<?php if($category != null) {?>
		<div class="navigation no-padding-bottom clearfix">
			<ol>
				<?php 
				$i = 0;
				foreach($category as $key => $val) {
					$i++;?>
					<li id="<?php echo $this->urlTitle($val->title->message)?>" <?php echo $i == 1 ? 'class="active"' : '';?>><a href="javascript:void(0);" title="<?php echo $val->title->message;?>"><?php echo $val->title->message;?></a></li>
				<?php }?>
			</ol>
		</div>
		<?php 
		$i = 0;
		foreach($category as $key => $val) {
			$i++;?>
			<div id="main-<?php echo $this->urlTitle($val->title->message)?>" class="main-content <?php echo $i != 1 ? 'hide' : ''?>">
				<?php $this->widget('ArticleRecents', array(
					'category'=>$val->cat_id,
					'code'=>'news',
					'photoShow'=>false,
					'render'=>'partial',
				));?>
			</div>
		<?php }?>
	<?php }?>
</div>

<?php 
/*
if($model != null) {?>
<div class="box">
	<div class="title clearfix">
		<h2><?php echo Yii::t('phrase', 'Berita')?></h2>
		<a href="<?php echo Yii::app()->createUrl('article/news/index');?>" title="View <?php echo Yii::t('phrase', 'Berita')?>"><?php echo Yii::t('phrase', 'More');?></a>
	</div>
	
	<?php 
	$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
	$medias = $model[0]->medias;
	if(!empty($medias)) {
		$media = $model[0]->view->article_cover ? $model[0]->view->article_cover : $medias[0]->cover_filename;
		$image = Yii::app()->request->baseUrl.'/public/article/'.$model[0]->article_id.'/'.$media;
	} ?>
	<div class="sep full">
		<a class="images" href="<?php echo Yii::app()->createUrl('article/news/vieww', array('id'=>$model[0]->article_id,'slug'=>$this->urlTitle($model[0]->title)));?>" title="<?php echo $model[0]->title;?>">
			<img src="<?php echo Utility::getTimThumb($image, 600, 250, 1);?>" alt="<?php echo $model[0]->title;?>" />
		</a>
		<a class="title" href="<?php echo Yii::app()->createUrl('article/news/vieww', array('id'=>$model[0]->article_id,'slug'=>$this->urlTitle($model[0]->title)));?>" title="<?php echo $model[0]->title;?>"><?php echo $model[0]->title;?></a>
		<div class="meta-date clearfix">
			<span class="date"><i class="fa fa-calendar"></i>&nbsp;<?php echo $this->dateFormat($model[0]->published_date, 'long', false);?></span>
			<span class="view"><i class="fa fa-eye"></i>&nbsp;<?php echo $model[0]->view->views ? $model[0]->view->views : 0;?></span>
		</div>
		<p><?php echo Utility::shortText(Utility::hardDecode($model[0]->body),250);?></p>
	</div>
	
	<div class="list-view clearfix">
		<?php 
		$j=0;
		foreach($model as $key => $row) {
			$j++;
			$image = Yii::app()->request->baseUrl.'/public/article/article_default.png';
			$medias = $row->medias;
			if(!empty($medias)) {
				$media = $row->view->article_cover ? $row->view->article_cover : $medias[0]->cover_filename;
				$image = Yii::app()->request->baseUrl.'/public/article/'.$row->article_id.'/'.$media;
			}
			if($j >= 2) {?>
			<div class="sep">
				<a class="images" href="<?php echo Yii::app()->createUrl('article/news/vieww', array('id'=>$row->article_id,'slug'=>$this->urlTitle($row->title)));?>" title="<?php echo $row->title;?>">
					<img src="<?php echo Utility::getTimThumb($image, 300, 150, 1);?>" alt="<?php echo $row->title;?>" />
				</a>
				<a class="title" href="<?php echo Yii::app()->createUrl('article/news/vieww', array('id'=>$row->article_id,'slug'=>$this->urlTitle($row->title)));?>" title="<?php echo $row->title;?>"><?php echo Utility::shortText(Utility::hardDecode($row->title),40);?></a>
				<div class="meta-date clearfix">
					<span class="date"><i class="fa fa-calendar"></i>&nbsp;<?php echo $this->dateFormat($row->published_date, 'long', false);?></span>
					<span class="view"><i class="fa fa-eye"></i>&nbsp;<?php echo $row->view->views ? $row->view->views : 0;?></span>
				</div>
				<p><?php echo Utility::shortText(Utility::hardDecode($row->body),100);?></p>
			</div>
			<?php }
		}?>
	</div>
</div>
<?php }
*/?>