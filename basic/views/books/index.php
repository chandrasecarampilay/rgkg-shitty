<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBooks */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<!--    --><?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'preview',
            'author',
            'date',
            'date_create',
//            'date_update',
            // 'date',
            // 'author_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>

    <?php
        $config = [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'preview',
//                'author',
                'date',
                'date_create',
//            'date_update',
                // 'date',
                // 'author_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ];

        ob_start();
        ob_implicit_flush(false);
        try {
            /* @var $widget Widget */
//            $config['class'] = get_called_class();
            $config['class'] = GridView::className();
            $widget = Yii::createObject($config);
            $out = $widget->run();
        } catch(\Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $result = ob_get_clean() . $out;
//        echo $result;
        $view = $widget->getView();
//        var_dump($view);

    ?>
    <?php
        $result =
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'preview',
//                    'author',
                    'authorFirstName',
                    'authorLastName',
                    'date',
                    'date_create',
//            'date_update',
                    // 'date',
                    // 'author_id',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        echo $result;

    ?>
</div>
