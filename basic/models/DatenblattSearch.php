<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datenblatt;
use yii\helpers\ArrayHelper;

/**
 * DatenblattSearch represents the model behind the search form about `app\models\Datenblatt`.
 */
class DatenblattSearch extends Datenblatt
{
    /**
     * @inheritdoc
     */
    public $haus;
    public $haus_strasse;
    public $haus_ort;
    public $haus_plz;
    public $haus_hausnr;
    public $kaeufer;
    public $kaeufer_debitornr;
    public $kaeufer_nachname;
    public $kaeufer_vorname;
    public $projekt;
    public $projekt_name;
    public $firma;
    public $firma_name;
    public $firma_nr;
    public $te_nummer;

    public function rules()
    {
        return [
            [['id', 'firma_id', 'projekt_id', 'haus_id', 'nummer', 'kaeufer_id'], 'integer'],
            [['besondere_regelungen_kaufvertrag', 'sonstige_anmerkungen'], 'safe'],
            [['haus', 'haus_strasse', 'haus_plz', 'haus_ort', 'haus_hausnr', 'te_nummer'], 'safe'],
            [['kaeufer', 'kaeufer_debitornr', 'kaeufer_nachname', 'kaeufer_vorname'], 'safe'],
            [['projekt_name', 'firma_name', 'firma_nr'], 'safe'],
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
        $query = Datenblatt::find();
        $query->joinWith(['haus', 'kaeufer', 'projekt', 'firma', 'haus.teileigentumseinheits']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10 // in case you want a default pagesize
            ]

        ]);

        // toggle display all
        $toggleDataKey = '_tog' . hash('crc32', 'DatenblattSearch');
        $isShowAll = ArrayHelper::getValue($_GET, $toggleDataKey) === 'all';
        if ($isShowAll) {
            $dataProvider->pagination = false;
        }

        $dataProvider->sort->attributes['haus_strasse'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['haus.strasse' => SORT_ASC],
            'desc' => ['haus.strasse' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['haus_ort'] = [
            'asc' => ['haus.ort' => SORT_ASC],
            'desc' => ['haus.ort' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['haus_hausnr'] = [
            'asc' => ['haus.hausnr' => SORT_ASC],
            'desc' => ['haus.hausnr' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['haus_plz'] = [
            'asc' => ['haus.plz' => SORT_ASC],
            'desc' => ['haus.plz' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['kaeufer_nachname'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['kaeufer.nachname' => SORT_ASC],
            'desc' => ['kaeufer.nachname' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['kaeufer_vorname'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['kaeufer.vorname' => SORT_ASC],
            'desc' => ['kaeufer.vorname' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['kaeufer_debitornr'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['kaeufer.debitor_nr' => SORT_ASC],
            'desc' => ['kaeufer.debitor_nr' => SORT_DESC],
        ];

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

        $teNummercolumn = 'min((te_nummer * 1))';
        $dataProvider->sort->attributes['te_nummer'] = [
            'asc' => [$teNummercolumn => SORT_ASC],
            'desc' => [$teNummercolumn => SORT_DESC],
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
            'projekt_id' => $this->projekt_id,
            'haus_id' => $this->haus_id,
            'nummer' => $this->nummer,
            'kaeufer_id' => $this->kaeufer_id,
        ]);

        $query->andFilterWhere(['like', 'besondere_regelungen_kaufvertrag', $this->besondere_regelungen_kaufvertrag])
            ->andFilterWhere(['like', 'haus.strasse', $this->haus_strasse])
            ->andFilterWhere(['like', 'haus.ort', $this->haus_ort])
            ->andFilterWhere(['like', 'haus.hausnr', $this->haus_hausnr])
            ->andFilterWhere(['like', 'haus.plz', $this->haus_plz])
            ->andFilterWhere(['like', 'kaeufer.debitor_nr', $this->kaeufer_debitornr])
            ->andFilterWhere(['like', 'kaeufer.nachname', $this->kaeufer_nachname])
            ->andFilterWhere(['like', 'kaeufer.vorname', $this->kaeufer_vorname])
            ->andFilterWhere(['like', 'projekt.name', $this->projekt_name])
            ->andFilterWhere(['like', 'firma.name', $this->firma_name])
            ->andFilterWhere(['like', 'firma.nr', $this->firma_nr])
            ->andFilterWhere(['like', 'sonstige_anmerkungen', $this->sonstige_anmerkungen])
            ->andFilterWhere(['like', 'te_nummer', $this->te_nummer]);

        $query->groupBy([
            'datenblatt.id'
        ]);

        return $dataProvider;
    }
}
