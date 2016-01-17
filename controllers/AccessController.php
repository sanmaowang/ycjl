<?php
/**
 * Created by PhpStorm.
 * User: huey
 * Date: 7/7/15
 * Time: 11:32 PM
 */

//reserved for future use

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;


class AccessController extends Controller
{
    public static  function checkAccess($permission,array $params = [])
    {
        if(Yii::$app->user->can($permission,$params))
            return true;
        else
        {
            if (Yii::$app->user->getIsGuest()) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', '您的权限不足，无法完成此操作.'));
            }
        }
    }
}