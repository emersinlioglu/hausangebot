<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kunde".
 *
 * @property string $id
 * @property string $debitor_nr
 * @property integer $anrede
 * @property string $titel
 * @property string $vorname
 * @property string $nachname
 * @property string $email
 * @property string $strasse
 * @property string $hausnr
 * @property string $plz
 * @property string $ort
 * @property string $festnetz
 * @property string $handy
 */
class Kunde extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kunde';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anrede'], 'integer'],
            [['debitor_nr', 'titel', 'vorname', 'nachname', 'email', 'strasse', 'hausnr', 'plz', 'ort', 'festnetz', 'handy'], 'string', 'max' => 255]
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
            'anrede' => Yii::t('app', 'Anrede'),
            'titel' => Yii::t('app', 'Titel'),
            'vorname' => Yii::t('app', 'Vorname'),
            'nachname' => Yii::t('app', 'Nachname'),
            'email' => Yii::t('app', 'Email'),
            'strasse' => Yii::t('app', 'Strasse'),
            'hausnr' => Yii::t('app', 'Hausnr'),
            'plz' => Yii::t('app', 'Plz'),
            'ort' => Yii::t('app', 'Ort'),
            'festnetz' => Yii::t('app', 'Festnetz'),
            'handy' => Yii::t('app', 'Handy'),
        ];
    }
}
