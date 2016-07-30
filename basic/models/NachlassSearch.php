<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nachlass;

/**
 * NachlassSearch represents the model behind the search form about `app\models\Nachlass`.
 */
class NachlassSearch extends Nachlass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'datenblatt_id'], 'integer'],
            [['schreiben_vom', 'bemerkung'], 'safe'],
            [['betrag'], 'number'],
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
        $query = Nachlass::find();

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
            'schreiben_vom' => $this->schreiben_vom,
            'betrag' => $this->betrag,
        ]);

        $query->andFilterWhere(['like', 'bemerkung', $this->bemerkung]);

        return $dataProvider;
    }
}
