<?php

namespace frontend\controllers;

use yii\web\Controller;
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
       
       $countStete = district::find()
                ->where(['stateId' => $id])
                ->andWhere(['status'=>'1'])
                ->count();

        $stete = district::find()
                ->where(['stateId' => $id])
                ->andWhere(['status'=>'1'])
                ->all();

        

        if ($countStete > 0) {
            echo "<option value>Select District</option>";

            foreach ($stete as $post) {
                echo "<option value='" . $post['districtId'] . "'>" . $post['districtNameEN'] . "</option>";
            }
        } else {
            echo "<option value>-Select District-</option>";
        }
    }

    public function actionTownship($id) {
       
       $countTownship = township::find()
                ->where(['districtId' => $id])
                ->andWhere(['status'=>'1'])
                ->count();

        $township = township::find()
                ->where(['districtId' => $id])
                ->andWhere(['status'=>'1'])
                ->all();

        

        if ($countTownship > 0) {
            echo "<option value>Select Township</option>";

            foreach ($township as $post) {
                echo "<option value='" . $post['townshipId'] . "'>" . $post['townshipNameEN'] . "</option>";
            }
        } else {
            echo "<option value>-Select Township-</option>";
        }
    }

    


}
