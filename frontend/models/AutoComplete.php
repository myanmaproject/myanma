<?php
namespace frontend\models;

class AutoComplete extends \yii\base\Model
{
	public $id;
	public $name;
	
	public function rules()
	{
		return [
			[['id', 'name'], 'required']
		];
	}
	
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'name',
		];
	}
}