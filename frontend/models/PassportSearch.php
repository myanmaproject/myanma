<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Passport;

/**
 * PassportSearch represents the model behind the search form about `app\models\Passport`.
 */
class PassportSearch extends Passport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpassport', 'familytree_idfamilytree'], 'integer'],
            [['otherName', 'identificationMark', 'sex', 'presentOccupation', 'presentOccupationAddress', 'educationalQual', 'citizenshipSecCardNo', 'height', 'eye', 'hair', 'spouseName', 'spouseOccupation', 'spouseOccupationAddress', 'subjectTravelled', 'countryApplied', 'departmentTransferred', 'departmentTransferredCurrent', 'detailOfSiblingsApplicant', 'detailOfSpouseApplicant', 'detailOfChildrenApplicant', 'detailOfSiblingsFather', 'detailOfSiblingsMother', 'detailOfSiblingsSpouse', 'passportNo', 'passportIssueDate', 'placeDeliveredPassport', 'dateDeliveredPassport'], 'safe'],
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
        $query = Passport::find();

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
            'idpassport' => $this->idpassport,
            'familytree_idfamilytree' => $this->familytree_idfamilytree,
            'passportIssueDate' => $this->passportIssueDate,
            'dateDeliveredPassport' => $this->dateDeliveredPassport,
        ]);

        $query->andFilterWhere(['like', 'otherName', $this->otherName])
            ->andFilterWhere(['like', 'identificationMark', $this->identificationMark])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'presentOccupation', $this->presentOccupation])
            ->andFilterWhere(['like', 'presentOccupationAddress', $this->presentOccupationAddress])
            ->andFilterWhere(['like', 'educationalQual', $this->educationalQual])
            ->andFilterWhere(['like', 'citizenshipSecCardNo', $this->citizenshipSecCardNo])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'eye', $this->eye])
            ->andFilterWhere(['like', 'hair', $this->hair])
            ->andFilterWhere(['like', 'spouseName', $this->spouseName])
            ->andFilterWhere(['like', 'spouseOccupation', $this->spouseOccupation])
            ->andFilterWhere(['like', 'spouseOccupationAddress', $this->spouseOccupationAddress])
            ->andFilterWhere(['like', 'subjectTravelled', $this->subjectTravelled])
            ->andFilterWhere(['like', 'countryApplied', $this->countryApplied])
            ->andFilterWhere(['like', 'departmentTransferred', $this->departmentTransferred])
            ->andFilterWhere(['like', 'departmentTransferredCurrent', $this->departmentTransferredCurrent])
            ->andFilterWhere(['like', 'detailOfSiblingsApplicant', $this->detailOfSiblingsApplicant])
            ->andFilterWhere(['like', 'detailOfSpouseApplicant', $this->detailOfSpouseApplicant])
            ->andFilterWhere(['like', 'detailOfChildrenApplicant', $this->detailOfChildrenApplicant])
            ->andFilterWhere(['like', 'detailOfSiblingsFather', $this->detailOfSiblingsFather])
            ->andFilterWhere(['like', 'detailOfSiblingsMother', $this->detailOfSiblingsMother])
            ->andFilterWhere(['like', 'detailOfSiblingsSpouse', $this->detailOfSiblingsSpouse])
            ->andFilterWhere(['like', 'passportNo', $this->passportNo])
            ->andFilterWhere(['like', 'placeDeliveredPassport', $this->placeDeliveredPassport]);

        return $dataProvider;
    }
}
