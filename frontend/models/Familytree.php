<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "familytree".
 *
 * @property integer $idfamilytree
 * @property string $familytree
 * @property string $name
 * @property string $dateOfBirth
 * @property string $placeOfBirth
 * @property integer $statePOB
 * @property integer $districtPOB
 * @property integer $townshipPOB
 * @property string $raceNationality
 * @property string $nrc
 * @property string $region
 * @property string $occupation
 * @property string $aliveOrDeath
 * @property string $address
 * @property integer $stateAF
 * @property integer $districtAF
 * @property integer $townshipAF
 * @property string $father
 * @property string $mother
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Passport[] $passports
 * @property Visa[] $visas
 */
class Familytree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     public function behaviors(){
      return [
        BlameableBehavior::className(),
        TimestampBehavior::className()
      ];
    }
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
            [['dateOfBirth'], 'safe'],
            [['statePOB', 'districtPOB', 'townshipPOB', 'stateAF', 'districtAF', 'townshipAF', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['familytree'], 'string', 'max' => 255],
            [['name', 'placeOfBirth', 'raceNationality', 'nrc', 'region', 'occupation', 'aliveOrDeath', 'address', 'father', 'mother'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfamilytree' => 'Idfamilytree',
            'familytree' => 'Familytree',
            'name' => 'Name',
            'dateOfBirth' => 'Date Of Birth',
            'placeOfBirth' => 'Place Of Birth',
            'statePOB' => 'State Pob',
            'districtPOB' => 'District Pob',
            'townshipPOB' => 'Township Pob',
            'raceNationality' => 'Race Nationality',
            'nrc' => 'Nrc',
            'region' => 'Region',
            'occupation' => 'Occupation',
            'aliveOrDeath' => 'Alive Or Death',
            'address' => 'Address',
            'stateAF' => 'State Af',
            'districtAF' => 'District Af',
            'townshipAF' => 'Township Af',
            'father' => 'Father',
            'mother' => 'Mother',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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
