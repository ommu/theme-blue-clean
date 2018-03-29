<?php
$curent=strtotime("-3 days");
$end_date = date('Y-m-d');
$start_date = date('Y-m-d', $curent);

$ga->requestReportData($ga_profile_id, array('date'), array('pageviews','users'), '-date', null, $start_date, $end_date);?>

<div class="statistic table">
	<div class="row">
		<h5 class="cell">Date</h5>
		<h5 class="cell"><?php echo Yii::t('phrase', 'Pages');?></h5>
		<h5 class="cell"><?php echo Yii::t('phrase', 'Users');?></h5>
	</div>
<?php foreach($ga->getResults() as $result):?>
	<div class="row">
		<span class="cell"><?php echo $result ?></span>
		<span class="cell"><?php echo $result->getPageviews() ?></span>
		<span class="cell"><?php echo $result->getUsers() ?></span>
	</div>
<?php endforeach;?>
</div>

<div class="pt-10 center">
	<a class="button" href="<?php echo Yii::app()->createUrl('site/analytics')?>" title="<?php echo Yii::t('phrase', 'Lihat Detail Statistik');?>"><?php echo Yii::t('phrase', 'Statistik');?></a>
</div>