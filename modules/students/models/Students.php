<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $username
 * @property string $surname
 * @property string $email
 * @property integer $score
 * @property string $gender
 * @property string $birthdate
 * @property string $residence
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'surname', 'email', 'score', 'gender', 'birthdate', 'residence'], 'required'],
            [['score'], 'integer'],
            [['gender', 'residence'], 'string'],
            [['birthdate'], 'safe'],
            ['birthdate', 'date', 'format' => 'yyyy-M-d'],
            [['username', 'surname', 'email'], 'string', 'max' => 100],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'surname' => 'Surname',
            'email' => 'Email',
            'score' => 'Score',
            'gender' => 'Gender',
            'birthdate' => 'Birthdate',
            'residence' => 'Residence',
        ];
    }
}
