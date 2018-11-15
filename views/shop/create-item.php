<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = 'Создать товар';
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-item', [
        'model' => $model,
    ]) ?>

</div>
