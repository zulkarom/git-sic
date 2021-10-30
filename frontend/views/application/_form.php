<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use common\models\Common;
use kartik\checkbox\CheckboxX;
use frontend\models\Countries;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\FileInput;
use frontend\models\Categories;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row form-group">
      <div class="col-md-8"><h3><?= Html::encode($this->title) ?></h3></div>

      
    </div>
<div class="application-form">



    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <?= $form->errorSummary($model); ?>
    
    <?php if($model->status == 0) {?>
    <div class="row">
        <div class="col-md-12">
        
        <?php 
        $categories = Categories::find()->all();
        $categories = ArrayHelper::map($categories, 'id', 'categoryFees');
        
        ?>
        
            <?= $form->field($model, 'category')->radioList($categories)->label('<b>Choose Your Category</b>') ?>
        </div>
    </div>
    <?php } ?>
    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'applicant_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nationality')->widget(Select2::classname(), [
                'data' =>  ArrayHelper::map(Countries::find()->all(),'id', 'country_enName'),
                'options' => ['placeholder' => 'Please Select'],
                'class' => 'form-control',
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'id_number')->textInput()?>
        </div>
        <div class="col-md-4">   
            <?= $form->field($model, 'gender')->dropDownList(
                Common::gender(), ['prompt' => 'Please Select' ]
            ) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'age')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'phoneNo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">   
            <?= $form->field($model, 'officeNo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'faxNo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'instiBusName')->textInput(['maxlength' => true])?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?= $form->field($model, 'address')->textArea(['rows' => '2']) ?>
        </div>
    </div>

    <br/>
    <div class="row">
        <div class="col-12">
            <b>TEAM MEMBERS INFORMATION (INCLUDE MAIN APPLICANT AND NOT MORE THAN FIVE MEMBERS):</b>

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapperxxx',
                'widgetBody' => '.container-items',
                'widgetItem' => '.row-item',
                'limit' => 5,
                'min' => 1,
                'insertButton' => '.add-item',
                'deleteButton' => '.remove-item',
                'model' => $items[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'name',
                    'idNumber',
                    'instiBusName',
                    'phoneNo',
                    'email'
                ],
            ]); ?>
    
    
   <table class="table table-bordered table-striped">
        <thead>
            <tr>
                
                <th><center>NAME AND DESIGNATION<br/>(PROJECT LEADER / TEAM MEMBER)</center></th>
                <th width="18%"><center>IDEN. DOC./ PASSPORT NO.</center></th>
                <th width="15%"><center>INSTITUTION/BUSINESS NAME</center></th>
                <th width="15%"><center>
                 MOBILE NO.</center>   
                </th>
                <th width="18%"><center>
                 EMAIL</center>   
                </th>
                <th width="2.4%"></th>
            </tr>
        </thead>
        <tbody class="container-items">
        <?php foreach ($items as $indexItem => $item): ?>
            <tr class="row-item">
         
            
                <?php
                        // necessary for update action.
                        if (! $item->isNewRecord) {
                            echo Html::activeHiddenInput($item, "[{$indexItem}]id");
                        }
                    ?>

                
                <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]name")->label(false) ?>
                </td>

            
                  
                <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]idNumber")->label(false) ?>
                </td>
                
                <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]instiBusName")->label(false) ?>
                </td>
                
                <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]phoneNo")->label(false) ?>
                </td>

                 <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]email")->label(false) ?>
                </td>
    

                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-item btn btn-default btn-sm"><span class="fas fa-trash"></span></button>
                </td>
            </tr>
         <?php endforeach; ?>
        </tbody>
        
        <tfoot>
            <tr>
    
                <td colspan="7">
                <button type="button" class="add-item btn btn-info btn-sm"><span class="fa fa-plus"></span> New Item</button>
                
                </td>
            </tr>
        </tfoot>
        
    </table>
    
    
    
    <?php DynamicFormWidget::end(); ?>


        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <b>PROJECT/ IDEA INFORMATION:</b>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?= $form->field($model, 'project_name')->textarea(['rows' => 6])?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?= $form->field($model, 'project_description', ['template' => '{label}{input}<i>(Description should be not more than 300 words and must specify which development phase involves innovation (i.e ideation/prototype/Commercialization /market testing)</i>{error}
            '])->textarea(['rows' => 12])?>
        </div>
    </div>
 <?php if($model->status == 0) {?>
    <div class="row">
        <div class="col-12">
            <b>INFORMATION ABOUT SWISS INNOVATION CHALLENGE:</b>
        </div>
    </div>

    <b>How did you hear about this SIC 2021 (you may tick more than one):</b>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'medium_web')->checkbox(['value' => '1', 'label'=> 'Website']); ?>
            <?= $form->field($model, 'medium_email')->checkbox(['value' => '1', 'label'=> 'Email']); ?>
            <?= $form->field($model, 'medium_others')->checkbox(['value' => '1', 'label'=> 'Others (please state):</b>']); ?>
            <?= $form->field($model, 'reference')->textInput()->label(false)?>
        </div>
    </div>
  
    <div class="row">
        <div class="col-md-12">
             <b>DECLARATION</b>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
             I/We have read and agree to the Swiss Innovation Challenge Malaysia (SIC) 2021 Format, Rules and Regulations (<a href="<?=Url::to(['/page/requirements'])?>" target="_blank">link to the rules</a>). I/We understand that SIC has the right to refuse my/our application if any non-conformance to the Rules and Regulations is found.
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">                    
            
        <?= $form->field($model, 'aggrement_disclaimer')->checkbox(['value' => '1', 'label'=> '<b>I Agree</b>']); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Save as Draft', ['class' => 'btn btn-info', 'name' => 'btn-submit', 'value' => 'draft']) ?> 
         <?= Html::submitButton('<i class="fa fa-submit"></i> Submit Application', ['class' => 'btn btn-success', 'name' => 'btn-submit', 'value' => 'submit', 'data' => [
                        'confirm' => 'Are you sure you want to submit this application?',
                        'method' => 'post',
                    ]]) ?>
    </div>
    
    <?php 
    } else {
        ?>
        <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Update', ['class' => 'btn btn-primary', 'name' => 'btn-submit', 'value' => 999]) ?>

    </div>
    <?php 
    }
    
    
    
    ?>
    

    <?php ActiveForm::end(); ?>

</div>


<?php

$js = <<<'EOD'

jQuery(".dynamicform_wrapperxxx").on("afterInsert", function(e, item) {
    var first = $(item).find("input")[0];
    first.setAttribute("value", "");         
});


EOD;


$this->registerJs($js);
?>




