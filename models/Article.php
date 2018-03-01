<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $img
 * @property string $title
 * @property string $description
 * @property string $pubdate
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['pubdate'], 'safe'],
            [['img', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'title' => 'Title',
            'description' => 'Description',
            'pubdate' => 'Pubdate',
        ];
    }


    public static function getAll()
    {
        $query = Article::find();
        $articles = $query->orderBy('id asc')->limit(10)->all();
        $data = ['articles' => $articles];
        return $data;       

    }

    public function getPubdate()
    {      
        return Yii::$app->formatter->asDateTime($this->pubdate, 'php:G:i');     
    }
}
