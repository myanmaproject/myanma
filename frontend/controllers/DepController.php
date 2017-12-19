<?php

namespace frontend\controllers;

use yii\web\Controller;
use app\models\state;
use app\models\district;
use app\models\township;

/**
 * Site controller
 */
class DepController extends Controller {

    /**
     * @inheritdoc
     */
    public function actionDistrict($id) {
        $stateId= null;
        if($id!=null){
            $state = state::find()
                ->where(['stateNameEN' => $id])
                ->one();
        
        $stateId = $state->stateId;

        }
       $countDistrict = district::find()
                ->where(['stateId' => $stateId])
                ->andWhere(['status'=>'1'])
                ->count();


        $District = district::find()
                ->where(['stateId' => $stateId])
                ->andWhere(['status'=>'1'])
                ->all();

        

        if ($countDistrict > 0) {
            echo "<option value>Select District</option>";

            foreach ($District as $post) {
                echo "<option value='" . $post['districtNameEN'] . "'>" . $post['districtNameEN'] . "</option>";
            }
        } else {
            echo "<option value>Select District</option>";
        }
    }

    public function actionTownship($id) {

        $districtId= null;
        if($id!=null){
            $district = district::find()
                ->where(['districtNameEN' => $id])
                ->one();
        
        $districtId = $district->districtId;

        }

        
       
       $countTownship = township::find()
                ->where(['districtId' => $districtId])
                ->andWhere(['status'=>'1'])
                ->count();

        $township = township::find()
                ->where(['districtId' => $districtId])
                ->andWhere(['status'=>'1'])
                ->all();

        

        if ($countTownship > 0) {
            echo "<option value>Select Township</option>";

            foreach ($township as $post) {
                echo "<option value='" . $post['townshipNameEN'] . "'>" . $post['townshipNameEN'] . "</option>";
            }
        } else {
            echo "<option value>Select Township</option>";
        }
    }

    


}
