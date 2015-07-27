<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
/* @var $authorsArray array */
?>

<div class="books-form">

    <?php  $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'file')->fileInput() ?>
    <?php echo $model->getClickableThumbnail() ?>

    <?=
        $form->field($model, 'date')
            ->widget(DatePicker::classname(),
                [
                    'dateFormat' => 'yyyy-MM-dd',
                ])
    ?>
    <?php
        echo $form->field($model, 'author_id')
            ->label(Yii::t('app/forms', 'Author Name'))
            ->dropDownList(
                $authorsArray,
                ['prompt' => '-Choose an author-']
            );
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
