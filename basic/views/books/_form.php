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

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
//        $form->field($model, 'preview')->fileInput(['name' => 'A', 'value' => 'B'])->label('asfg');
//        $form->field($model, 'preview')
//            ->widget(FileInput::classname(), [
//                'options' => ['accept' => 'image/*'],
//            ]);

    ?>

    <?=
        $form->field($model, 'date')
                ->widget(DatePicker::classname(),
                    [
                        //'language' => 'ru',
                        'dateFormat' => 'yyyy-MM-dd',
                    ])
    ?>

    <?php
        echo $form->field($model, 'author_id')
            ->label('Author Name')
            ->dropDownList(
                $authorsArray,
                ['prompt' => '-Choose an author-']
            );

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
