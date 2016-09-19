<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "einheitstyp".
 *
 * @property string $id
 * @property string $name
 * @property string $einheit
 *
 * @property Teileigentumseinheit[] $teileigentumseinheits
 */
class Einheitstyp extends \yii\db\ActiveRecord
{
    
    const TYPE_HAUS = 1;
    const TYPE_STELLPLATZ = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'einheitstyp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['einheit'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['einheit'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'einheit' => 'Einheit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeileigentumseinheits()
    {
        return $this->hasMany(Teileigentumseinheit::className(), ['einheitstyp_id' => 'id']);
    }
}
