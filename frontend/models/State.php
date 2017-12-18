<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property integer $stateId
 * @property string $stateNameEN
 * @property string $stateNameMM
 * @property integer $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property District[] $districts
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stateNameEN'], 'required'],
            [['status'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['stateNameEN', 'stateNameMM'], 'string', 'max' => 255],
            [['stateNameEN'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stateId' => 'State ID',
            'stateNameEN' => 'State Name En',
            'stateNameMM' => 'State Name Mm',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['stateId' => 'stateId']);
    }
}
