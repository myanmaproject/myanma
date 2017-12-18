<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $districtId
 * @property string $districtNameEN
 * @property string $districtNameMM
 * @property integer $status
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $stateId
 *
 * @property State $state
 * @property Township[] $townships
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['districtNameEN', 'districtNameMM', 'stateId'], 'required'],
            [['status', 'stateId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['districtNameEN', 'districtNameMM'], 'string', 'max' => 255],
            [['districtNameEN'], 'unique'],
            [['districtNameMM'], 'unique'],
            [['stateId'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['stateId' => 'stateId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'districtId' => 'District ID',
            'districtNameEN' => 'District Name En',
            'districtNameMM' => 'District Name Mm',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'stateId' => 'State ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['stateId' => 'stateId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTownships()
    {
        return $this->hasMany(Township::className(), ['districtId' => 'districtId']);
    }
}
