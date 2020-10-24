<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php

    function createAuthors($model) {
        $example = "";
        foreach($model->authors as $author) {
            $example .= HTML::tag('div',Html::a($author->name.' '.$author->surname, ['author/view', 'id' => $author->id]).' '.Html::a('x', ['book/authorsdelete', 'id' => $model->id,'author_id' => $author->id],['class' => 'authors-book-remove']),['class' => 'authors-books']);
        }
        return $example;
    }

    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute'=>'Authors',
                'format' => 'html',
                'value' => createAuthors($model)
            ]
        ],
    ]) ?>

</div>
