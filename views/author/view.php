<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Author */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="author-view">

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

    function createBooks($model) {
        $example = "";
        foreach($model->books as $book) {
            $example .= HTML::tag('div',Html::a($book->name, ['book/view', 'id' => $book->id]).' '.Html::a('x', ['author/booksdelete', 'id' => $model->id,'book_id' => $book->id],['class' => 'authors-book-remove']),['class' => 'authors-books']);
        }
        return $example;
    }

    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'surname',
            [
                'attribute'=>'Books',
                'format' => 'html',
                'value' => createBooks($model)
            ]
        ],
    ]) ?>


</div>
