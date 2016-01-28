<?php

namespace app\controllers;

use Yii;
use app\models\Haus;
use app\models\HausSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Teileigentumseinheit;
use app\models\Zaehlerstand;
use yii\data\ActiveDataProvider;

/**
 * HausController implements the CRUD actions for Haus model.
 */
class HausController extends Controller
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
     * Lists all Haus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HausSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Haus model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Haus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Haus();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Haus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $modelsTeilieigentum = $model->teileigentumseinheits;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $data = Yii::$app->request->post();
            
            if (isset($data['addnewZaehlerstand'])) {
                $new = new Zaehlerstand();
                $new->haus_id = $id;
                $new->save();
                
                $this->redirect(['update', 'id' => $model->id]);

            } else if (isset($data['addnew'])) {
                
                $new = new Teileigentumseinheit();
                $new->haus_id = $id;
                $new->einheitstyp_id = 1;
                $new->save();
                
                $this->redirect(['update', 'id' => $model->id]);
            } else {
                
                if (isset($data['Teileigentumseinheiten'])) {

                    foreach ($data['Teileigentumseinheiten'] as $objData) {
                        if (isset($objData['id']) && $objData['id'] > 0) {
                            $obj = Teileigentumseinheit::findOne($objData['id']);
                            $obj->load(['Teileigentumseinheit' => $objData]);
                            $obj->save();
                        }
                    }
                }
                
//                if (isset($data['Zaehlerstaende'])) {
//                    foreach ($data['Zaehlerstaende'] as $objData) {
//                        if (isset($objData['id']) && $objData['id'] > 0) {
//                            $obj = Zaehlerstand::findOne($objData['id']);
//                            $obj->load(['Zaehlerstand' => $objData]);
//                            
//                            $date = \DateTime::createFromFormat('d.m.Y', $objData['datum']); 
//                            if ($date) {
//                                $date->setTime(0, 0, 0);
//                                $obj->datum = $date->format('Y-m-d H:i:s');
//                            } else {
//                                $obj->datum = '';
//                            }
//                            $obj->save();
//                        }
//                    }
//                }
                
                    if (Zaehlerstand::loadMultiple($model->zaehlerstands, $data)) {
                        foreach ($model->zaehlerstands as $item) {
                            $item->save();
                        }
                    }
                
                return $this->redirect(['update', 'id' => $model->id]);
            }
            
        } else {
            
            return $this->render('update', [
                'model' => $model,
                'modelsTeilieigentum' => $modelsTeilieigentum
            ]);
        }
    }

    /**
     * Deletes an existing Haus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Teileigentumseinheit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeleteteileigentumseinheit($hausId, $teileigentumseinheitId)
    {
        $teileigentumseinheit = Teileigentumseinheit::findOne($teileigentumseinheitId);
        if ($teileigentumseinheit) {
            $teileigentumseinheit->delete();
        }
        
        return $this->redirect(['update', 'id' => $hausId]);
    }
    /**
     * Deletes an existing Teileigentumseinheit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletezaehlerstand($hausId, $zaehlerstandId)
    {
        $zaehlerstand = Zaehlerstand::findOne($zaehlerstandId);
        if ($zaehlerstand) {
            $zaehlerstand->delete();
        }
        
        return $this->redirect(['update', 'id' => $hausId]);
    }








    /**
     * Finds the Haus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Haus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Haus::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
