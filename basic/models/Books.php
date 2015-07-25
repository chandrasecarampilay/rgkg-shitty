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
 * @property integer $file_id
 *
 * @property Authors $author
 * @property UploadedFiles $file
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

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'file', // required, use to receive input file
                'savedAttribute' => 'file_id', // optional, use to link model with saved file.
                //'uploadPath' => '@common/upload', // saved directory. default to '@runtime/upload'
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
            [['date_create', 'date_update', 'date', 'authorFirstName', 'authorLastName', 'authorFullName'], 'safe'],
            [['author_id', 'file_id'], 'integer'],
            [['name', 'preview'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
            'preview' => Yii::t('app', 'Preview'),
            'date' => Yii::t('app', 'Date'),
            'author_id' => Yii::t('app', 'Author ID'),
            'file_id' => Yii::t('app', 'File ID'),
//            'authorFirstName' => Yii::t('app', 'authorFirstName'),
//            'authorLastName' => Yii::t('app', 'authorLastName'),
            'authorFullName' => Yii::t('app', 'authorFullName'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(UploadedFiles::className(), ['id' => 'file_id']);
    }

    /**
     * @return string
     */
    public function getAuthorFullName()
    {
        return $this->author->fullname;
    }

    /**
     * TODO:
     * Thumbnail
     * Image
     */

    public function getThumbnail()
    {
//        return '';
        $file = $this->file;
        $name = print_r($file, true);
        $fname = $file->filename;
        return $fname;
    }
}
