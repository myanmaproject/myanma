<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "placeofbirth".
 *
 * @property integer $idplaceofbirth
 * @property integer $state
 * @property integer $district
 * @property integer $township
 * @property integer $familytree_idfamilytree
 *
 * @property Familytree $familytreeIdfamilytree
 */
class Placeofbirth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'placeofbirth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'district', 'township', 'familytree_idfamilytree'], 'integer'],
            [['familytree_idfamilytree'], 'required'],
            [['familytree_idfamilytree'], 'exist', 'skipOnError' => true, 'targetClass' => Familytree::className(), 'targetAttribute' => ['familytree_idfamilytree' => 'idfamilytree']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idplaceofbirth' => 'Idplaceofbirth',
            'state' => 'State',
            'district' => 'District',
            'township' => 'Township',
            'familytree_idfamilytree' => 'Familytree Idfamilytree',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilytreeIdfamilytree()
    {
        return $this->hasOne(Familytree::className(), ['idfamilytree' => 'familytree_idfamilytree']);
    }
}
