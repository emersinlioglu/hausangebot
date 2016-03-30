<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kaeufer".
 *
 * @property string $id
 * @property string $debitor_nr
 * @property string $beurkundung_am
 * @property string $verbindliche_fertigstellung
 * @property string $uebergang_bnl
 * @property string $abnahme_se
 * @property string $abnahme_ge
 * @property integer $auflassung
 * @property integer $anrede
 * @property string $titel
 * @property string $vorname
 * @property string $nachname
 * @property string $strasse
 * @property string $hausnr
 * @property string $plz
 * @property string $ort
 * @property string $festnetz
 * @property string $handy
 * @property string $email
 * @property integer $anrede2
 * @property string $titel2
 * @property string $vorname2
 * @property string $nachname2
 *
 * @property Datenblatt[] $datenblatts
 */
class Kaeufer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kaeufer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beurkundung_am', 'verbindliche_fertigstellung', 'uebergang_bnl', 'abnahme_se', 'abnahme_ge'], 'safe'],
            [['auflassung', 'anrede', 'anrede2'], 'integer'],
            [['debitor_nr', 'titel', 'vorname', 'nachname', 'strasse', 'hausnr', 'plz', 'ort', 'festnetz', 'handy', 'email', 'titel2', 'vorname2', 'nachname2'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'debitor_nr' => Yii::t('app', 'Debitor Nr'),
            'beurkundung_am' => Yii::t('app', 'Beurkundung Am'),
            'verbindliche_fertigstellung' => Yii::t('app', 'Verbindliche Fertigstellung'),
            'uebergang_bnl' => Yii::t('app', 'Uebergang Bnl'),
            'abnahme_se' => Yii::t('app', 'Abnahme Se'),
            'abnahme_ge' => Yii::t('app', 'Abnahme Ge'),
            'auflassung' => Yii::t('app', 'Auflassung'),
            'anrede' => Yii::t('app', 'Anrede'),
            'titel' => Yii::t('app', 'Titel'),
            'vorname' => Yii::t('app', 'Vorname'),
            'nachname' => Yii::t('app', 'Nachname'),
            'strasse' => Yii::t('app', 'Strasse'),
            'hausnr' => Yii::t('app', 'Hausnr'),
            'plz' => Yii::t('app', 'Plz'),
            'ort' => Yii::t('app', 'Ort'),
            'festnetz' => Yii::t('app', 'Festnetz'),
            'handy' => Yii::t('app', 'Handy'),
            'email' => Yii::t('app', 'Email'),
            'anrede2' => Yii::t('app', 'Anrede2'),
            'titel2' => Yii::t('app', 'Titel2'),
            'vorname2' => Yii::t('app', 'Vorname2'),
            'nachname2' => Yii::t('app', 'Nachname2'),
        ];
    }

	public function getAnredeLabel()
{
    return $this->anrede ? 'Frau' : 'Herr';
}
    public function getAnrede2Label()
{
    return $this->anrede2 ? 'Frau' : 'Herr';
}
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatenblatts()
    {
        return $this->hasMany(Datenblatt::className(), ['kaeufer_id' => 'id']);
    }
	
}
