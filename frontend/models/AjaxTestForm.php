<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
class AjaxTestForm extends Model
{
    public $text;
    public function rules()
    {
        return [
            [
                [
                    'text'
                ],
                'string'
            ]
        ];
    }
}