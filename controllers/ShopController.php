<?php

namespace app\controllers;

use Yii;

use app\models\Category;
use app\models\Item;

class ShopController extends \yii\web\Controller
{
    public function actionIndex($cat_id = 0)
    {        
        $categories = Category::find()->where(['parent_id' => $cat_id])->all();

        //ID для возврата на предыдущий уровень. Если он -1, значит мы в корне.
        $prev_id = -1;
        if ($cat_id != 0) {
            $query = Category::findOne($cat_id);
            $prev_id = $query->parent_id;
        }

        $items = Item::find()->where(['cat_id' => $cat_id])->all();

        return $this->render('index', [
            'categories' => $categories,
            'prev_id' => $prev_id,
            'items' => $items
        ]);
    }
        
    public function actionCreateCategory()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create-category', [
            'model' => $model,
        ]);
    }

    public function actionUpdateCategory($id)
    {
        $model = $this->findModelCategory($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update-category', [
            'model' => $model,
        ]);
    }

    public function actionDeleteCategory($id)
    {
        $this->findModelCategory($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCreateItem()
    {
        $model = new Item();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create-item', [
            'model' => $model,
        ]);
    }

    public function actionUpdateItem($id)
    {
        $model = $this->findModelItem($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update-item', [
            'model' => $model,
        ]);
    }

    public function actionDeleteItem($id)
    {
        $this->findModelItem($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModelCategory($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelItem($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
