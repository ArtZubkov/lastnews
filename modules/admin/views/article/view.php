<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <div class="container">
        <h1>Успешно сохранено</h1>
        <p>
            <?= Html::a('К списку новостей', ['index'], ['class' => 'btn btn-default']) ?>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        </p>       

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'img',
                'title',
                'description:ntext',
                'pubdate',
            ],
        ]) ?>
    </div>
</div>
