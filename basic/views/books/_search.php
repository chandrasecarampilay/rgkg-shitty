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

    <?php echo $form->field($model, 'name')->label(Yii::t('app/forms', 'Book Name')) ?>
    <?php
    echo Html::label(Yii::t('app/forms', 'Book publish date'));
    echo $form->field($model, 'searchDateCreateFrom')
        ->widget(DatePicker::classname(),
            [
                'dateFormat' => 'yyyy-MM-dd',
            ])
    ?>
    <?php
    echo $form->field($model, 'searchDateCreateTo')
        ->widget(DatePicker::classname(),
            [
                'dateFormat' => 'yyyy-MM-dd',
            ])
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
