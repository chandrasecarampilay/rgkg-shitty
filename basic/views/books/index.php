<?php

use yii\helpers\Html;
use yii\grid\GridView;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBooks */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $authorsArray array */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel, 'authorsArray' => $authorsArray,]); ?>

    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $result = GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
                'id',
                'name',
                [
                    'attribute' => 'preview',
                    'format' => ['image'],
                    'value' => 'preview',
                ],
                [
                    'attribute' => 'thumbnail',
                    'format' => ['raw']
                ],
                'authorFullName',
                [
                    'attribute' => 'date',
                    'format' => ['date', 'php:Y'],
                    'value' => 'date',
                ],
                [
                    'attribute' => 'date_create',
                    'format' => ['date', 'php:d mm Y'],
                    'value' => 'date_create',
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    echo $result;
    ?>
</div>
