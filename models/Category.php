<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title', 'parent_id'], 'required'],
            [['parent_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Имя',
            'parent_id' => 'Родительская категория',
        ];
    }
}