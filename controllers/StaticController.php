<?php

namespace app\controllers;

use Yii;
use app\models\Abiturient;
use app\models\Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\models\Orientation;
use yii\behaviors\TimeStampBehavior;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Statistica;

class StaticController extends Controller{

    public function actionAll(){
        $model = new Abiturient();
    
        $count_all=$model::find()->where(['status'=>[2,3,4]])->count();
        $enrol=$model::find()->where(['status'=>[2]])->count();
        $failed=$model::find()->where(['status'=>[4]])->count();
        $refuse=$model::find()->where(['status'=>[3]])->count();
        $tel=$model::find()->where(['status'=>[2,3,4],'orientation'=>[2,3,4]])->count();
        $telEnrol=$model::find()->where(['status'=>[2],'orientation'=>[2,3,4]])->count();
        $telFailed=$model::find()->where(['status'=>[4],'orientation'=>[2,3,4]])->count();
        $telRefuse=$model::find()->where(['status'=>[3],'orientation'=>[2,3,4]])->count();
        $it=$model::find()->where(['status'=>[2,3,4],'orientation'=>[5,6,7,8,9]])->count();
        $itEnrol=$model::find()->where(['status'=>[2],'orientation'=>[5,6,7,8,9]])->count();
        $itFailed=$model::find()->where(['status'=>[4],'orientation'=>[5,6,7,8,9]])->count();
        $itRefuse=$model::find()->where(['status'=>[3],'orientation'=>[5,6,7,8,9]])->count();
        $eco=$model::find()->where(['status'=>[2,3,4],'orientation'=>[10,11,12,13]])->count();
        $ecoEnrol=$model::find()->where(['status'=>[2],'orientation'=>[10,11,12,13]])->count();
        $ecoFailed=$model::find()->where(['status'=>[4],'orientation'=>[10,11,12,13]])->count();
        $ecoRefuse=$model::find()->where(['status'=>[3],'orientation'=>[10,11,12,13]])->count();
        $array=array(
            '1'=$count_all,
            '2'=$enrol,
            '3'=$failed,
            '4'=$refuse,
            '5'=$tel,
            '6'=$telEnrol,
            '7'=$telFailed,
            '8'= $telRefuse,
            '9'= $it,
            '10'=$itEnrol,
            '11'=$itFailed,
            '12'=$itRefuse,
       '13'= $eco,
       '14'=$ecoEnrol,
       '15'=$ecoFailed,
       '16'=$ecoRefuse
        );
    return  $this->render('all', [
        'model' => $model,
        'all'=>$array,
    ]);
    }
}