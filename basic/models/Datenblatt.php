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
 * @property integer $aktiv
 *
 * @property string $beurkundung_am
 * @property string $verbindliche_fertigstellung
 * @property string $uebergang_bnl
 * @property string $abnahme_se
 * @property string $abnahme_ge
 * @property integer $auflassung
 * @property integer $creator_user_id
 *
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

    public function __get($attribute) {

        if (substr($attribute, 0, 9) == 'teeinheit' && strpos($attribute, '__')) {

            $parts = explode('__', $attribute);
            $relatedObject = $parts[0];
            $nth = $parts[1];
            $attributeName = $parts[2];

            $value = '';
            if ($this->haus && count($this->haus->teileigentumseinheits) > $nth) {
                $te = $this->haus->teileigentumseinheits[$nth];

                switch($attributeName) {
                    case 'te_name':
                        $value = $te->einheitstyp ? $te->einheitstyp->name : '';
                        break;
                    case 'gefoerdert':
                        $value = $te->{$attributeName} ? 'J' : 'N';
                        break;
                    default:                
                        $value = $te->{$attributeName};
                        break;
                }

            }

            return $value;
        }
        
        if (substr($attribute, 0, 12) == 'sonderwunsch' && strpos($attribute, '__')) {

            $parts = explode('__', $attribute);
            $relatedObject = $parts[0];
            $nth = $parts[1];
            $attributeName = $parts[2];

            $value = '';
            if (count($this->sonderwunsches) > $nth) {
                
                $sonerwunsch = $this->sonderwunsches[$nth];
                switch($attributeName) {
                    
                    default:                
                        $value = $sonerwunsch->{$attributeName};
                        break;
                }
            }

            return $value;
        }
        
        if (substr($attribute, 0, 8) == 'abschlag' && strpos($attribute, '__')) {

            $parts = explode('__', $attribute);
            $relatedObject = $parts[0];
            $nth = $parts[1];
            $attributeName = $parts[2];

            $value = '';
            if (count($this->abschlags) > $nth) {

                $abschlag = $this->abschlags[$nth];
                switch($attributeName) {
                    
                    default:                
                        $value = $abschlag->{$attributeName};
                        break;
                }
            }

            return $value;
        }

        if (substr($attribute, 0, 8) == 'nachlass' && strpos($attribute, '__')) {

            $parts = explode('__', $attribute);
            $relatedObject = $parts[0];
            $nth = $parts[1];
            $attributeName = $parts[2];

            $value = '';
            if (count($this->nachlasses) > $nth) {

                $nachlass = $this->nachlasses[$nth];
                switch($attributeName) {
                    
                    default:                
                        $value = $nachlass->{$attributeName};
                        break;
                }
            }

            return $value;
        }

        if (substr($attribute, 0, 7) == 'zahlung' && strpos($attribute, '__')) {

            $parts = explode('__', $attribute);
            $relatedObject = $parts[0];
            $nth = $parts[1];
            $attributeName = $parts[2];

            $value = '';
            if (count($this->zahlungs) > $nth) {

                $zahlung = $this->zahlungs[$nth];
                switch($attributeName) {
                    
                    default:                
                        $value = $zahlung->{$attributeName};
                        break;
                }
            }

            return $value;
        }
        

        return parent::__get($attribute);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['kaeufer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kaeufer::className(), 'targetAttribute' => 'id'],
            [['creator_user_id'], 'required'],
            [['beurkundung_am', 'verbindliche_fertigstellung', 'uebergang_bnl', 'abnahme_se', 'abnahme_ge'], 'safe'],
            [['firma_id', 'projekt_id', 'haus_id', 'nummer', 'kaeufer_id', 'aktiv', 'auflassung', 'creator_user_id'], 'integer'], //'kaeufer_id',
            [['besondere_regelungen_kaufvertrag', 'sonstige_anmerkungen'], 'string']
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
            'aktiv' => Yii::t('app', 'Aktiv'),

            'beurkundung_am' => Yii::t('app', 'Beurkundung Am'),
            'verbindliche_fertigstellung' => Yii::t('app', 'Verbindliche Fertigstellung'),
            'uebergang_bnl' => Yii::t('app', 'Uebergang Bnl'),
            'abnahme_se' => Yii::t('app', 'Abnahme Se'),
            'abnahme_ge' => Yii::t('app', 'Abnahme Ge'),
            'auflassung' => Yii::t('app', 'Auflassung'),
            'creator_user_id' => Yii::t('app', 'Ersteller ID'),
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

    /**
     * @return string
     */
    public function getTenummerHtml() {

        $wohnungsTenummer = array();
        $teNummers = array();

        if ($this->haus) {
            foreach ($this->haus->teileigentumseinheits as $te) {
                $teNummers[] = $te->te_nummer;
                if ($te->einheitstyp_id == 1) {
                    $wohnungsTenummer[] = $te->te_nummer;
                }
            }
            asort($teNummers);

            foreach($teNummers as $key => $tenummer) {
                if (in_array($tenummer, $wohnungsTenummer)) {
                    $teNummers[$key] = '<strong>' . $tenummer . '</strong>';
                } else {
                    $teNummers[$key] = '<small>' . $tenummer . '</small>';
                }
            }
        }

        return implode('/ ', $teNummers);
    }

    public function getSonderwunschSumme() {

        $total = 0;
        foreach ($this->sonderwunsches as $sonderwunsch) {
            $total += $sonderwunsch->rechnungsstellung_betrag;
        }

        return $total;
    }

    public function getNachlassSumme() {

        $total = 0;
        foreach ($this->nachlasses as $nachlass) {
            $total += $nachlass->betrag;
        }

        return $total;
    }

    public function getZahlungSumme() {

        $total = 0;
        foreach ($this->zahlungs as $zahlung) {
            $total += $zahlung->betrag;
        }

        return $total;
    }

    public function getOffenePosten() {

        $this->calculate();

        $total = $this->getAbschlagSumme() - $this->getNachlassSumme() - $this->getZahlungSumme();

        return $total;
    }

    public function getAbschlagSumme() {
        
        $this->calculate();

        $total = 0;
        foreach ($this->abschlags as $abschlag) {
            $total += $abschlag->summe;
        }

        return $total;
    }

    public function calculate()
    {
        // calculate kaufpreis
        $kaufpreisTotal = 0;
        /* @var $teileh app\models\Teileigentumseinheit */
        if ($this->haus) {
            foreach ($this->haus->teileigentumseinheits as $item) {
                $kaufpreisTotal += (float)$item->kaufpreis;
            }
        }

        // calculate sonderwünche
        $sonderwuenscheTotal = 0;
        /* @var $item app\models\Sonderwunsch */
        foreach ($this->sonderwunsches as $item) {
            $sonderwuenscheTotal += (float)$item->rechnungsstellung_betrag;
        }

        // calculate abschlags
        /* @var $item \app\models\Abschlag */
        foreach ($this->abschlags as $item) {

            $zeilenSumme = 0;
            if ($item->kaufvertrag_angefordert) {
                $zeilenSumme += ((float)$item->kaufvertrag_prozent * $kaufpreisTotal / 100);
            }
            if ($item->sonderwunsch_angefordert) {
                $zeilenSumme += ((float)$item->sonderwunsch_prozent * $sonderwuenscheTotal / 100);
            }
            $item->kaufvertrag_betrag = ((float)$item->kaufvertrag_prozent * $kaufpreisTotal / 100);
            $item->sonderwunsch_betrag = ((float)$item->sonderwunsch_prozent * $sonderwuenscheTotal / 100);

            $item->summe = $zeilenSumme;
        }
    }

}
