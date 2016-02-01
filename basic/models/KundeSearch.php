<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kunde;

/**
 * KundeSearch represents the model behind the search form about `app\models\Kunde`.
 */
class KundeSearch extends Kunde
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'anrede'], 'integer'],
            [['debitor_nr', 'titel', 'vorname', 'nachname', 'email', 'strasse', 'hausnr', 'plz', 'ort', 'festnetz', 'handy'], 'safe'],
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
        $query = Kunde::find();

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
            'anrede' => $this->anrede,
        ]);

        $query->andFilterWhere(['like', 'debitor_nr', $this->debitor_nr])
            ->andFilterWhere(['like', 'titel', $this->titel])
            ->andFilterWhere(['like', 'vorname', $this->vorname])
            ->andFilterWhere(['like', 'nachname', $this->nachname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'strasse', $this->strasse])
            ->andFilterWhere(['like', 'hausnr', $this->hausnr])
            ->andFilterWhere(['like', 'plz', $this->plz])
            ->andFilterWhere(['like', 'ort', $this->ort])
            ->andFilterWhere(['like', 'festnetz', $this->festnetz])
            ->andFilterWhere(['like', 'handy', $this->handy]);

        return $dataProvider;
    }
}
