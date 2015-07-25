<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SearchBooks */
/* @var $form yii\widgets\ActiveForm */
/* @var $authorsArray array */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?php
    echo $form->field($model, 'author_id')
        ->label('Author Name')
        ->dropDownList(
            $authorsArray,
            ['prompt' => '-Choose an author-']
        );
    ?>

    <?php echo $form->field($model, 'name')->label('Book Name') ?>
    <?php
    echo $form->field($model, 'searchDateCreateFrom')
        ->widget(DatePicker::classname(),
            [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
            ])
    ?>
    <?php
    echo $form->field($model, 'searchDateCreateTo')
        ->widget(DatePicker::classname(),
            [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
            ])
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
