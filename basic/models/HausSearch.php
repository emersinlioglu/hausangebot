<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Haus;

/**
 * HausSearch represents the model behind the search form about `app\models\Haus`.
 */
class HausSearch extends Haus
{
    public $projekt;
    public $projekt_name;
    public $firma_name;
    public $firma_nr;
    public $onlyNotAssigned = false;
    public $te_nummer;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'projekt_id', 'reserviert', 'verkauft', 'rechnung_vertrieb'], 'integer'],
            [['plz', 'ort', 'strasse', 'hausnr', 'te_nummer'], 'safe'],
            [['projekt_name','firma_name','firma_nr', 'onlyNotAssigned'], 'safe'],
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
        $query = Haus::find();
        $query->joinWith(['projekt','projekt.firma', 'datenblatts', 'teileigentumseinheits']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['projekt_name'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['projekt.name' => SORT_ASC],
        'desc' => ['projekt.name' => SORT_DESC],
        ];
        
          $dataProvider->sort->attributes['firma_name'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['firma.name' => SORT_ASC],
        'desc' => ['firma.name' => SORT_DESC],
        ];

          $dataProvider->sort->attributes['firma_nr'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['firma.nr' => SORT_ASC],
        'desc' => ['firma.nr' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['te_nummer'] = [
            'asc' => ['teileigentumseinheiten.te_nummer' => SORT_ASC],
            'desc' => ['teileigentumseinheiten.te_nummer' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'projekt_id' => $this->projekt_id,
            'reserviert' => $this->reserviert,
            'verkauft' => $this->verkauft,
            'rechnung_vertrieb' => $this->rechnung_vertrieb,
        ]);

        $query->andFilterWhere(['like', 'plz', $this->plz])
            ->andFilterWhere(['like', 'ort', $this->ort])
            ->andFilterWhere(['like', 'strasse', $this->strasse])
            ->andFilterWhere(['like', 'hausnr', $this->hausnr])
            ->andFilterWhere(['like', 'projekt.name', $this->projekt_name])
            ->andFilterWhere(['like', 'firma.name', $this->firma_name])
            ->andFilterWhere(['like', 'firma.nr', $this->firma_nr])
            ->andFilterWhere(['like', 'te_nummer', $this->te_nummer])
            ;

        if ($this->onlyNotAssigned) {
            $query->andFilterWhere(['datenblatts.id' => null]);
        }

        return $dataProvider;
    }
}
