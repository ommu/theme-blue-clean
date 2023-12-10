<?php
/**
 * @var string $content
 * @var $this app\components\View
 */

use yii\helpers\Html;
use yii\helpers\Url;

$themeAsset = \themes\blueclean\assets\ThemeAsset::register($this);
$context = $this->context;
?>

<footer>
	<div class="container pt-4 pb-4 text-center text-sm-left">
		<div class="row">
			<div class="about col-12 col-sm-4 col-lg-2 mb-4 mb-lg-0">
				<h5 class="mb-3">Tentang DPAD</h5>
			</div>
			<div class="about col-12 col-sm-4 col-lg-2 mb-4 mb-lg-0">
				<h5 class="mb-3">Link Terkait</h5>
			</div>
			<div class="about col-12 col-sm-4 col-lg-3 mb-4 mb-lg-0">
				<h5 class="mb-3">Statistik</h5>
				<div class="text-left">
				</div>
			</div>
			<div class="address col-lg-5 pt-4 pt-lg-0 text-center text-lg-left">
				<h5 class="mb-3">Dinas Perpustakaan dan Arsip Daerah
					<span class="h6 d-block mb-0">Daerah Istimewa Yogyakarta</span>
				</h5>
				<p class="mb-2 mb-lg-3"><i class="fa fa-map-marker mr-2 position-lg-absolute"></i> <?php echo $context->address;?></p>
				<p class="mb-2 mb-lg-3"><i class="fa fa-envelope mr-2 position-lg-absolute"></i> <?php echo $context->email;?></p>
				<p class="mb-2 mb-lg-3"><i class="fa fa-phone mr-2 position-lg-absolute"></i> <?php echo $context->phone;?></p>
			</div>
		</div>
	</div>
	<div class="copyright text-center text-lg-left">
		<div class="container pt-4 pb-4">
			<?php echo Yii::t('app', 'Copyright &copy; {year} {siteName}. All rights reserved.', ['year'=>date("Y"), 'siteName'=>$context->siteName]);?>
			<?php if($isDemoTheme) {?>
				<span class="d-block d-lg-inline"><?php echo Yii::t('app', 'Powered by {ommu}', ['ommu'=>Html::a('OMMU', 'http://ommu.id', ['title'=>'OMMU', 'target'=>'_blank'])]);?></span>
			<?php }?>
		</div>
	</div>
</footer>