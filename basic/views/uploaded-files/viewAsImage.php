<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UploadedFiles */

?>

<div class="uploaded-files-viewAsImage">
    <?php echo Html::img(['/file', 'id' => $model->id]); ?>
</div>
