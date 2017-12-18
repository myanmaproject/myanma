<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

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
    public $stateOfBirth;
    public $districtOfBirth;
    public $townshipOfBirth;
    public $stateAddress;
    public $districtAddress;
    public $townshipAddress;

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
              [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'dateOfBirth', 'placeOfBirth', 'raceNationality', 'nrc', 'region', 'occupation', 'aliveOrDeath', 'address', 'father', 'mother'], 'string', 'max' => 45],
               [['familytree'], 'string', 'max' => 255],
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
            'raceNationality' => 'Race Nationality',
            'nrc' => 'Nrc',
            'region' => 'Region',
            'occupation' => 'Occupation',
            'aliveOrDeath' => 'Alive Or Death',
            'address' => 'Address',
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
