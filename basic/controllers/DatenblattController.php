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


        $modelsToDelete = DatenblattSearch::findAll(['aktiv' => 0]);
        foreach ($modelsToDelete as $modelToDelete) {
            $modelToDelete->delete();
        }

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
        $modelDatenblatt->aktiv = 1;

        $modelKaeufer = new Kaeufer();
        if ($modelDatenblatt->kaeufer) {
            $modelKaeufer = $modelDatenblatt->kaeufer;
        }

        $data = Yii::$app->request->post();
        
        if ($modelDatenblatt->load($data) && $modelDatenblatt->save()) {
            
            // Käufer
            if ($modelKaeufer->load(Yii::$app->request->post())) {

                $isEmpty = true;
                foreach ($modelKaeufer->attributes as $attr => $value) {
                    if (!empty($value)) {
                        //error_log('not empty: ' . $attr . ' - ' . $value);
                        $isEmpty = false;
                        break;
                    } else {
                        //error_log('empty: ' . $attr . ' - ' . $value);
                    }
                }

                // save
                if (!$isEmpty) {
                    $modelKaeufer->save();
                }

                // assign käufer
                $modelDatenblatt->kaeufer_id = $modelKaeufer->id;
                $modelDatenblatt->save();
            }

            // Sonderwünsche
            if (Sonderwunsch::loadMultiple($modelDatenblatt->sonderwunsches, $data)) {
                foreach ($modelDatenblatt->sonderwunsches as $item) {
                    $item->save();
                }
            }
            
            // Abschläge
            if ($modelsAbschlag = Abschlag::loadMultiple($modelDatenblatt->abschlags, $data)) {
                foreach ($modelDatenblatt->abschlags as $item) {
                    $item->save();
                }
            }
            
            // Nachlass
            if (Nachlass::loadMultiple($modelDatenblatt->nachlasses, $data)) {
                foreach ($modelDatenblatt->nachlasses as $item) {
                    $item->save();
                }
            }
            
            // Zahlung
            if (Zahlung::loadMultiple($modelDatenblatt->zahlungs, $data)) {
                foreach ($modelDatenblatt->zahlungs as $item) {
                    $item->save();
                }
            }
            
            $this->redirect(['update', 'id' => $id]);
        }
        

        // calculate kaufpreis
        $kaufpreisTotal = 0;
        /* @var $teileh app\models\Teileigentumseinheit */
        if ($modelDatenblatt->haus) {
            foreach ($modelDatenblatt->haus->teileigentumseinheits as $item) {
                $kaufpreisTotal += (float)$item->kaufpreis;
            }
        }
        
        // calculate sonderwünche
        $sonderwuenscheTotal = 0;
        /* @var $item app\models\Sonderwunsch */
        foreach ($modelDatenblatt->sonderwunsches as $item) {
            $sonderwuenscheTotal += (float)$item->rechnungsstellung_betrag;
        }

        // calculate abschlags
        /* @var $item \app\models\Abschlag */
        foreach ($modelDatenblatt->abschlags as $item) {
            if ($item->kaufvertrag_angefordert) {
                $item->kaufvertrag_betrag = ((float)$item->kaufvertrag_prozent * $kaufpreisTotal / 100);
            }
            if ($item->sonderwunsch_angefordert) {
                $item->sonderwunsch_betrag = ((float)$item->sonderwunsch_prozent * $sonderwuenscheTotal / 100);
            }
            $item->summe = $item->kaufvertrag_betrag + $item->sonderwunsch_betrag;
        }

        return $this->render('update', [
            'modelDatenblatt' => $modelDatenblatt,
            'modelsZahlungs' => $modelDatenblatt->zahlungs,
            'modelKaeufer' => $modelKaeufer,
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

        $this->actionUpdate($datenblattId);
//        $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Add new abschlag
     * @param int $datenblattId
     */
    public function actionAddabschlag($datenblattId) {
        
        $new = new Abschlag();
        $new->datenblatt_id = $datenblattId;
        $new->save();

        $this->actionUpdate($datenblattId);
//        $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Add new zahlung
     * @param int $datenblattId
     */
    public function actionAddzahlung($datenblattId) {
        
        $new = new Zahlung();
        $new->datenblatt_id = $datenblattId;
        $new->save();

        $this->actionUpdate($datenblattId);
//        $this->redirect(['update', 'id' => $datenblattId]);
    }
    
    /**
     * Add new nachlass
     * @param int $datenblattId
     */
    public function actionAddnachlass($datenblattId) {
        
        $new = new Nachlass();
        $new->datenblatt_id = $datenblattId;
        $new->save();

        $this->actionUpdate($datenblattId);
//        $this->redirect(['update', 'id' => $datenblattId]);
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
        $name = $model->id;

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

        $this->actionUpdate($datenblattId);
//        return $this->redirect(['update', 'id' => $datenblattId]);
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

        $this->actionUpdate($datenblattId);
//        return $this->redirect(['update', 'id' => $datenblattId]);
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

        $this->actionUpdate($datenblattId);
//        return $this->redirect(['update', 'id' => $datenblattId]);
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

        $this->actionUpdate($datenblattId);
//        return $this->redirect(['update', 'id' => $datenblattId]);
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
