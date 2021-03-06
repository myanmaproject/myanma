<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "passport".
 *
 * @property integer $idpassport
 * @property integer $familytree_idfamilytree
 * @property string $otherName
 * @property string $identificationMark
 * @property string $sex
 * @property string $presentOccupation
 * @property string $presentOccupationAddress
 * @property integer $statePOA
 * @property integer $districtPOA
 * @property integer $townshipPOA
 * @property string $educationalQual
 * @property string $citizenshipSecCardNo
 * @property string $height
 * @property string $eye
 * @property string $hair
 * @property string $spouseName
 * @property string $spouseOccupation
 * @property string $spouseOccupationAddress
 * @property integer $stateSOA
 * @property integer $districtSOA
 * @property integer $townshipSOA
 * @property string $subjectTravelled
 * @property string $countryApplied
 * @property string $departmentTransferred
 * @property string $departmentTransferredCurrent
 * @property string $detailOfSiblingsApplicant
 * @property string $detailOfSpouseApplicant
 * @property string $detailOfSiblingsFather
 * @property string $detailOfSiblingsMother
 * @property string $detailOfChildrenApplicant
 * @property string $detailOfSiblingsSpouse
 * @property string $passportNo
 * @property string $passportIssueDate
 * @property string $placeDeliveredPassport
 * @property string $dateDeliveredPassport
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Criminalcivillaw[] $criminalcivillaws
 * @property Familytree $familytreeIdfamilytree
 * @property Studied[] $studieds
 * @property Whetheraboard[] $whetheraboards
 */
class Passport extends \yii\db\ActiveRecord
{
    public $studied1;
    public $studied2;
    public $studied3;
    public $criminalcivillaw1;
    public $criminalcivillaw2;
    public $whetheraboard1;
    public $whetheraboard2;



    /**
     * @inheritdoc
     */     public function behaviors(){
      return [
        BlameableBehavior::className(),
        TimestampBehavior::className()
      ];
    }
    public static function tableName()
    {
        return 'passport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['familytree_idfamilytree'], 'required'],
            [['familytree_idfamilytree', 'statePOA', 'districtPOA', 'townshipPOA', 'stateSOA', 'districtSOA', 'townshipSOA', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['passportIssueDate', 'dateDeliveredPassport'], 'safe'],
            [['otherName', 'identificationMark', 'presentOccupationAddress', 'spouseOccupation', 'spouseOccupationAddress', 'subjectTravelled', 'countryApplied', 'departmentTransferred', 'departmentTransferredCurrent', 'detailOfSiblingsApplicant', 'detailOfSpouseApplicant', 'detailOfSiblingsFather', 'detailOfSiblingsMother', 'detailOfChildrenApplicant', 'detailOfSiblingsSpouse', 'placeDeliveredPassport'], 'string', 'max' => 255],
            [['sex', 'presentOccupation', 'educationalQual', 'citizenshipSecCardNo', 'height', 'eye', 'hair', 'spouseName', 'passportNo'], 'string', 'max' => 45],
            [['familytree_idfamilytree'], 'exist', 'skipOnError' => true, 'targetClass' => Familytree::className(), 'targetAttribute' => ['familytree_idfamilytree' => 'idfamilytree']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpassport' => 'Idpassport',
            'familytree_idfamilytree' => 'Familytree Idfamilytree',
            'otherName' => 'Other Name',
            'identificationMark' => 'Identification Mark',
            'sex' => 'Genger',
            'presentOccupation' => 'Present Occupation',
            'presentOccupationAddress' => 'Present Occupation Address',
            'statePOA' => 'State Poa',
            'districtPOA' => 'District Poa',
            'townshipPOA' => 'Township Poa',
            'educationalQual' => 'Educational Qual',
            'citizenshipSecCardNo' => 'Citizenship Sec Card No',
            'height' => 'Height',
            'eye' => 'Eye color',
            'hair' => 'Hair color',
            'spouseName' => 'Spouse Name',
            'spouseOccupation' => 'Spouse Occupation',
            'spouseOccupationAddress' => 'Spouse Occupation Address',
            'stateSOA' => 'State Soa',
            'districtSOA' => 'District Soa',
            'townshipSOA' => 'Township Soa',
            'subjectTravelled' => 'Subject Travelled',
            'countryApplied' => 'Country Applied',
            'departmentTransferred' => 'Department Transferred',
            'departmentTransferredCurrent' => 'Department Transferred Current',
            'detailOfSiblingsApplicant' => 'Detail Of Siblings Applicant',
            'detailOfSpouseApplicant' => 'Detail Of Spouse Applicant',
            'detailOfChildrenApplicant' => 'Detail Of Children Applicant',
            'detailOfSiblingsFather' => 'Detail Of Siblings Father',
            'detailOfSiblingsMother' => 'Detail Of Siblings Mother',
            'detailOfSiblingsSpouse' => 'Detail Of Siblings Spouse',
            'passportNo' => 'Passport No',
            'passportIssueDate' => 'Passport Issue Date',
            'placeDeliveredPassport' => 'Place Delivered Passport',
            'dateDeliveredPassport' => 'Date Delivered Passport',
                 'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriminalcivillaws()
    {
        return $this->hasMany(Criminalcivillaw::className(), ['passport_idpassport' => 'idpassport']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilytreeIdfamilytree()
    {
        return $this->hasOne(Familytree::className(), ['idfamilytree' => 'familytree_idfamilytree']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudieds()
    {
        return $this->hasMany(Studied::className(), ['passport_idpassport' => 'idpassport']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWhetheraboards()
    {
        return $this->hasMany(Whetheraboard::className(), ['passport_idpassport' => 'idpassport']);
    }
}
