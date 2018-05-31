<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $annotation
 * @property string $content
 * @property int $like_social
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property int $removed
 * @property int $deleted
 * @property int $id_category
 *
 * @property NewsCategory $category
 */
class News extends ActiveRecord
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
            [['name', 'url', 'image', 'annotation', 'content'], 'required'],
            [['annotation', 'content'], 'string'],
            [['like_social', 'removed', 'deleted', 'id_category'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'removed', 'deleted', 'moderation'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 512],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'url' => 'Ссылка',
            'image' => 'Изображение',
            'annotation' => 'Аннотация',
            'content' => 'Содержание',
            'like_social' => 'Like',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'deleted_at' => 'Дата удаления',
            'removed' => 'Скрыта',
            'deleted' => 'Удалена',
            'moderation'=>'Moderation',
            'id_category' => 'Категория',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'id_category']);
    }
}
