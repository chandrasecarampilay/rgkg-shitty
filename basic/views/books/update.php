<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $authorsArray array */

//$this->title = Yii::t('app', 'Update {modelClass}: ', [
//    'modelClass' => 'Books',
//]) . ' ' . $model->name;

$this->title =  $model->name;


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/forms', $model->name) , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'authorsArray' => $authorsArray,
    ]) ?>

</div>
