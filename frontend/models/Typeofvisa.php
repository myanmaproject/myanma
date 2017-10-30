<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "typeofvisa".
 *
 * @property integer $idtypeOfVisa
 * @property string $name
 */
class Typeofvisa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typeofvisa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtypeOfVisa' => 'Idtype Of Visa',
            'name' => 'Name',
        ];
    }
}
