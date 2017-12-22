<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "visa".
 *
 * @property integer $idvisa
 * @property string $prefix
 * @property integer $numberRequested
 * @property string $typeOfVisaRequest
 * @property string $firstName
 * @property string $middleName
 * @property string $familyName
 * @property string $nationalityBirth
 * @property string $maritalStatus
 * @property string $TypeTravelDocument
 * @property string $noPerson
 * @property string $issuedAt
 * @property string $dateIssue
 * @property string $expiryDate
 * @property string $currentAddress
 * @property string $telPerson
 * @property string $email
 * @property string $permanentAddress
 * @property string $telPermanent
 * @property string $minorChildren
 * @property string $dateOfArrival
 * @property string $traveling
 * @property string $flightNo
 * @property string $durationOfProposedStay
 * @property string $dateOfPrevious
 * @property string $countriesForTravel
 * @property string $proposedAddressThai
 * @property string $nameAddressLocal
 * @property string $telThai
 * @property string $applicationNoOfficial
 * @property string $visaNoOfficial
 * @property string $typeOfVisaOfficial
 * @property string $categoryOfEntries
 * @property string $numberOfEntriesOfficial
 * @property string $dateOfIssueOfficial
 * @property string $feeOfficial
 * @property string $expOfficial
 * @property string $documentsOfficial
 * @property string $picture
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $familytree_idfamilytree
 * @property string $purposeOfVisit
 *
 * @property Basicdocuments[] $basicdocuments
 * @property Documentapplicant[] $documentapplicants
 * @property Documentfirsttime[] $documentfirsttimes
 * @property Documenttouristvisa[] $documenttouristvisas
 * @property Transitvisathailand[] $transitvisathailands
 * @property Familytree $familytreeIdfamilytree
 */
class Visa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $basic;
    public $applicant;
    public $firsttime;
    public $touristvisa;
    public $transitvisa;

 public $visa_img;

 public function behaviors(){
      return [
        BlameableBehavior::className(),
        TimestampBehavior::className()
      ];
    }

    public static function tableName()
    {
        return 'visa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numberRequested', 'created_at', 'created_by', 'updated_at', 'updated_by', 'familytree_idfamilytree'], 'integer'],
            [['familytree_idfamilytree'], 'required'],
            [['prefix', 'middleName', 'familyName', 'typeOfVisaOfficial', 'categoryOfEntries', 'purposeOfVisit','telGuarantor'], 'string', 'max' => 45],
            [['typeOfVisaRequest', 'firstName', 'nationalityBirth', 'maritalStatus', 'TypeTravelDocument', 'noPerson', 'issuedAt', 'dateIssue', 'expiryDate', 'currentAddress', 'telPerson', 'email', 'permanentAddress', 'telPermanent', 'minorChildren', 'dateOfArrival', 'traveling', 'flightNo', 'durationOfProposedStay', 'dateOfPrevious', 'countriesForTravel', 'proposedAddressThai', 'nameAddressLocal', 'telThai', 'applicationNoOfficial', 'visaNoOfficial', 'numberOfEntriesOfficial', 'dateOfIssueOfficial', 'feeOfficial', 'expOfficial', 'documentsOfficial', 'picture','nameaddressGuarantor'], 'string', 'max' => 255],
            [['familytree_idfamilytree'], 'exist', 'skipOnError' => true, 'targetClass' => Familytree::className(), 'targetAttribute' => ['familytree_idfamilytree' => 'idfamilytree']],
                        [['visa_img'],'file','skipOnEmpty' => true, 'on' => 'update','extensions'=> 'jpg,png,gif'],
            [['districtthai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districtthai::className(), 'targetAttribute' => ['districtthai_id' => 'id']],
 [['provincethai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provincethai::className(), 'targetAttribute' => ['provincethai_id' => 'id']],
            [['regionthai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regionthai::className(), 'targetAttribute' => ['regionthai_id' => 'id']],
            [['subdistrictthai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subdistrictthai::className(), 'targetAttribute' => ['subdistrictthai_id' => 'id']],
       

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idvisa' => 'Idvisa',
            'prefix' => 'Prefix',
            'numberRequested' => 'Number Requested',
            'typeOfVisaRequest' => 'Type Of Visa Request',
            'firstName' => 'First Name',
            'middleName' => 'Middle Name',
            'familyName' => 'Family Name',
            'nationalityBirth' => 'Nationality Birth',
            'maritalStatus' => 'Marital Status',
            'TypeTravelDocument' => 'Type Travel Document',
            'noPerson' => 'No Person',
            'issuedAt' => 'Issued At',
            'dateIssue' => 'Date Issue',
            'expiryDate' => 'Expiry Date',
            'currentAddress' => 'Current Address',
            'telPerson' => 'Tel Person',
            'email' => 'Email',
            'permanentAddress' => 'Permanent Address',
            'telPermanent' => 'Tel Permanent',
            'minorChildren' => 'Minor Children',
            'dateOfArrival' => 'Date Of Arrival',
            'traveling' => 'Traveling',
            'flightNo' => 'Flight No',
            'durationOfProposedStay' => 'Duration Of Proposed Stay',
            'dateOfPrevious' => 'Date Of Previous',
            'countriesForTravel' => 'Countries For Travel',
            'proposedAddressThai' => 'Proposed Address Thai',
            'nameAddressLocal' => 'Name Address Local',
            'telThai' => 'Tel Thai',
            'applicationNoOfficial' => 'Application No Official',
            'visaNoOfficial' => 'Visa No Official',
            'typeOfVisaOfficial' => 'Type Of Visa Official',
            'categoryOfEntries' => 'Category Of Entries',
            'numberOfEntriesOfficial' => 'Number Of Entries Official',
            'dateOfIssueOfficial' => 'Date Of Issue Official',
            'feeOfficial' => 'Fee Official',
            'expOfficial' => 'Exp Official',
            'documentsOfficial' => 'Documents Official',
            'picture' => 'Picture',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'familytree_idfamilytree' => 'Familytree Idfamilytree',
            'purposeOfVisit' => 'Purpose Of Visit',
             'nameaddressGuarantor' => 'Nameaddress Guarantor', 
           'telGuarantor' => 'Tel Guarantor',
             'visa_img' => 'img' ,
                        'regionthai_id' => 'Regionthai ID',
            'provincethai_id' => 'Provincethai ID',
            'districtthai_id' => 'Districtthai ID',
            'subdistrictthai_id' => 'Subdistrictthai ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasicdocuments()
    {
        return $this->hasMany(Basicdocuments::className(), ['visa_idvisa' => 'idvisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentapplicants()
    {
        return $this->hasMany(Documentapplicant::className(), ['visa_idvisa' => 'idvisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentfirsttimes()
    {
        return $this->hasMany(Documentfirsttime::className(), ['visa_idvisa' => 'idvisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumenttouristvisas()
    {
        return $this->hasMany(Documenttouristvisa::className(), ['visa_idvisa' => 'idvisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitvisathailands()
    {
        return $this->hasMany(Transitvisathailand::className(), ['visa_idvisa' => 'idvisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilytreeIdfamilytree()
    {
        return $this->hasOne(Familytree::className(), ['idfamilytree' => 'familytree_idfamilytree']);
    }


      public function getDistrictthai()
    {
        return $this->hasOne(Districtthai::className(), ['id' => 'districtthai_id']);
    }
     public function getProvincethai()
    {
        return $this->hasOne(Provincethai::className(), ['id' => 'provincethai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionthai()
    {
        return $this->hasOne(Regionthai::className(), ['id' => 'regionthai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistrictthai()
    {
        return $this->hasOne(Subdistrictthai::className(), ['id' => 'subdistrictthai_id']);
    }
}
