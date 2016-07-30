<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Teileigentumseinheit;

/**
 * TeileigentumseinheitSearch represents the model behind the search form about `app\models\Teileigentumseinheit`.
 */
class TeileigentumseinheitSearch extends Teileigentumseinheit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'haus_id', 'einheitstyp_id', 'gefoerdert'], 'integer'],
            [['te_nummer', 'geschoss', 'zimmer', 'me_anteil', 'wohnflaeche'], 'safe'],
            [['kaufpreis', 'kp_einheit'], 'number'],
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
        $query = Teileigentumseinheit::find();

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
            'haus_id' => $this->haus_id,
            'einheitstyp_id' => $this->einheitstyp_id,
            'gefoerdert' => $this->gefoerdert,
            'kaufpreis' => $this->kaufpreis,
            'kp_einheit' => $this->kp_einheit,
        ]);

        $query->andFilterWhere(['like', 'te_nummer', $this->te_nummer])
            ->andFilterWhere(['like', 'geschoss', $this->geschoss])
            ->andFilterWhere(['like', 'zimmer', $this->zimmer])
            ->andFilterWhere(['like', 'me_anteil', $this->me_anteil])
            ->andFilterWhere(['like', 'wohnflaeche', $this->wohnflaeche]);

        return $dataProvider;
    }
}
