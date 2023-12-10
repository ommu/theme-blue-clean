<?php 
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php 
$context = $this->context;
if ($context->hasMethod('isVisitorBanned')) {
    if ($context->isVisitorBanned() === true) {
        throw new \yii\web\ForbiddenHttpException(Yii::t('app', 'You are not allowed to access this page.'));
    }
}

$this->beginContent('@themes/blueclean/layouts/front_default.php'); ?>

<?php echo $content; ?>

<?php $this->endContent(); ?>