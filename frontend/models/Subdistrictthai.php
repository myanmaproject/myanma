<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subdistrictthai".
 *
 * @property integer $id
 * @property string $zipcode
 * @property string $nameth
 * @property integer $districtthai_id
 * @property string $nameen
 *
 * @property Districtthai $districtthai
 * @property Visa[] $visas
 */
class Subdistrictthai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subdistrictthai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'zipcode', 'nameth', 'nameen'], 'required'],
            [['id', 'districtthai_id'], 'integer'],
            [['zipcode'], 'string', 'max' => 6],
            [['nameth'], 'string', 'max' => 150],
            [['nameen'], 'string', 'max' => 45],
            [['districtthai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districtthai::className(), 'targetAttribute' => ['districtthai_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zipcode' => 'Zipcode',
            'nameth' => 'Nameth',
            'districtthai_id' => 'Districtthai ID',
            'nameen' => 'Nameen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrictthai()
    {
        return $this->hasOne(Districtthai::className(), ['id' => 'districtthai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisas()
    {
        return $this->hasMany(Visa::className(), ['subdistrictthai_id' => 'id']);
    }
}
