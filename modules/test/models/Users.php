<?php

namespace app\modules\test\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
    public $image;
    public $filename;
    public $string;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'password'], 'required'],
            [['user_id'], 'integer'],
            [['password'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->string = substr(uniqid('img'), 0, 12);
            $this->image = UploadedFile::getInstance($this, 'username');
            $this->filename = 'static/images/' . $this->string . '.' . $this->image->extension;
            $this->image->saveAs($this->filename);
            //save
            $this->username = '/' . $this->filename;
        } else {
            $this->username = UploadedFile::getInstance($this, 'username');
            if ($this->username) {
                $this->username->saveAs(substr($this->username, 1));
            }
        }
        return parent::beforeSave($insert);
    }
}
