<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ApplicationReviewer;

/**
 * ReviewerApplicationSearch represents the model behind the search form of `frontend\models\ApplicationReviewer`.
 */
class ReviewerApplicationSearch extends ApplicationReviewer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'application_id', 'reviewer_id'], 'integer'],
            [['review_file', 'review_note', 'created_at', 'review_at'], 'safe'],
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
        $query = ApplicationReviewer::find()
        ->where(['reviewer_id' => Yii::$app->user->identity->id]);

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
            'reviewer_id' => $this->reviewer_id,
            'created_at' => $this->created_at,
            'review_at' => $this->review_at,
        ]);

        $query->andFilterWhere(['like', 'review_file', $this->review_file])
            ->andFilterWhere(['like', 'review_note', $this->review_note]);

        return $dataProvider;
    }
}
