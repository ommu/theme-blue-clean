<?php 
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php $this->beginContent('@themes/blueclean/layouts/default.php'); ?>

<?php echo $content; ?>

<?php $this->endContent(); ?>