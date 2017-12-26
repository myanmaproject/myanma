<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permanentaddress".
 *
 * @property integer $idpermanentAddress
 * @property integer $state
 * @property integer $district
 * @property integer $township
 */
class Permanentaddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permanentaddress';
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
            'idpermanentAddress' => 'Idpermanent Address',
            'state' => 'State',
            'district' => 'District',
            'township' => 'Township',
        ];
    }
}
