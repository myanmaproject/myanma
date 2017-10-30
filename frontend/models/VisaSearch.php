<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\visa;

/**
 * visaSearch represents the model behind the search form about `app\models\visa`.
 */
class visaSearch extends visa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idvisa', 'numberRequested', 'created_at', 'created_by', 'updated_at', 'updated_by', 'familytree_idfamilytree'], 'integer'],
            [['prefix', 'typeOfVisaRequest', 'firstName', 'middleName', 'familyName', 'nationalityBirth', 'maritalStatus', 'TypeTravelDocument', 'noPerson', 'issuedAt', 'dateIssue', 'expiryDate', 'currentAddress', 'telPerson', 'email', 'permanentAddress', 'telPermanent', 'minorChildren', 'dateOfArrival', 'traveling', 'flightNo', 'durationOfProposedStay', 'dateOfPrevious', 'countriesForTravel', 'proposedAddressThai', 'nameAddressLocal', 'telThai', 'applicationNoOfficial', 'visaNoOfficial', 'typeOfVisaOfficial', 'categoryOfEntries', 'numberOfEntriesOfficial', 'dateOfIssueOfficial', 'feeOfficial', 'expOfficial', 'documentsOfficial', 'picture', 'purposeOfVisit'], 'safe'],
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
        $query = visa::find();

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
            'idvisa' => $this->idvisa,
            'numberRequested' => $this->numberRequested,
            'dateIssue' => $this->dateIssue,
            'expiryDate' => $this->expiryDate,
            'dateOfArrival' => $this->dateOfArrival,
            'dateOfPrevious' => $this->dateOfPrevious,
            'dateOfIssueOfficial' => $this->dateOfIssueOfficial,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'familytree_idfamilytree' => $this->familytree_idfamilytree,
        ]);

        $query->andFilterWhere(['like', 'prefix', $this->prefix])
            ->andFilterWhere(['like', 'typeOfVisaRequest', $this->typeOfVisaRequest])
            ->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'middleName', $this->middleName])
            ->andFilterWhere(['like', 'familyName', $this->familyName])
            ->andFilterWhere(['like', 'nationalityBirth', $this->nationalityBirth])
            ->andFilterWhere(['like', 'maritalStatus', $this->maritalStatus])
            ->andFilterWhere(['like', 'TypeTravelDocument', $this->TypeTravelDocument])
            ->andFilterWhere(['like', 'noPerson', $this->noPerson])
            ->andFilterWhere(['like', 'issuedAt', $this->issuedAt])
            ->andFilterWhere(['like', 'currentAddress', $this->currentAddress])
            ->andFilterWhere(['like', 'telPerson', $this->telPerson])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'permanentAddress', $this->permanentAddress])
            ->andFilterWhere(['like', 'telPermanent', $this->telPermanent])
            ->andFilterWhere(['like', 'minorChildren', $this->minorChildren])
            ->andFilterWhere(['like', 'traveling', $this->traveling])
            ->andFilterWhere(['like', 'flightNo', $this->flightNo])
            ->andFilterWhere(['like', 'durationOfProposedStay', $this->durationOfProposedStay])
            ->andFilterWhere(['like', 'countriesForTravel', $this->countriesForTravel])
            ->andFilterWhere(['like', 'proposedAddressThai', $this->proposedAddressThai])
            ->andFilterWhere(['like', 'nameAddressLocal', $this->nameAddressLocal])
            ->andFilterWhere(['like', 'telThai', $this->telThai])
            ->andFilterWhere(['like', 'applicationNoOfficial', $this->applicationNoOfficial])
            ->andFilterWhere(['like', 'visaNoOfficial', $this->visaNoOfficial])
            ->andFilterWhere(['like', 'typeOfVisaOfficial', $this->typeOfVisaOfficial])
            ->andFilterWhere(['like', 'categoryOfEntries', $this->categoryOfEntries])
            ->andFilterWhere(['like', 'numberOfEntriesOfficial', $this->numberOfEntriesOfficial])
            ->andFilterWhere(['like', 'feeOfficial', $this->feeOfficial])
            ->andFilterWhere(['like', 'expOfficial', $this->expOfficial])
            ->andFilterWhere(['like', 'documentsOfficial', $this->documentsOfficial])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'purposeOfVisit', $this->purposeOfVisit]);

        return $dataProvider;
    }
}
