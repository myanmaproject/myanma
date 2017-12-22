<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "districtthai".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $provincethai_id
 *
 * @property Provincethai $provincethai
 * @property Subdistrictthai[] $subdistrictthais
 * @property Visa[] $visas
 */
class Districtthai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'districtthai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'name'], 'required'],
            [['id', 'provincethai_id'], 'integer'],
            [['code'], 'string', 'max' => 4],
            [['name'], 'string', 'max' => 150],
            [['provincethai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provincethai::className(), 'targetAttribute' => ['provincethai_id' => 'id']],
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
            'name' => 'Name',
            'provincethai_id' => 'Provincethai ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincethai()
    {
        return $this->hasOne(Provincethai::className(), ['id' => 'provincethai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistrictthais()
    {
        return $this->hasMany(Subdistrictthai::className(), ['districtthai_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisas()
    {
        return $this->hasMany(Visa::className(), ['districtthai_id' => 'id']);
    }
}
