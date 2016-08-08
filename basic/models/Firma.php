<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "firma".
 *
 * @property string $id
 * @property string $name
 * @property string $nr
 *
 * @property Projekt[] $projekts
 */
class Firma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'nr'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Firmenname'),
            'nr' => Yii::t('app', 'Nr'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjekts()
    {
        $query = $this->hasMany(Projekt::className(), ['firma_id' => 'id']);

        // filter by creator_user_id or projekt_user assignments
        if (!Yii::$app->user->isSuperadmin) {
            $query->leftJoin('projekt_user pu', 'pu.projekt_id = projekt.id');
            $query->andFilterWhere(['or',
                ['projekt.creator_user_id' => Yii::$app->user->identity->getId()],
                ['pu.user_id' => Yii::$app->user->identity->getId()],
                ['projekt.creator_user_id' => Yii::$app->user->identity->getId()],
            ]);
        }

        return $query;
    }
}
