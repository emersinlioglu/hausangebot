<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nachlass".
 *
 * @property string $id
 * @property integer $datenblatt_id
 * @property string $schreiben_vom
 * @property double $betrag
 * @property string $bemerkung
 *
 * @property Datenblatt $datenblatt
 */
class Nachlass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nachlass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datenblatt_id'], 'required'],
            [['datenblatt_id'], 'integer'],
            [['schreiben_vom'], 'safe'],
            [['betrag'], 'number'],
            [['bemerkung'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'datenblatt_id' => Yii::t('app', 'Datenblatt ID'),
            'schreiben_vom' => Yii::t('app', 'Schreiben Vom'),
            'betrag' => Yii::t('app', 'Betrag'),
            'bemerkung' => Yii::t('app', 'Bemerkung'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatenblatt()
    {
        return $this->hasOne(Datenblatt::className(), ['id' => 'datenblatt_id']);
    }


    public function getSchreibenVomLabel()
    {
        if ($this->schreiben_vom === null) {
            $label = '';
        } else {
            $label = Yii::$app->formatter->asDate($this->schreiben_vom);
        }
        return $label;
    }
}
