<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provincethai".
 *
 * @property integer $id
 * @property string $code
 * @property string $name_th
 * @property string $name_en
 * @property integer $regionthai_id
 *
 * @property Districtthai[] $districtthais
 * @property Regionthai $regionthai
 * @property Visa[] $visas
 */
class Provincethai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provincethai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'name_th', 'name_en'], 'required'],
            [['id', 'regionthai_id'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name_th'], 'string', 'max' => 150],
            [['name_en'], 'string', 'max' => 45],
            [['regionthai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regionthai::className(), 'targetAttribute' => ['regionthai_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name_th' => 'Name Th',
            'name_en' => 'Name En',
            'regionthai_id' => 'Regionthai ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrictthais()
    {
        return $this->hasMany(Districtthai::className(), ['provincethai_id' => 'id']);
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
    public function getVisas()
    {
        return $this->hasMany(Visa::className(), ['provincethai_id' => 'id']);
    }
}
