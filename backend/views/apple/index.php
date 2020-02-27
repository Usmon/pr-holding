<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apples';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apple', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'color',
            'statusText',
            'size',
            'date_appearance',
            'date_fall',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{fall} {eat}',
                'buttons' => [
                    'fall' => function ($url, $model) {
                        return Html::a('Fall', $url, ['class' => 'btn btn-success']);
                    },
                    'eat' => function ($url, $model) {
                        return Html::a('Eat', '#', ['class' => 'btn btn-danger eat-btn']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>

<?php 
    Modal::begin([
        'header' => '<h4>Eat apple</h4>',
        'id' => 'eat-modal'
    ]);
?>

    <?php $form = ActiveForm::begin(['action' => Url::to(['eat'])]); ?>
    <input id="id_model" type="hidden" name="id" value="">
    <div class="form-group">
        <label class="control-label" for="percentEat">Eat size</label>
        <input type="number" id="percentEat" required class="form-control" name="percent">
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

<?php 
    Modal::end(); 
?>

<?php
$JS = <<<JS
    $('.eat-btn').click(function(e){
        e.preventDefault();
        $('#eat-modal').modal('show');
        var id = $(this).closest('tr').data('key');
        $('#id_model').val(id);
    });
JS;

$this->registerJs($JS);
?>
