<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Abschlag;

/**
 * AbschlagSearch represents the model behind the search form about `app\models\Abschlag`.
 */
class AbschlagSearch extends Abschlag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'datenblatt_id'], 'integer'],
            [['name', 'kaufvertrag_betrag', 'kaufvertrag_angefordert', 'sonderwunsch_betrag', 'sonderwunsch_angefordert', 'summe'], 'safe'],
            [['kaufvertrag_prozent', 'sonderwunsch_prozent'], 'number'],
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
        $query = Abschlag::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'datenblatt_id' => $this->datenblatt_id,
            'kaufvertrag_prozent' => $this->kaufvertrag_prozent,
            'kaufvertrag_angefordert' => $this->kaufvertrag_angefordert,
            'sonderwunsch_prozent' => $this->sonderwunsch_prozent,
            'sonderwunsch_angefordert' => $this->sonderwunsch_angefordert,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'kaufvertrag_betrag', $this->kaufvertrag_betrag])
            ->andFilterWhere(['like', 'sonderwunsch_betrag', $this->sonderwunsch_betrag])
            ->andFilterWhere(['like', 'summe', $this->summe]);

        return $dataProvider;
    }
}
