<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUploadedFiles */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Uploaded Files');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uploaded-files-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Uploaded Files'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'filename',
            'size',
            'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
