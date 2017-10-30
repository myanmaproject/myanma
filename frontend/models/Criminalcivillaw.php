<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "criminalcivillaw".
 *
 * @property integer $idcriminalCivillaw
 * @property string $act
 * @property string $punishment
 * @property string $prison
 * @property integer $passport_idpassport
 * @property string $court
 * @property string $periodFrom
 * @property string $periodTo
 *
 * @property Passport $passportIdpassport
 */
class Criminalcivillaw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'criminalcivillaw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['passport_idpassport'], 'required'],
            [['passport_idpassport'], 'integer'],
            [['act', 'punishment', 'prison', 'court', 'periodFrom', 'periodTo'], 'string', 'max' => 45],
            [['passport_idpassport'], 'exist', 'skipOnError' => true, 'targetClass' => Passport::className(), 'targetAttribute' => ['passport_idpassport' => 'idpassport']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcriminalCivillaw' => 'Idcriminal Civillaw',
            'act' => 'Act',
            'punishment' => 'Punishment',
            'prison' => 'Prison',
            'passport_idpassport' => 'Passport Idpassport',
            'court' => 'Court',
            'periodFrom' => 'Period From',
            'periodTo' => 'Period To',
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
