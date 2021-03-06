<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teileigentumseinheit".
 *
 * @property string $id
 * @property integer $haus_id
 * @property integer $einheitstyp_id
 * @property string $te_nummer
 * @property integer $gefoerdert
 * @property string $geschoss
 * @property string $zimmer
 * @property string $me_anteil
 * @property string $wohnflaeche
 * @property double $kaufpreis
 * @property double $kp_einheit
 *
 * @property Einheitstyp $einheitstyp
 * @property Haus $haus
 */
class Teileigentumseinheit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teileigentumseinheit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['haus_id', 'einheitstyp_id'], 'required'],
            [['haus_id', 'einheitstyp_id', 'gefoerdert'], 'integer'],
            [['kaufpreis', 'kp_einheit'], 'number'],
            [['te_nummer'], 'string', 'max' => 255],
            [['geschoss', 'zimmer', 'me_anteil', 'wohnflaeche'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'haus_id' => Yii::t('app', 'Haus ID'),
            'einheitstyp_id' => Yii::t('app', 'Einheitstyp'),
            'te_nummer' => Yii::t('app', 'Te Nummer'),
            'gefoerdert' => Yii::t('app', 'Gefoerdert'),
            'geschoss' => Yii::t('app', 'Geschoss'),
            'zimmer' => Yii::t('app', 'Zimmer'),
            'me_anteil' => Yii::t('app', 'Me Anteil'),
            'wohnflaeche' => Yii::t('app', 'Wohnflaeche'),
            'kaufpreis' => Yii::t('app', 'Kaufpreis'),
            'kp_einheit' => Yii::t('app', 'Kp Einheit'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEinheitstyp()
    {
        return $this->hasOne(Einheitstyp::className(), ['id' => 'einheitstyp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHaus()
    {
        return $this->hasOne(Haus::className(), ['id' => 'haus_id']);
    }
}
