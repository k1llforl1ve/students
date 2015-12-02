<?php
/**
 * Created by PhpStorm.
 * User: Zakhraii
 * Date: 9/6/2015
 * Time: 12:14 AM
 */

namespace app\models;

use yii\base\Model;

class UserForm extends Model
{
    public $name;
    public $email;

    /**
     * @return array
     */
    public function rules()
    {

        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}
