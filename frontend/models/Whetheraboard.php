<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "whetheraboard".
 *
 * @property integer $idwhetheraboard
 * @property string $yearFrom
 * @property string $yearTo
 * @property string $subjectTravelled
 * @property string $country
 * @property string $remark
 * @property integer $passport_idpassport
 *
 * @property Passport $passportIdpassport
 */
class Whetheraboard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'whetheraboard';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['passport_idpassport'], 'required'],
            [['passport_idpassport'], 'integer'],
            [['yearFrom', 'yearTo', 'subjectTravelled', 'country', 'remark'], 'string', 'max' => 45],
            [['passport_idpassport'], 'exist', 'skipOnError' => true, 'targetClass' => Passport::className(), 'targetAttribute' => ['passport_idpassport' => 'idpassport']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idwhetheraboard' => 'Idwhetheraboard',
            'yearFrom' => 'Year From',
            'yearTo' => 'Year To',
            'subjectTravelled' => 'Subject Travelled',
            'country' => 'Country',
            'remark' => 'Remark',
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
