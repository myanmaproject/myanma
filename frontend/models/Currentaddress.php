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
 * @property integer $visa_idvisa
 *
 * @property Visa $visaIdvisa
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
            [['state', 'district', 'township', 'visa_idvisa'], 'integer'],
            [['visa_idvisa'], 'required'],
            [['visa_idvisa'], 'exist', 'skipOnError' => true, 'targetClass' => Visa::className(), 'targetAttribute' => ['visa_idvisa' => 'idvisa']],
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
            'visa_idvisa' => 'Visa Idvisa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisaIdvisa()
    {
        return $this->hasOne(Visa::className(), ['idvisa' => 'visa_idvisa']);
    }
}
