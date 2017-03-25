<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Profile;
use frontend\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\SiteController;
use common\models\User;

use yii\web\UploadedFile;


/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $session = Yii::$app->session;
       
        $user_id = $session->get('user_id');
        echo $user_id;
        $profile=  Profile::findOne(['user_id'=>$user_id]);
        
        
       return $this->render('view', [
            'model' => $profile,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       $model = new Profile();
       
 
        if ($model->load(Yii::$app->request->post())) {
            
            $model->file =  UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('uploads/'.$model->file->baseName. '.'.$model->file->extension);
            $model->pic = 'uploads/'.$model->file->baseName. '.'.$model->file->extension;
            $model->save(false);
         
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       
        $session = Yii::$app->session;
       
        $user_id = $session->get('user_id');
        
        $profile=  Profile::findOne(['user_id'=>$user_id]);
        if ($profile->load(Yii::$app->request->post())) {
            $profile->file = UploadedFile::getInstance($profile, 'file');
            $profile->file->saveAs('uploads/'.$profile->file->baseName. '.'.$profile->file->extension);
            $profile->pic = 'uploads/'.$profile->file->baseName. '.'.$profile->file->extension;
            $profile->save(false);
            
            //echo"You Uploaded".$imageName; die();
            return $this->render('view', [
            'model' => $this->findUser($id)]);
        } else {
            return $this->render('update', [
                'model' => $profile,
            ]);
        }
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findUser($id)->delete();

        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUser($id)
    {
        if (($profile = Profile::findOne($id)) !== null) {
            return $profile;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
