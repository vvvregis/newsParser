<?php

namespace common\models;

use common\traits\ModelBehaviorTrait;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;

class News extends \common\models\generated\News
{

    use ModelBehaviorTrait;

    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 0;

    /**
     * Uploaded file
     * @var
     */
    public $imageFile;

    /**
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['imageFile'], 'file'],
        ]);
    }

    /**
     * Add parsed news to database
     * @param $class
     * @return null
     * @throws HttpException
     */
    public function addFromParser($class)
    {
        $newsArray = $class->parser();
        $imagePath = $class->getImagePath();
        $sourceId = $class->getSourceId();

        if (!$newsArray) {
            return null;
        }

        foreach ($newsArray as $post) {
            $categoryId = self::checkCategory($post['category_name']);

            $model = new self();
            $model->category_id = $categoryId;
            $model->title = $post['title'];
            $model->prev_text = $post['prev_text'];
            $model->text = $post['body'];
            $model->source_id = $sourceId;
            $model->status = self::STATUS_PUBLISHED;
            $model->image = $post['image'];

            if ($model->validate() && $model->save()) {
                self::uploadNewsImage($post['image'], $imagePath);
            }
        }
    }

    /**
     * checking exists category
     * @param $categoryName string
     * @return mixed
     * @throws HttpException
     */
    protected static function checkCategory($categoryName)
    {
        $existCategory = NewsCategory::find()->where(['title' => $categoryName])->one();
        if ($existCategory) {
            return $existCategory->id;
        } else {
            $category = new NewsCategory();
            $category->title = $categoryName;
            $category->status = 1;
            if ($category->save()) {
                return $category->getPrimaryKey();
            } else {
                throw new HttpException('405', 'Error saving model');
            }
        }
    }

    /**
     * Uploading news image to filesystem
     * @param $image string
     * @param $imagePath string
     * @throws HttpException
     */
    public static function uploadNewsImage($image, $imagePath)
    {
        $file = file_get_contents($imagePath.$image);
        if (!$file) {
            throw new HttpException('404', 'File not found');
        }
        $flysystem = \Yii::$app->fs;

        if($flysystem->has($image)){
            $flysystem->delete($image);
        }

        $flysystem->write($image,$file);
    }

    /**
     * Upload file
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs($_SERVER['DOCUMENT_ROOT'].'/frontend/web/uploads/news/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}