<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\
 * SearchBooks */
/* @var $form yii\widgets\ActiveForm */
/* @var $authorsArray array */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'id' => 'search-book-form'
        ],
    ]); ?>
    <?php
    echo $form->field($model, 'author_id')
        ->label(Yii::t('app/forms', 'Author Name'))
        ->dropDownList(
            $authorsArray,
            ['prompt' => Yii::t('app/forms', '-Choose an author-')]
        );
    ?>

    <?php
        $field = $form->field($model, 'name');
        $field->inputOptions['placeholder'] = Yii::t('app', 'book name');
        echo $field;
    ?>

    <div class="book date-published filter">
        <?php
            echo Html::label(Yii::t('app/forms', 'Book publish date').'&nbsp');
            echo $form->field($model, 'searchDateCreateFrom')
                ->widget(DatePicker::classname(),
                    [
                        'dateFormat' => 'yyyy-MM-dd',
                    ]);
            echo $form->field($model, 'searchDateCreateTo')
                ->widget(DatePicker::classname(),
                    [
                        'dateFormat' => 'yyyy-MM-dd',
                    ]);
            echo Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']);
        ?>

    </div>

    <div class="form-group">
        <?php // Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
