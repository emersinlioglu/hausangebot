<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "einheitstyp".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Teileigentumseinheit[] $teileigentumseinheits
 */
class Einheitstyp extends \yii\db\ActiveRecord
{

    const TYPE_HAUS = 1;

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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
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
