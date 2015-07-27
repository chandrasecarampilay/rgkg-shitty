<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBooks */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $authorsArray array */

$this->title = Yii::t('app/forms', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
    Pjax::begin();
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel, 'authorsArray' => $authorsArray,]); ?>

    <?php
    $result = GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'name',
                [
                    'attribute' => 'thumbnail',
                    'format' => ['raw']
                ],
                'authorFullName',
                [
                    'attribute' => 'date',
                    'format' => ['date', 'php:d mm Y'],
                    'value' => 'date',
                ],
                [
                    'attribute' => 'date_create',
                    'format' => ['date', 'php:d mm Y'],
                    'value' => 'date_create',
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {view} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model, $key) {
                                $text = Yii::t('app/actioncolumn-buttons', 'edit');
                                return Html::a($text, $url, ['title'=>$text, 'aria-label'=>$text]);
                            },
                            'view'   => function ($url, $model, $key) {
                                $text = Yii::t('app/actioncolumn-buttons', 'view');
                                return Html::a($text, $url, ['class' => 'showModalButton', 'title' => $text, 'value' => $url, 'aria-label'=>$text]);
                            },
                            'delete' => function ($url, $model, $key) {
                                $text = Yii::t('app/actioncolumn-buttons', 'delete');
                                return Html::a($text, $url, ['title'=>$text, 'aria-label'=>$text, 'data-method'=>'post', 'data-pjax'=>'0', 'data-confirm'=>'Are you sure you want to delete this item?']);
                            },
                        ]
                ],
            ],
        ]);
    echo $result;
    ?>

    <?php
        yii\bootstrap\Modal::begin([
            'headerOptions' => ['id' => 'modalHeader'],
            'id' => 'modal',
            'size' => 'modal-lg',
            //keeps from closing modal with esc key or by clicking out of the modal.
            // user must click cancel or X to close
//            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
        ]);
        echo "<div id='modalContent'></div>";
//        echo "<div id='modalContent'><div style="text-align:center"><img src="my/path/to/loader.gif"></div></div>";
        yii\bootstrap\Modal::end();
    ?>

</div>
<?php Pjax::end(); ?>
