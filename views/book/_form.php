<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <div class="form-group  field-authors authors required">
        <label class="control-label" for="book-name">Author</label>
        <div style="display: flex">
            <input type="hidden" name="authors[]" class="authors_id" value="0">
            <input type="text" class="form-control author_book" maxlength="255" aria-required="true">
        </div>

        <div class="help-block"></div>
    </div>



    <div class="form-group footer">
        <?= Html::button('Add Author', ['class' => 'btn btn-primary','id' => 'add_author']) ?>

        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
