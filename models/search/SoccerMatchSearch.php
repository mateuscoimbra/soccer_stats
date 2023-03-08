<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SoccerMatch;

/**
 * SoccerMatchSearch represents the model behind the search form of `app\models\SoccerMatch`.
 */
class SoccerMatchSearch extends SoccerMatch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'club_one_id', 'club_two_id', 'stadium_id', 'league_competition_id', 'created_by', 'updated_by'], 'integer'],
            [['club_field_command', 'start_time', 'end_time', 'result', 'created_at', 'updated_at'], 'safe'],
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
        $query = SoccerMatch::find();

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
            'club_one_id' => $this->club_one_id,
            'club_two_id' => $this->club_two_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'stadium_id' => $this->stadium_id,
            'league_competition_id' => $this->league_competition_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'club_field_command', $this->club_field_command])
            ->andFilterWhere(['like', 'result', $this->result]);

        return $dataProvider;
    }
}
