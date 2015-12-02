<?php
/**
 * Created by PhpStorm.
 * User: Zakhraii
 * Date: 9/6/2015
 * Time: 11:07 PM
 */
namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Users;

class UsersController extends Controller
{
    public function actionIndex($message = 'message')
    {
        $query = Users::find();

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('username')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
            'message' => $message,
        ]);
    }
    public function actionHello($message = 'message')
    {
        return $this->render('hello', [

            'message' => $message,
        ]);
    }
}