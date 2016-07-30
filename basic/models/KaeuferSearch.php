<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kaeufer;

/**
 * KaeuferSearch represents the model behind the search form about `app\models\Kaeufer`.
 */
class KaeuferSearch extends Kaeufer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'auflassung', 'anrede', 'anrede2'], 'integer'],
            [['debitor_nr', 'beurkundung_am', 'verbindliche_fertigstellung', 'uebergang_bnl', 'abnahme_se', 'abnahme_ge', 'titel', 'vorname', 'nachname', 'strasse', 'hausnr', 'plz', 'ort', 'festnetz', 'handy', 'email', 'titel2', 'vorname2', 'nachname2'], 'safe'],
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
        $query = Kaeufer::find();

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
            'beurkundung_am' => $this->beurkundung_am,
            'verbindliche_fertigstellung' => $this->verbindliche_fertigstellung,
            'uebergang_bnl' => $this->uebergang_bnl,
            'abnahme_se' => $this->abnahme_se,
            'abnahme_ge' => $this->abnahme_ge,
            'auflassung' => $this->auflassung,
            'anrede' => $this->anrede,
            'anrede2' => $this->anrede2,
        ]);

        $query->andFilterWhere(['like', 'debitor_nr', $this->debitor_nr])
            ->andFilterWhere(['like', 'titel', $this->titel])
            ->andFilterWhere(['like', 'vorname', $this->vorname])
            ->andFilterWhere(['like', 'nachname', $this->nachname])
            ->andFilterWhere(['like', 'strasse', $this->strasse])
            ->andFilterWhere(['like', 'hausnr', $this->hausnr])
            ->andFilterWhere(['like', 'plz', $this->plz])
            ->andFilterWhere(['like', 'ort', $this->ort])
            ->andFilterWhere(['like', 'festnetz', $this->festnetz])
            ->andFilterWhere(['like', 'handy', $this->handy])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'titel2', $this->titel2])
            ->andFilterWhere(['like', 'vorname2', $this->vorname2])
            ->andFilterWhere(['like', 'nachname2', $this->nachname2]);

        return $dataProvider;
    }
}
