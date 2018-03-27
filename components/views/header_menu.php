<?php 
	$module = strtolower(Yii::app()->controller->module->id);
	$controller = strtolower(Yii::app()->controller->id);
	$action = strtolower(Yii::app()->controller->action->id);
	$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	$currentModule = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
	$currentModuleAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
?>
<ul class="clearfix">
	<?php if($this->type == true) {?>
		<li class="responsive-lx">
			<a href="javascript:void(0);" title="<?php echo Yii::t('phrase', 'Menu');?>"><?php echo Yii::t('phrase', 'Menu');?></a>
			<?php $this->widget('HeaderMenu', array(
				'type'=>false,
			)); ?>	
		</li>
	<?php }?>	
	<li class="<?php echo ($this->type == true ? (($module == null && $currentAction == 'site/index') ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('site/index');?>" title="Home">Home</a></li>
	<li class="<?php echo ($this->type == true ? (($module != null && ($module == 'article' && $controller == 'news/site')) ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('article/news/site/index');?>" title="<?php echo Phrase::trans(1531)?>"><?php echo Phrase::trans(1531)?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/site/index', array('category'=>7,'slug'=>Utility::getUrlTitle(Phrase::trans(1543))));?>" title="<?php echo Phrase::trans(1543)?>"><?php echo Phrase::trans(1543)?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/site/index', array('category'=>18,'slug'=>Utility::getUrlTitle(Phrase::trans(1573))));?>" title="<?php echo Phrase::trans(1573)?>"><?php echo Phrase::trans(1573)?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/site/index', array('category'=>3,'slug'=>Utility::getUrlTitle(Phrase::trans(1535))));?>" title="<?php echo Phrase::trans(1535)?>"><?php echo Phrase::trans(1535)?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/site/index', array('category'=>2,'slug'=>Utility::getUrlTitle(Phrase::trans(1533))));?>" title="<?php echo Phrase::trans(1533)?>"><?php echo Phrase::trans(1533)?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/site/index', array('category'=>5,'slug'=>Utility::getUrlTitle(Phrase::trans(1539))));?>" title="<?php echo Phrase::trans(1539)?>"><?php echo Phrase::trans(1539)?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/news/site/index', array('category'=>6,'slug'=>Utility::getUrlTitle(Phrase::trans(1541))));?>" title="<?php echo Phrase::trans(1541)?>"><?php echo Phrase::trans(1541)?></a></li>
			<?php /*
			<li><a href="<?php echo Yii::app()->createUrl('article/news/site/index', array('category'=>4,'slug'=>Utility::getUrlTitle(Phrase::trans(1537))));?>" title="<?php echo Phrase::trans(1537)?>"><?php echo Phrase::trans(1537)?></a></li>
			*/?>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? (($module != null && (in_array($currentModule, array('article/site','book/review','book/request')))) || ($module == null && $controller == 'page' && (isset($_GET['id']) && in_array($_GET['id'], array(10,11)))) ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('article/site/index');?>" title="<?php echo Phrase::trans(1545)?>"><?php echo Phrase::trans(1545)?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>11,'slug'=>Utility::getUrlTitle(Phrase::trans(1591))))?>" title="<?php echo Phrase::trans(1591);?>"><?php echo Phrase::trans(1591);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>16,'slug'=>Utility::getUrlTitle(Phrase::trans(1624))))?>" title="<?php echo Phrase::trans(1624);?>"><?php echo Phrase::trans(1624);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>17,'slug'=>Utility::getUrlTitle(Phrase::trans(1626))))?>" title="<?php echo Phrase::trans(1626);?>"><?php echo Phrase::trans(1626);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>18,'slug'=>Utility::getUrlTitle(Phrase::trans(1628))))?>" title="<?php echo Phrase::trans(1628);?>"><?php echo Phrase::trans(1628);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>10,'slug'=>Utility::getUrlTitle(Phrase::trans(1589))))?>" title="<?php echo Phrase::trans(1589);?>"><?php echo Phrase::trans(1589);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/site/index');?>" title="<?php echo Phrase::trans(1547);?>"><?php echo Yii::t('phrase', 'Artikel');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/regulation/site/index', array('category'=>13,'slug'=>Utility::getUrlTitle(Phrase::trans(1553).' '.Phrase::trans(1555))));?>" title="<?php echo Phrase::trans(1553).' '.Phrase::trans(1555);?>"><?php echo Phrase::trans(1553);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>15,'slug'=>Utility::getUrlTitle(Phrase::trans(1622))))?>" title="<?php echo Phrase::trans(1622);?>"><?php echo Phrase::trans(1622);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>19,'slug'=>Utility::getUrlTitle(Phrase::trans(1630))))?>" title="<?php echo Phrase::trans(1630);?>"><?php echo Phrase::trans(1630);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>20,'slug'=>Utility::getUrlTitle(Phrase::trans(1632))))?>" title="<?php echo Phrase::trans(1632);?>"><?php echo Phrase::trans(1632);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>21,'slug'=>Utility::getUrlTitle(Phrase::trans(1634))))?>" title="<?php echo Phrase::trans(1634);?>"><?php echo Phrase::trans(1634);?></a></li>
			<?php /*
			<li><a href="<?php echo Yii::app()->createUrl('book/review/index')?>" title="<?php echo Yii::t('phrase', 'Resensi Buku');?>"><?php echo Yii::t('phrase', 'Resensi Buku');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('book/request/index')?>" title="<?php echo Yii::t('phrase', 'Usulan Buku');?>"><?php echo Yii::t('phrase', 'Usulan Buku');?></a></li>
			*/?>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? ((($module != null && (in_array($currentModule, array('article/archive/site')))) || ($module == null && $controller == 'page' && (isset($_GET['id']) && $_GET['id'] == 12))) ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('article/archive/site/index');?>" title="<?php echo Phrase::trans(1551)?>"><?php echo Phrase::trans(1551)?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('article/archive/site/index', array('category'=>10,'slug'=>Utility::getUrlTitle(Phrase::trans(1549))));?>" title="<?php echo Phrase::trans(1549);?>">Artikel</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/regulation/site/index', array('category'=>14,'slug'=>Utility::getUrlTitle(Phrase::trans(1553).' '.Phrase::trans(1557))));?>" title="<?php echo Phrase::trans(1553).' '.Phrase::trans(1557);?>"><?php echo Phrase::trans(1553);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/archive/site/index', array('category'=>15,'slug'=>Utility::getUrlTitle(Phrase::trans(1567))));?>" title="<?php echo Phrase::trans(1567)?>"><?php echo Phrase::trans(1567)?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/archive/site/index', array('category'=>16,'slug'=>Utility::getUrlTitle(Phrase::trans(1569))));?>" title="<?php echo Phrase::trans(1569)?>"><?php echo Phrase::trans(1569)?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('page/view', array('id'=>12,'slug'=>Utility::getUrlTitle(Phrase::trans(1593))))?>" title="<?php echo Phrase::trans(1593);?>">Informasi Layanan</a></li>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? (($module != null && (in_array($currentModule, array('album/site','video/site','article/announcement/site')))) ? 'responsive-ls active' : 'responsive-ls') : '');?>"><a href="<?php echo Yii::app()->createUrl('album/site/index');?>" title="<?php echo Yii::t('phrase', 'Galeri');?>"><?php echo Yii::t('phrase', 'Galeri');?></a>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('album/site/index', array('type'=>'photo'));?>" title="<?php echo Yii::t('phrase', 'Photo BPAD D.I. Yogyakarta');?>"><?php echo Yii::t('phrase', 'Photo');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('video/site/index');?>" title="<?php echo Yii::t('phrase', 'Video BPAD D.I. Yogyakarta');?>"><?php echo Yii::t('phrase', 'Video');?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/newspaper/site/index');?>" title="<?php echo Phrase::trans(1595);?>"><?php echo Phrase::trans(1595);?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('article/announcement/site/index');?>" title="<?php echo Phrase::trans(1577);?>"><?php echo Phrase::trans(1577);?></a></li>
			<?php /*
			<li><a href="<?php echo Yii::app()->createUrl('site/analytics');?>" title="Analytics">Analytics</a></li>
			*/?>
		</ul>
	</li>
	<li class="<?php echo ($this->type == true ? 'responsive-ls' : '');?>"><a href="javascript:void(0);" title="<?php echo Yii::t('phrase', 'e-Resources');?>"><?php echo Yii::t('phrase', 'e-Resources');?></a>
		<ul>
			<li><a target="_blank" href="http://ijogja.bpadjogja.info" title="<?php echo Yii::t('phrase', 'iJogja');?>"><?php echo Yii::t('phrase', 'iJogja');?></a></li>
			<li><a target="_blank" href="http://opac.bpadjogja.info" title="<?php echo Yii::t('phrase', 'Katalog Buku BPAD D.I. Yogyakarta');?>"><?php echo Yii::t('phrase', 'OPAC');?></a></li>
			<li><a target="_blank" href="http://sso.bpadjogja.info" title="<?php echo Yii::t('phrase', 'Single Sign-On Grhatama Pustaka');?>"><?php echo Yii::t('phrase', 'Single Sign-On');?></a></li>
			<li><a target="_blank" href="http://simpul.jikn.go.id/Default.aspx?sid=igcDGoRx3MNphIxTGMb88w==" title="<?php echo Yii::t('phrase', 'JIKN BPAD D.I. Yogyakarta');?>"><?php echo Yii::t('phrase', 'JIKN BPAD DIY');?></a></li>
			<?php /*
			<li><a href="<?php echo Yii::app()->createUrl('article/journal/form');?>" title="<?php echo Yii::t('phrase', 'Form Request Journal');?>"><?php echo Yii::t('phrase', 'Form Request Journal');?></a></li>
			*/?>
		</ul>
	</li>
	<?php if($this->type == true) {?>
		<li class="search"><a href="javascript:void(0);" title="<?php echo Yii::t('phrase', 'Search');?>"><?php echo Yii::t('phrase', 'Search');?></a></li>
	<?php }?>
</ul>