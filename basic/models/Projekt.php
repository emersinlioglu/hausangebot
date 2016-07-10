<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projekt".
 *
 * @property string $id
 * @property string $name
 * @property string $role
 * @property string $firma_id
 *
 * @property Haus[] $hauses
 * @property Firma $firma
 */
class Projekt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projekt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firma_id', 'role'], 'required'],
            [['firma_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Projektname'),
            'role' => Yii::t('app', 'Role'),
            'firma_id' => Yii::t('app', 'Firma ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHauses()
    {
        return $this->hasMany(Haus::className(), ['projekt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirma()
    {
        return $this->hasOne(Firma::className(), ['id' => 'firma_id']);
    }
}
