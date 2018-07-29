<?php $this->beginContent('//layouts/default');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.public.*');
	$module = strtolower(Yii::app()->controller->module->id);
	$controller = strtolower(Yii::app()->controller->id);
	$action = strtolower(Yii::app()->controller->action->id);
	$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
	$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	if($module == null) {
		if($controller == 'site') {
			if($action == 'index') {
				$class = 'main';
			} else if($action == 'login') {
				$class = 'login';
			} else {
				$class = $action;
			}
		} else {
			$class = $controller;
		}
	} else {
		if(in_array($currentModule, array('album/search','article/search','video/search'))) {
			$class = 'search';
		} else if(in_array($module, array('album','video')) || (in_array($currentModule, array('book/review')))) {
			$class = 'article';
		} else if(in_array($controller, array('library','news','archive','newspaper'))) {
			$class = $module;
		} else if(in_array($controller, array('announcement','regulation'))) {
			$class = $module.'-download';
		} else {
			$class = $this->urlTitle($module.'-'.$controller);
		}
	}
?>
<?php //echo $this->dialogDetail == true ? (empty($this->dialogWidth) ? 'class="boxed clearfix"' : 'class="clearfix"') : 'class="clearfix"';?>

<?php if($this->dialogDetail == false && $this->pageTitleShow == true) {?>
	<h1><?php echo CHtml::encode($this->pageTitle); ?></h1>
<?php }?>

<div id="<?php echo $class;?>" class="box-wrap <?php echo $this->sidebarShow == true ? 'ads-on' : '';?>">
	
	<?php if($this->sidebarShow == true) {?>
		<div class="content <?php echo $action != 'vieww' ? $action : 'view';?> <?php echo Yii::app()->getRequest()->getParam('category') ? 'category-'.Yii::app()->getRequest()->getParam('category') : '';?>">
			<div class="boxed clearfix">
				<?php echo $content;?>
			</div>
		</div>
		<div class="sidebar">
			<div class="boxed clearfix">
				<?php /*
				<div class="box banner-event">
					<a href="" title=""><img src="<?php echo Yii::app()->request->baseUrl;?>/public/main/event_calendar.png" alt="" /></a>
				</div>
				*/?>
				<?php 
				$condition = 0;
				if($module == 'article' && $controller == 'news')
					$condition = 1;
				
				if($condition == 0) {
					$this->widget('MainArticleRecents', array(
						'title'=>Yii::t('phrase', 'Berita Terbaru'),
						'category'=>array(2,7,18),
					));
				}
				if($condition == 0) {
					if(!in_array($module, array('album', 'video'))) {
						$this->widget('MainAlbumVideoRecents', array(
							'title'=>Yii::t('phrase', 'Album Terbaru'),
						));
					}
				} else {
					if($module != 'album') {
						$this->widget('AlbumRecents', array(
							'title'=>Yii::t('phrase', 'Photo Terbaru'),
							'catNotIn'=>true,
							'category'=>2,
							'limit'=>3,
						));
					}
					if($module != 'video') {
						$this->widget('VideoRecents', array(
							'title'=>Yii::t('phrase', 'Video Terbaru'),
							'limit'=>3,
						));
					}					
				}
				if($module != 'article' || ($module == 'article' && !in_array($controller, array('site','archive')))) {
					$this->widget('ArticleRecents', array(
						'title'=>Yii::t('phrase', 'Artikel Terbaru'),
						'category'=>array(9,10),
						'code'=>'archive',
						'limit'=>3,
					));					
				}
				?>
			</div>
		</div>
	<?php } else {
		if($this->dialogDetail == true) {
			if(!empty($this->dialogWidth)) {?>
				<?php //begin.Notifier Header ?>
				<div class="dialog-header">
					<?php echo CHtml::encode($this->pageTitle); ?>
				</div>
				<?php echo $content?>

			<?php } else {
				if($this->dialogFixed == true) {?>
					<?php //begin.Dialog Header?>
					<h1><?php echo CHtml::encode($this->pageTitle); ?></h1>
					<?php if(!empty($this->pageDescription)) {?>
					<div class="intro">
						<?php echo $this->pageDescription;?>
					</div>
					<?php }
					// begin.render Content
					echo $content;
					?>
					
					<?php //begin.Button Close ?>
					<div class="button">
						<?php $this->widget(
							'FrontOtherDialogClosed', array(
							'links' => Yii::app()->controller->dialogFixedClosed,
						)); ?>
					</div>
					<?php //end.Button Close ?>
				<?php } else {
					echo $content;
				}
			}			
		} else {
			echo $content;
		}?>
	<?php }?>
</div>

<?php $this->endContent(); ?>