<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $alias
 * @property string $title
 * @property string $text
 * @property string $prev_text
 * @property string $image
 * @property int $category_id
 * @property int $source_id
 * @property int $status
 * @property int $published_at
 * @property int $created_at
 * @property int $updated_at
 *
 * @property NewsCategory $category
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'text', 'prev_text'], 'required'],
            [['text', 'prev_text', 'image'], 'string'],
            [['category_id', 'source_id', 'status', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['alias'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'text' => 'Text',
            'prev_text' => 'Prev Text',
            'image' => 'Image',
            'category_id' => 'Category ID',
            'source_id' => 'Source ID',
            'status' => 'Status',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'category_id']);
    }
}
