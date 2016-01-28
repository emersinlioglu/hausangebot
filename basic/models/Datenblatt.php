<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datenblatt".
 *
 * @property integer $id
 * @property string $firma_id
 * @property string $projekt_id
 * @property string $haus_id
 * @property integer $nummer
 * @property string $kaeufer_id
 * @property string $besondere_regelungen_kaufvertrag
 * @property string $sonstige_anmerkungen
 *
 * @property Abschlag[] $abschlags
 * @property Firma $firma
 * @property Haus $haus
 * @property Kaeufer $kaeufer
 * @property Projekt $projekt
 * @property Nachlass[] $nachlasses
 * @property Sonderwunsch[] $sonderwunsches
 * @property Zahlung[] $zahlungs
 */
class Datenblatt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datenblatt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firma_id', 'projekt_id', 'haus_id', 'nummer', 'kaeufer_id'], 'integer'],
            [['besondere_regelungen_kaufvertrag', 'sonstige_anmerkungen'], 'string'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firma_id' => Yii::t('app', 'Firma ID'),
            
            'projekt_id' => Yii::t('app', 'Projekt ID'),
            'haus_id' => Yii::t('app', 'Haus ID'),
            'nummer' => Yii::t('app', 'Nummer'),
            'kaeufer_id' => Yii::t('app', 'Kaeufer ID'),
            'besondere_regelungen_kaufvertrag' => Yii::t('app', 'Besondere Regelungen Kaufvertrag'),
            'sonstige_anmerkungen' => Yii::t('app', 'Sonstige Anmerkungen'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbschlags()
    {
        return $this->hasMany(Abschlag::className(), ['datenblatt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirma()
    {
        return $this->hasOne(Firma::className(), ['id' => 'firma_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHaus()
    {
        return $this->hasOne(Haus::className(), ['id' => 'haus_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaeufer()
    {
        return $this->hasOne(Kaeufer::className(), ['id' => 'kaeufer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjekt()
    {
        return $this->hasOne(Projekt::className(), ['id' => 'projekt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNachlasses()
    {
        return $this->hasMany(Nachlass::className(), ['datenblatt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSonderwunsches()
    {
        return $this->hasMany(Sonderwunsch::className(), ['datenblatt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZahlungs()
    {
        return $this->hasMany(Zahlung::className(), ['datenblatt_id' => 'id']);
    }


public function actionProjekt() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $firma_id = $parents[0];
            $out = self::getSubCatList($firma_id); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}


}
