<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 *
 * @property Authors $author
 * -@property string $authorFullName
 * -@property string $authorFirstName
 * -@property string $authorLastName
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    public function behaviors()
    {
        $a = new \yiidreamteam\upload\ImageUploadBehavior();
        return [
            [
                'class' => '\yiidreamteam\upload\ImageUploadBehavior',
//                'attribute' => 'imageUpload',
                'attribute' => 'preview',
                'thumbs' => [
                    'thumb' => ['width' => 400, 'height' => 300],
                ],
                'filePath' => '@webroot/images/[[pk]].[[extension]]',
                'fileUrl' => '/images/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/images/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
//            [['date_create', 'date_update', 'date'], 'safe'],
            [['date_create', 'date_update', 'date', 'authorFirstName', 'authorLastName'], 'safe'],
            [['author_id'], 'integer'],
//            [['name', 'preview'], 'string', 'max' => 200],
            [['name'], 'string', 'max' => 200],
            ['imageUpload', 'file', 'extensions' => 'jpeg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app', 'Name'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
            'preview' => Yii::t('app', 'Preview'),
            'date' => Yii::t('app', 'Date'),
            'author_id' => Yii::t('app', 'Author ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    /**
     * @return string
     */
    public function getAuthorFullName()
    {
        $author = $this->author;
        return $author->firstname.' '.$author->lastname;
    }

    /**
     * @return string
     */
    public function getAuthorFirstName()
    {
        $author = $this->author;
        return $author->firstname;
    }

    /**
     * @return string
     */
    public function getAuthorLastName()
    {
        $author = $this->author;
        return $author->lastname;
    }
}
