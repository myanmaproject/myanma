<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "township".
 *
 * @property integer $townshipId
 * @property string $townshipNameEN
 * @property string $townshipNameMM
 * @property integer $status
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $districtId
 *
 * @property District $district
 */
class Township extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'township';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['townshipNameEN', 'townshipNameMM', 'status', 'districtId'], 'required'],
            [['status', 'districtId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['townshipNameEN', 'townshipNameMM'], 'string', 'max' => 255],
            [['townshipNameEN'], 'unique'],
            [['townshipNameMM'], 'unique'],
            [['districtId'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['districtId' => 'districtId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'townshipId' => 'Township ID',
            'townshipNameEN' => 'Township Name En',
            'townshipNameMM' => 'Township Name Mm',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'districtId' => 'District ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['districtId' => 'districtId']);
    }
}
