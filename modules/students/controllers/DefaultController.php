<?php

namespace app\modules\students\controllers;

use Yii;
use app\modules\students\models\Students;
use app\modules\students\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Cookie;

/**
 * DefaultController implements the CRUD actions for Students model.
 * TODO: зробити пагінацію дя студентів для тесту зробити по 1
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //$regbutton = $this->buttonReg('registered');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'button' => $regbutton,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);


    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Students();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (!isset(Yii::$app->request->cookies['registered'])) {
                Yii::$app->response->cookies->add(new \yii\web\Cookie([
                    'name' => 'registered',
                    'value' => $model->id,
                ]));
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = $this->findModel($id);
        // проверка является ли айдишка студента, айдишкой забитой в куки, если да возвращает страницу update
        // если нет, тогда делает редирект на index
        if (Yii::$app->request->cookies['registered'] == $id) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->redirect('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function buttonReg($cookie_name)
    {
        if (intval(Yii::$app->request->cookies[$cookie_name])) {
            $model = $this->findModel(Yii::$app->request->cookies[$cookie_name]);
        }
//        $model = $this->findModel(2);
        if ($model) {
            $button['href'] = 'update?id=' . $model->id;
            $button['name'] = 'Update profile';
            return $button;

        } else {
            $button['href'] = 'create';
            $button['name'] = 'Register';
            return $button;
        }
    }

//        return $this->redirect(['index']);

}
