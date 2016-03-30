<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\ArrayHelper; // load classes
use app\models\Parents;
//use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\registration\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php //$form = ActiveForm::begin(); ?>
    <?php 
    $dataList=ArrayHelper::map(Parents::find()->asArray()->all(), 'parent_id', 'email');
    $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);
    echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>2,
    'attributes'=>[       // 2 column layout
        'email'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter username...']],
        'password'=>['type'=>Form::INPUT_PASSWORD, 'options'=>['placeholder'=>'Enter password...']]
    ]
]);
    
    echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'attributes'=>[       // 2 column layout
        'first_name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter first name...']],
        'middle_name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter middle name...']],
        'last_name'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter last name...']]
    ]
]);
//    echo $form->field($model, 'dob')->widget(
//    DatePicker::className(), [
//        // inline too, not bad
//         'inline' => false, 
//         // modify template for custom rendering
////        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
//        'clientOptions' => [
//            'autoclose' => true,
//            'format' => 'yyyy-mm-dd'
//        ]
//]);
    
     echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'attributes'=>[       // 3 column layout
        'dob'=>[
            'type'=>Form::INPUT_WIDGET, 
            'widgetClass'=>'\kartik\widgets\DatePicker',
            'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ],
            'hint'=>'Enter birthday (yyyy-M-dd)'
        ],
        'phone'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter phone number...']],
        'mobile'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter mobile number...']]
    ]
]);
     
     
      echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'attributes'=>[       // 3 column layout
        'parent_id'=>[
            'type'=>Form::INPUT_WIDGET, 
            'widgetClass'=>'\kartik\widgets\Select2', 
            'options'=>['data'=>$dataList], 
            'hint'=>'Type and select parent'
        ],
        'join_date'=>[
            'type'=>Form::INPUT_WIDGET, 
            'widgetClass'=>'\kartik\widgets\DatePicker', 
//             'pluginOptions' => [
//        'format' => 'dd-M-yyyy',
//        'todayHighlight' => true
//    ],
            'hint'=>'Enter date (yyyy-M-dd)'
        ],
        'status'=>[
            'type'=>Form::INPUT_RADIO_LIST, 
            'items'=>[true=>'Active', false=>'Inactive'], 
            'options'=>['inline'=>true]
        ],
    ]
]);
      
    echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'attributes'=>[       // 3 column layout
     'actions'=>[
            'type'=>Form::INPUT_RAW, 
            'value'=>'<div style="text-align: right; margin-top: 20px">' . 
                Html::resetButton('Reset', ['class'=>'btn btn-default']) . ' ' .
                Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) . 
                '</div>'
        ],
     
    ]
]);
       
    
    ?>

<!--    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>-->

    <?php //ActiveForm::end(); 
    ActiveForm::end();
    ?>

</div>
