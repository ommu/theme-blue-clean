<?php
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;
use themes\blueclean\assets\ThemePluginAsset;

$themeAsset = ThemePluginAsset::register($this);
$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

$this->beginPage();?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
	<meta charset="<?php echo Yii::$app->charset ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php echo Html::csrfMetaTags() ?>
	<title><?php echo Html::encode($this->pageTitle) ?></title>
	<?php $this->head();
$js = <<<JS
	const themeAssetUrl = '{$themeAsset->baseUrl}';
JS;
$this->registerJs($js, $this::POS_HEAD); ?>
</head>

<body>
<?php $this->beginBody();?>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				loading...
			</div>
		</div>
	</div>
</div>

<header>
</header>

<main>
	<?php //content
	echo $content; ?>
</main>

<?php //begin.footer address
echo \themes\blueclean\components\Footer::widget(); ?>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
