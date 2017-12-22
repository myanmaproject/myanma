<?php

namespace frontend\controllers;

use yii\web\Controller;
use app\models\state;
use app\models\district;
use app\models\township;
use app\models\Regionthai;
use app\models\Provincethai;
use app\models\Districtthai;
use app\models\Subdistrictthai;
/**
 * Site controller
 */
class DepController extends Controller {

    /**
     * @inheritdoc
     */
    public function actionDistrict($id) {
        // $stateId= null;
        // if($id!=null){
        //     $state = state::find()
        //         ->where(['stateNameEN' => $id])
        //         ->one();
        
        // $stateId = $state->stateId;

        // }
       $countDistrict = district::find()
                ->where(['stateId' => $id])
                ->andWhere(['status'=>'1'])
                ->count();


        $District = district::find()
                ->where(['stateId' => $id])
                ->andWhere(['status'=>'1'])
                ->all();

        

        if ($countDistrict > 0) {
            echo "<option value>Select District</option>";

            foreach ($District as $post) {
                echo "<option value='" . $post['districtId'] . "'>" . $post['districtNameEN'] . "</option>";
            }
        } else {
            echo "<option value>Select District</option>";
        }
    }

    public function actionTownship($id) {

        // $districtId= null;
        // if($id!=null){
        //     $district = district::find()
        //         ->where(['districtNameEN' => $id])
        //         ->one();
        
        // $districtId = $district->districtId;

        // }

        
       
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
            echo "<option value>Select Township</option>";
        }
    }

    
     public function actionListregion($id)
    {
     
        $countProvince = Provincethai::find()
            ->where(['regionthai_id'=>$id])
            ->count();
        $region = Provincethai::find()
            ->where(['regionthai_id'=>$id])
            ->all();

        if($countProvince > 0)
        {
            echo  "<option>"."select province"."</option>";
            foreach($region as $provincethai){
                 echo "<option value='".$provincethai->id."'>".$provincethai->nameen."</option>";


            }
        }else{
            echo "<option> - </option>";
        }
    }



         public function actionListprovince($id)
    {
     
        $countDistrict = Districtthai::find()
            ->where(['provincethai_id'=>$id])
            ->count();
        $province = Districtthai::find()
            ->where(['provincethai_id'=>$id])
            ->all();

        if($countDistrict > 0)
        {
            echo  "<option>"."select district"."</option>";
            foreach($province as $districtthai){
                 echo "<option value='".$districtthai->id."'>".$districtthai->nameen."</option>";


            }
        }else{
            echo "<option> - </option>";
        }
    }


             public function actionListdistrict($id)
    {
     
        $countSubdistrict = subdistrictthai::find()
            ->where(['districtthai_id'=>$id])
            ->count();
        $district = subdistrictthai::find()
            ->where(['districtthai_id'=>$id])
            ->all();

        if($countSubdistrict > 0)
        {
            echo  "<option>"."select subdistrict"."</option>";
            foreach($district as $subdistrictthai){
                 echo "<option value='".$subdistrictthai->id."'>".$subdistrictthai->nameen."</option>";


            }
        }else{
            echo "<option> - </option>";
        }
    }


}
