<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studied".
 *
 * @property integer $idstudied
 * @property string $yearFrom
 * @property string $yearTo
 * @property string $nameSchool
 * @property string $townshipWardVillage
 * @property integer $passport_idpassport
 * @property string $standardFrom
 * @property string $standardTo
 *
 * @property Passport $passportIdpassport
 */
class Studied extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studied';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['passport_idpassport'], 'required'],
            [['passport_idpassport'], 'integer'],
            [['yearFrom', 'yearTo', 'nameSchool', 'townshipWardVillage', 'standardFrom', 'standardTo'], 'string', 'max' => 45],
            [['passport_idpassport'], 'exist', 'skipOnError' => true, 'targetClass' => Passport::className(), 'targetAttribute' => ['passport_idpassport' => 'idpassport']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idstudied' => 'Idstudied',
            'yearFrom' => 'Year From',
            'yearTo' => 'Year To',
            'nameSchool' => 'Name School',
            'townshipWardVillage' => 'Township Ward Village',
            'passport_idpassport' => 'Passport Idpassport',
            'standardFrom' => 'Standard From',
            'standardTo' => 'Standard To',
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
