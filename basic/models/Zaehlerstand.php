<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zaehlerstand".
 *
 * @property string $id
 * @property string $name
 * @property string $nummer
 * @property string $stand
 * @property string $datum
 * @property string $haus_id
 *
 * @property Haus $haus
 */
class Zaehlerstand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zaehlerstand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datum'], 'safe'],
            [['haus_id'], 'required'],
            [['haus_id'], 'integer'],
            [['name', 'nummer', 'stand'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Medium-Name',
            'nummer' => 'Medium-Nr',
            'stand' => 'Stand',
            'datum' => 'Datum',
            'haus_id' => 'Haus ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHaus()
    {
        return $this->hasOne(Haus::className(), ['id' => 'haus_id']);
    }
}
