<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projekt;

/**
 * ProjektSearch represents the model behind the search form about `app\models\Projekt`.
 */
class ProjektSearch extends Projekt
{
    /**
     * @inheritdoc
     */
public $firma;
public $firma_name;
public $firma_nr;   

    public function rules()
    {
        return [
            [['id', 'firma_id'], 'integer'],
            [['name'], 'safe'],
            [['firma', 'firma_name','firma_nr'], 'safe'],
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
        $query = Projekt::find();


        $query->joinWith(['firma']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

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
        




        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'firma_id' => $this->firma_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like', 'firma.name', $this->firma_name])
        ->andFilterWhere(['like', 'firma.nr', $this->firma_nr])
        ;

        return $dataProvider;
    }
}
