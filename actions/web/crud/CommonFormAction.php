<?php

namespace kriss\actions\web\crud;

use Yii;

class CommonFormAction extends AbstractAction
{
    /**
     * @var string
     */
    public $doMethod;

    public function run()
    {
        $model = $this->newModel();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $this->doMethodOrCallback($this->doMethod, $model);
            $this->messageAlert($result, $model);
        }

        return $this->controller->render($this->controller->id, [
            'model' => $model
        ]);
    }
}
