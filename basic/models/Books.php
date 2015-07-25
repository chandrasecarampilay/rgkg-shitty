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
        return [
        [
            'class' => 'mdm\upload\UploadBehavior',
            'attribute' => 'file', // required, use to receive input file
            'savedAttribute' => 'file_id', // optional, use to link model with saved file.
//            'uploadPath' => '@common/upload', // saved directory. default to '@runtime/upload'
            'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
            'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
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
