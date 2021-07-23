<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ApplicationJudge;

/**
 * JudgeApplicationSearch represents the model behind the search form of `frontend\models\ApplicationJudge`.
 */
class JudgeApplicationSearch extends ApplicationJudge
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'application_id', 'judge_id'], 'integer'],
            [['judge_note', 'judge_file', 'created_at', 'judge_at'], 'safe'],
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
        $query = ApplicationJudge::find()
        ->where(['judge_id' => Yii::$app->user->identity->id]);

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
            'application_id' => $this->application_id,
            'judge_id' => $this->judge_id,
            'created_at' => $this->created_at,
            'judge_at' => $this->judge_at,
        ]);

        $query->andFilterWhere(['like', 'judge_note', $this->judge_note])
            ->andFilterWhere(['like', 'judge_file', $this->judge_file]);

        return $dataProvider;
    }
}
