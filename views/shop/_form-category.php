<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])/*->label('Имя')*/ ?>

    <?= $form->field($model, 'parent_id')->textInput()/*->label('Номер родительской категории')*/ ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
