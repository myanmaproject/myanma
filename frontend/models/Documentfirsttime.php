<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documentfirsttime".
 *
 * @property integer $iddocumentFirstTime
 * @property string $detail
 * @property integer $visa_idvisa
 *
 * @property Visa $visaIdvisa
 */
class Documentfirsttime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documentfirsttime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visa_idvisa'], 'required'],
            [['visa_idvisa'], 'integer'],
            [['detail'], 'string', 'max' => 255],
            [['visa_idvisa'], 'exist', 'skipOnError' => true, 'targetClass' => Visa::className(), 'targetAttribute' => ['visa_idvisa' => 'idvisa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddocumentFirstTime' => 'Iddocument First Time',
            'detail' => 'Detail',
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
