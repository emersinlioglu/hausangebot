<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\Datenblatt;
use app\models\DatenblattSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use app\models\DynamicForm;
use app\models\Nachlass;
use app\models\Zahlung;
use app\models\Kaeufer;
use app\models\Sonderwunsch;
use app\models\Abschlag;


/**
 * DatenblattController implements the CRUD actions for Datenblatt model.
 */
class DatenblattController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Datenblatt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DatenblattSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Datenblatt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Datenblatt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Datenblatt;
        $model->save();
        
        $this->redirect(['datenblatt/update', 'id' => $model->id]);
    }

    /**
     * Updates an existing Datenblatt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionUpdate($id)
    {
        $modelDatenblatt = $this->findModel($id);
        
        $data = Yii::$app->request->post();
        
        if ($modelDatenblatt->load($data) && $modelDatenblatt->save()) {
            
            // Käufer
            $modelKaeufer = $modelDatenblatt->kaeufer;
            if (!$modelKaeufer) {
                $modelKaeufer = new Kaeufer();
            }
            if ($modelKaeufer->load(Yii::$app->request->post())) {

//                $datumFelder = ['beurkundung_am', 'verbindliche_fertigstellung', 'uebergang_bnl', 'abnahme_se', 'abnahme_ge'];
//                foreach($datumFelder as $feld) {
//                    $datum = \DateTime::createFromFormat('d.m.Y', $modelKaeufer->{$feld}); 
//                    if ($datum) {
//                        $datum->setTime(0, 0, 0);
//                        $modelKaeufer->{$feld} = $datum->format('Y-m-d H:i:s');
//                    } else {
//                        $modelKaeufer->{$feld} = '';
//                    }
//                }
                // save
                $modelKaeufer->save();
                // assign käufer
                $modelDatenblatt->kaeufer_id = $modelKaeufer->id;
                $modelDatenblatt->save();
            }

            // Sonderwünsche
            if (Sonderwunsch::loadMultiple($modelDatenblatt->sonderwunsches, $data)) {
                foreach ($modelDatenblatt->sonderwunsches as $item) {
//                    $datumFelder = ['angebot_datum', 'beauftragt_datum', 'rechnungsstellung_datum'];
//                    foreach($datumFelder as $feld) {
//                        $datum = \DateTime::createFromFormat('d.m.Y', $item->{$feld}); 
//                        if ($datum) {
//                            $datum->setTime(0, 0, 0);
//                            $item->{$feld} = $datum->format('Y-m-d H:i:s');
//                        } else {
//                            $item->{$feld} = '';
//                        }
//                    }
                    
                    $item->save();
                }
            }
            
            // Abschläge
            if ($modelsAbschlag = Abschlag::loadMultiple($modelDatenblatt->abschlags, $data)) {
                foreach ($modelDatenblatt->abschlags as $item) {
//                    $datumFelder = ['kaufvertrag_angefordert', 'sonderwunsch_angefordert'];
//                    foreach($datumFelder as $feld) {
//                        $datum = \DateTime::createFromFormat('d.m.Y', $item->{$feld}); 
//                        if ($datum) {
//                            $datum->setTime(0, 0, 0);
//                            $item->{$feld} = $datum->format('Y-m-d H:i:s');
//                        } else {
//                            $item->{$feld} = '';
//                        }
//                    }
                    $item->save();
                }
            }
            
            // Nachlass
            if (Nachlass::loadMultiple($modelDatenblatt->nachlasses, $data)) {
                foreach ($modelDatenblatt->nachlasses as $item) {
//                    $datumFelder = ['schreiben_vom'];
//                    foreach($datumFelder as $feld) {
//                        $datum = \DateTime::createFromFormat('d.m.Y', $item->{$feld}); 
//                        if ($datum) {
//                            $datum->setTime(0, 0, 0);
//                            $item->{$feld} = $datum->format('Y-m-d H:i:s');
//                        } else {
//                            $item->{$feld} = '';
//                        }
//                    }
                    $item->save();
                }
            }
            
            // Zahlung
            if (Zahlung::loadMultiple($modelDatenblatt->zahlungs, $data)) {
                foreach ($modelDatenblatt->zahlungs as $item) {
//                    $datumFelder = ['datum'];
//                    foreach($datumFelder as $feld) {
//                        $datum = \DateTime::createFromFormat('d.m.Y', $item->{$feld}); 
//                        if ($datum) {
//                            $datum->setTime(0, 0, 0);
//                            $item->{$feld} = $datum->format('Y-m-d H:i:s');
//                        } else {
//                            $item->{$feld} = '';
//                        }
//                    }
                    $item->save();
                }
            }
            
            $this->redirect(['update', 'id' => $id]);
        }
        
        
        
        
        // kaufpreis
        $kaufpreisTotal = 0;
        /* @var $teileh app\models\Teileigentumseinheit */
        if ($modelDatenblatt->haus) {
            foreach ($modelDatenblatt->haus->teileigentumseinheits as $item) {
                $kaufpreisTotal += (float)$item->kaufpreis;
            }
        }
        
        // sonderwünche
        $sonderwuenscheTotal = 0;
        /* @var $item app\models\Sonderwunsch */
        foreach ($modelDatenblatt->sonderwunsches as $item) {
            $sonderwuenscheTotal += (float)$item->rechnungsstellung_betrag;
        }
        
        /* @var $item app\models\Abschlag */
        foreach ($modelDatenblatt->abschlags as $item) {
            $item->kaufvertrag_betrag = (string)((float)$item->kaufvertrag_prozent * $kaufpreisTotal / 100);
            $item->sonderwunsch_betrag = (string)((float)$item->sonderwunsch_prozent * $sonderwuenscheTotal / 100);
            $item->summe = $item->kaufvertrag_betrag + $item->sonderwunsch_betrag;
        }

        return $this->render('update', [
            'modelDatenblatt' => $modelDatenblatt,
            'modelsZahlungs' => $modelDatenblatt->zahlungs,
            'modelKaeufer' => $modelDatenblatt->kaeufer ? $modelDatenblatt->kaeufer : new Kaeufer(),
        ]);
    }
    

    /**
     * Add new datenblatt
     * @param int $datenblattId
     */
    public function actionAddsonderwunsch($datenblattId) {
        
        $new = new Sonderwunsch();
        $new->datenblatt_id = $datenblattId;
        $new->save();
        
        $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Add new abschlag
     * @param int $datenblattId
     */
    public function actionAddabschlag($datenblattId) {
        
        $new = new Abschlag();
        $new->datenblatt_id = $datenblattId;
        $new->save();
        
        $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Add new zahlung
     * @param int $datenblattId
     */
    public function actionAddzahlung($datenblattId) {
        
        $new = new Zahlung();
        $new->datenblatt_id = $datenblattId;
        $new->save();
        
        $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Add new nachlass
     * @param int $datenblattId
     */
    public function actionAddnachlass($datenblattId) {
        
        $new = new Nachlass();
        $new->datenblatt_id = $datenblattId;
        $new->save();
        
        $this->redirect(['update', 'id' => $datenblattId]);
    }


    /**
     * Deletes an existing Datenblatt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $name = $model->first_name;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        }

        return $this->redirect(['index']);
    }


    /**
     * Deletes sonderwunsch
     * @param integer $id
     * @return mixed
     */
    public function actionDeletesonderwunsch($datenblattId, $sonderwunschId)
    {
        $model = $this->findModel($datenblattId);

        if ($modelSonderwunsch = Sonderwunsch::findOne($sonderwunschId)) {
            $modelSonderwunsch->delete();
        }

        return $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Deletes abschlag
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteabschlag($datenblattId, $abschlagId)
    {
        $model = $this->findModel($datenblattId);

        if ($modelAbschlag = Abschlag::findOne($abschlagId)) {
            $modelAbschlag->delete();
        }

        return $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Deletes nachlass
     * 
     * @param int $datenblattId
     * @param int $nachlassId
     * @return void
     */
    public function actionDeletenachlass($datenblattId, $nachlassId)
    {
        $model = $this->findModel($datenblattId);

        if ($modelNachlass = Nachlass::findOne($nachlassId)) {
            $modelNachlass->delete();
        }

        return $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Deletes zahlung
     * @param int $datenblattId
     * @param int $zahlungId
     * @return void
     */
    public function actionDeletezahlung($datenblattId, $zahlungId)
    {
        $model = $this->findModel($datenblattId);

        if ($item = Zahlung::findOne($zahlungId)) {
            $item->delete();
        }

        return $this->redirect(['update', 'id' => $datenblattId]);
    }


    public function actionSubcat() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $firma_id = $parents[0];
            $out = self::getSubCatList($firma_id); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}


    /**
     * Finds the Datenblatt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Datenblatt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Datenblatt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
