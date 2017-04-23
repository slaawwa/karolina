<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $short_desc
 * @property string $long_desc
 * @property string $main_img
 * @property int $viewers
 * @property string $keys
 * @property int $created
 * @property int $status
 * @property string $type
 * @property int $updated
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'viewers', 'created', 'status', 'updated'], 'integer'],
            [['title', 'short_desc', 'long_desc', 'main_img', 'keys', 'type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'title' => 'Title',
            'short_desc' => 'Short Desc',
            'long_desc' => 'Long Desc',
            'main_img' => 'Main Img',
            'viewers' => 'Viewers',
            'keys' => 'Keys',
            'created' => 'Created',
            'status' => 'Status',
            'type' => 'Type',
            'updated' => 'Updated',
        ];
    }
}
