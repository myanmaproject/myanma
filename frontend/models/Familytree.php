<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "familytree".
 *
 * @property integer $idfamilytree
 * @property string $name
 * @property string $dateOfBirth
 * @property string $placeOfBirth
 * @property string $raceNationality
 * @property string $nrc
 * @property string $region
 * @property string $occupation
 * @property string $aliveOrDeath
 * @property string $address
 * @property string $father
 * @property string $mother
 *
 * @property Passport[] $passports
 * @property Visa[] $visas
 */
class Familytree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'familytree';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'dateOfBirth', 'placeOfBirth', 'raceNationality', 'nrc', 'region', 'occupation', 'aliveOrDeath', 'address', 'father', 'mother'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfamilytree' => 'Idfamilytree',
            'name' => 'Name',
            'dateOfBirth' => 'Date Of Birth',
            'placeOfBirth' => 'Place Of Birth',
            'raceNationality' => 'Race Nationality',
            'nrc' => 'Nrc',
            'region' => 'Region',
            'occupation' => 'Occupation',
            'aliveOrDeath' => 'Alive Or Death',
            'address' => 'Address',
            'father' => 'Father',
            'mother' => 'Mother',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPassports()
    {
        return $this->hasMany(Passport::className(), ['familytree_idfamilytree' => 'idfamilytree']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisas()
    {
        return $this->hasMany(Visa::className(), ['familytree_idfamilytree' => 'idfamilytree']);
    }
}
