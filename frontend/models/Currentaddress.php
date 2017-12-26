<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currentaddress".
 *
 * @property integer $idcurrentAddress
 * @property integer $state
 * @property integer $district
 * @property integer $township
 */
class Currentaddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currentaddress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'district', 'township'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcurrentAddress' => 'Idcurrent Address',
            'state' => 'State',
            'district' => 'District',
            'township' => 'Township',
        ];
    }
}
