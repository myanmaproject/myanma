<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presentoccupationaddress".
 *
 * @property integer $idpresentOccupationAddress
 * @property integer $state
 * @property integer $district
 * @property integer $township
 * @property integer $passport_idpassport
 *
 * @property Passport $passportIdpassport
 */
class Presentoccupationaddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presentoccupationaddress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'district', 'township', 'passport_idpassport'], 'integer'],
            [['passport_idpassport'], 'required'],
            [['passport_idpassport'], 'exist', 'skipOnError' => true, 'targetClass' => Passport::className(), 'targetAttribute' => ['passport_idpassport' => 'idpassport']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpresentOccupationAddress' => 'Idpresent Occupation Address',
            'state' => 'State',
            'district' => 'District',
            'township' => 'Township',
            'passport_idpassport' => 'Passport Idpassport',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPassportIdpassport()
    {
        return $this->hasOne(Passport::className(), ['idpassport' => 'passport_idpassport']);
    }
}
