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
 * @property integer $visa_idvisa
 *
 * @property Visa $visaIdvisa
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
            'idpermanentAddress' => 'Idpermanent Address',
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
