<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchBooks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'authorFullName') ?>
    <?php echo $form->field($model, 'name') ?>
    <?php
//        echo $form->field($model, 'searchDateCreateFrom')->widget(\yii\yii2-jui\DatePicker::classname(), [
        echo $form->field($model, 'searchDateCreateFrom')->widget(\yii\jui\DatePicker::classname(), [
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
        ])
    ?>
    <?php echo $form->field($model, 'searchDateCreateTo') ?>

    <?php //echo $form->field($model, 'id') ?>
    <?php // echo $form->field($model, 'date_update') ?>
    <?php // echo $form->field($model, 'preview') ?>
    <?php // echo $form->field($model, 'date') ?>
    <?php // echo $form->field($model, 'author_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
