<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\registration\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php //GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
 //       'columns' => [
            $columns = [
//            ['class' => 'yii\grid\SerialColumn'],
            ['class'=>'kartik\grid\SerialColumn', 'order'=>DynaGrid::ORDER_FIX_LEFT],

//            'student_id',
            'email:email',
//            'password',
            'first_name',
            'middle_name',
             'last_name',
//             'dob',
       [
        'attribute'=>'dob',
        'filterType'=>GridView::FILTER_DATE,
        'format'=>'raw',
        'width'=>'170px',
        'filterWidgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
     ],
            // 'phone',
            // 'mobile',
            // 'parent_id',
            // 'join_date',
            // 'status',
            // 'last_login',

//            ['class' => 'yii\grid\ActionColumn'],
            [
        'class'=>'kartik\grid\ActionColumn',
        'dropdown'=>false,
        'order'=>DynaGrid::ORDER_FIX_RIGHT
            ],
            ];
//        ],
//    ]); 
    echo DynaGrid::widget([
    'columns'=>$columns,
    'storage'=>DynaGrid::TYPE_COOKIE,
    'theme'=>'panel-danger',
    'gridOptions'=>[
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'panel'=>['heading'=>'<h3 class="panel-title">Student(s)</h3>'],
    ],
    'options'=>['id'=>'dynagrid-1'] // a unique identifier is important
]); ?>
</div>
