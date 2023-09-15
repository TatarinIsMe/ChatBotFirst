<?php
namespace frontend\controllers;

use yii\rest\ActiveController;
use common\models\User;
use Yii;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    // public function actionSet(){
    //     return [
    //         '1' => '2'
    //     ];
    // }
    public $layout = 'basic'; 

    public function actionIndex(){
        if (Yii::$app->request->isAjax){
            debug($_POST);
            return 'test';

        }
        return $this->render('test');
    }
    public function actionShow(){
        
        return $this->render('show');
    }
}



   
