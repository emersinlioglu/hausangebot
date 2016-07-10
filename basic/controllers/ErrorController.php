<?php
namespace app\controllers;

use Yii;

use yii\web\Controller;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ErrorController extends Controller {

    public $layout = '//layouts/column1';
    /**
     * This is the action to handle external exceptions.
     */
    public function actionErrorHandler() {
        if ($error = Yii::app()->errorHandler->error) {
            if ('CDbException' != $error['type']) {
                if (Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
                else
                    $this->commonError($error);
            }else if ('CDbException' == $error['type']) {
                if (Yii::app()->request->isAjaxRequest)
                    echo $error['message'] = 'The system is unable to resolve the database error !';
                else
                    $this->databaseError($error);
            }
        }
    }

    /**
     * 
     * @param type array $error
     * @access : Internal, type private
     * @throws: Http exception.
     */
    private function commonError($error) {
        $this->render('code_error', $error);
    }

    /**
     * 
     * @param type array $error
     * @throws Exception
     */
    private function databaseError($error) {
        if (empty($error)) {
            $error['code'] = '404';
            $error['message'] = 'Unknown error !';
            $this->render('code_error', $error);
            Yii::app()->end(0, true);
        }

        $error['message'] = 'The system is unable to resolve the database error !';
        $this->render('database_error', $error);
    }

}
?>
