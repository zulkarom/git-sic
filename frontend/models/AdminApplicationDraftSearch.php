<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Application;

/**
 * AdminApplicationSearch represents the model behind the search form of `frontend\models\Application`.
 */
class AdminApplicationDraftSearch extends Application
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'category', 'gender', 'age', 'medium_web', 'medium_email', 'medium_others', 'aggrement_disclaimer', 'status'], 'integer'],
            [['applicant_name', 'nationality', 'id_number', 'phoneNo', 'officeNo', 'faxNo', 'email', 'instiBusName', 'type', 'address', 'logo_file', 'project_name', 'project_description', 'reference', 'created_at', 'updated_at'], 'safe'],
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
        $query = Application::find()->where(['=', 'status', 0]);

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
            'user_id' => $this->user_id,
            'category' => $this->category,
            'gender' => $this->gender,
            'age' => $this->age,
            'medium_web' => $this->medium_web,
            'medium_email' => $this->medium_email,
            'medium_others' => $this->medium_others,
            'aggrement_disclaimer' => $this->aggrement_disclaimer,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'applicant_name', $this->applicant_name])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'id_number', $this->id_number])
            ->andFilterWhere(['like', 'phoneNo', $this->phoneNo])
            ->andFilterWhere(['like', 'officeNo', $this->officeNo])
            ->andFilterWhere(['like', 'faxNo', $this->faxNo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'instiBusName', $this->instiBusName])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'logo_file', $this->logo_file])
            ->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'project_description', $this->project_description])
            ->andFilterWhere(['like', 'reference', $this->reference]);

        return $dataProvider;
    }
}
