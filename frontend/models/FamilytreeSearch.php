<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Familytree;

/**
 * FamilytreeSearch represents the model behind the search form about `app\models\Familytree`.
 */
class FamilytreeSearch extends Familytree
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfamilytree'], 'integer'],
            [['name', 'dateOfBirth', 'placeOfBirth', 'raceNationality', 'nrc', 'region', 'occupation', 'aliveOrDeath', 'address', 'father', 'mother'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Familytree::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idfamilytree' => $this->idfamilytree,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'dateOfBirth', $this->dateOfBirth])
            ->andFilterWhere(['like', 'placeOfBirth', $this->placeOfBirth])
            ->andFilterWhere(['like', 'raceNationality', $this->raceNationality])
            ->andFilterWhere(['like', 'nrc', $this->nrc])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'aliveOrDeath', $this->aliveOrDeath])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'father', $this->father])
            ->andFilterWhere(['like', 'mother', $this->mother]);

        return $dataProvider;
    }
}
