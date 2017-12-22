<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regionthai".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Provincethai[] $provincethais
 * @property Visa[] $visas
 */
class Regionthai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regionthai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincethais()
    {
        return $this->hasMany(Provincethai::className(), ['regionthai_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisas()
    {
        return $this->hasMany(Visa::className(), ['regionthai_id' => 'id']);
    }
}
