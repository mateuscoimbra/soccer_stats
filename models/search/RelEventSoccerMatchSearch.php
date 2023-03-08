<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RelEventSoccerMatch;

/**
 * RelEventSoccerMatchSearch represents the model behind the search form of `app\models\RelEventSoccerMatch`.
 */
class RelEventSoccerMatchSearch extends RelEventSoccerMatch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'soccer_match_id', 'player_one_id', 'player_two_id', 'club_player_one_id', 'club_player_two_id', 'event_type_one_id', 'event_type_two_id', 'created_by', 'updated_by'], 'integer'],
            [['type_time', 'event_time_exactly', 'event_time_start', 'event_time_end', 'created_at', 'updated_at'], 'safe'],
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
        $query = RelEventSoccerMatch::find();

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
            'soccer_match_id' => $this->soccer_match_id,
            'player_one_id' => $this->player_one_id,
            'player_two_id' => $this->player_two_id,
            'club_player_one_id' => $this->club_player_one_id,
            'club_player_two_id' => $this->club_player_two_id,
            'event_type_one_id' => $this->event_type_one_id,
            'event_type_two_id' => $this->event_type_two_id,
            'event_time_exactly' => $this->event_time_exactly,
            'event_time_start' => $this->event_time_start,
            'event_time_end' => $this->event_time_end,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'type_time', $this->type_time]);

        return $dataProvider;
    }
}
