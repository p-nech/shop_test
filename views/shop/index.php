<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Category;
?>
<h1>Категории</h1>
<table border='0'>
<?php 
    if ($prev_id != -1) {
?>
    <tr><td>
        <a href="/shop_test/web/?r=shop/index&id=<?= $prev_id ?>">
        <?= '..' ?>
        </a>
    </td><td></td></tr>        
<?php
    }

    foreach ($categories as $category): ?>
    <tr>
        <td>
        <a href="/shop_test/web/?r=shop/index&id=<?=$category->id?>">
        <?= Html::encode("{$category->title} ({$category->id})") ?>
        </a>
        </td>
        <td class="actions"> 
                <a href="/shop_test/web/?r=shop%2Fupdate-category&id=<?=$category->id?>">Изменить</a>
                <a href="/shop_test/web/?r=shop%2Fdelete-category&id=<?=$category->id?>">Удалить</a>
        </td>
    </tr> 
<?php endforeach; ?>
</table>

<br/>
    <?= Html::a('Создать категорию', ['create-category'], ['class' => 'btn btn-success']) ?>
<h1>Товары</h1>
<?php 
    if (!empty($items)) {
?>
    
    <table border='0'>
    <?php foreach ($items as $item): ?>
        <tr>
            <td>
            <?= Html::encode("{$item->name} - {$item->price}") ?>
            </td>
            <td class="actions"> 
                <a href="/shop_test/web/?r=shop%2Fupdate-item&id=<?=$item->id?>">Изменить</a>
                <a href="/shop_test/web/?r=shop%2Fdelete-item&id=<?=$item->id?>">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php } else {
 
}?>
<br/>
    <?= Html::a('Создать товар', ['create-item'], ['class' => 'btn btn-success']) ?>
<?php if (!empty($categories_all)) {
        $category = $categories_all[0] ?>
        <div style="margin-top: 50px">
            <?=\pistol88\tree\widgets\Tree::widget(['model' => $category]);;?>
        </div>
<?php } ?>


        
