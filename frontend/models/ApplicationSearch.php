<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Application;

/**
 * ApplicationSearch represents the model behind the search form of `backend\models\Application`.
 */
class ApplicationSearch extends Application
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category', 'ic_number', 'gender', 'age'], 'integer'],
            [['applicant_name', 'nationality', 'phoneNo', 'officeNo', 'faxNo', 'email', 'instiBusName', 'type', 'address', 'logo_file'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Application::find();

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
            'id' => $this->id,
            'category' => $this->category,
            'ic_number' => $this->ic_number,
            'gender' => $this->gender,
            'age' => $this->age,
        ]);

        $query->andFilterWhere(['like', 'applicant_name', $this->applicant_name])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'phoneNo', $this->phoneNo])
            ->andFilterWhere(['like', 'officeNo', $this->officeNo])
            ->andFilterWhere(['like', 'faxNo', $this->faxNo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'instiBusName', $this->instiBusName])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'logo_file', $this->logo_file]);

        return $dataProvider;
    }
}
