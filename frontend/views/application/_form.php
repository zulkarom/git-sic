<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use common\models\Common;
use kartik\checkbox\CheckboxX;
use backend\models\Countries;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'category')->radioList(Common::category(), ['inline'=>true])->label('<b>Choose Your Category</b>') ?>
        </div>
    </div>
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
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'logo_file')->fileInput() ?>
            <?php

                if($model->logo_file){
                    echo '<div class="form-group">Attached File: ' . Html::a($model->logo_file, ['logo-image', 'id' => $model->id], [
                           'target' => '_blank']);
                    echo '</div>';
                }
            ?>
        </div>

        
    </div>
    <br/>
    <div class="row">
        <div class="col-12">
            <b>TEAM MEMBERS INFORMATION (INCLUDE MAIN APPLICANT AND NOT MORE THAN FIVE MEMBERS):</b>

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper',
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
                <th width="3.2%"></th>
                
                <th width="30%"><center>NAME AND DESIGNATION<br/>(PROJECT LEADER / TEAM MEMBER)</center></th>
                <th width="12%"><center>IDEN. DOC./ PASSPORT NO.</center></th>
                <th width="15%"><center>INSTITUTION/BUSINESS NAME</center></th>
                <th width="15%"><center>
                 MOBILE NO.</center>   
                </th>
                <th width="15%"><center>
                 EMAIL</center>   
                </th>
                <th width="2.4%"></th>
            </tr>
        </thead>
        <tbody class="container-items">
        <?php foreach ($items as $indexItem => $item): ?>
            <tr class="row-item">
                <td class="sortable-handle text-center vcenter" style="cursor: move;">
                        <i class="fas fa-arrows-alt"></i>
                    </td>
            
                <?php
                        // necessary for update action.
                        if (! $item->isNewRecord) {
                            echo Html::activeHiddenInput($item, "[{$indexItem}]id");
                        }
                    ?>

                
                <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]name")->textarea(['rows' => '1'])->label(false) ?>
                </td>

            
                  
                <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]idNumber")->label(false) ?>
                </td>
                
                <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]instiBusName")->textarea(['rows' => '1'])->label(false) ?>
                </td>
                
                <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]phoneNo")->label(false) ?>
                </td>

                 <td class="vcenter">
                    <?= $form->field($item, "[{$indexItem}]email")->textarea(['rows' => '1'])->label(false) ?>
                </td>
    

                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-item btn btn-default btn-sm"><span class="fas fa-trash"></span></button>
                </td>
            </tr>
         <?php endforeach; ?>
        </tbody>
        
        <tfoot>
            <tr>
            <td></td>
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
            <?= $form->field($model, 'project_description', ['template' => '{label}{input}<i>(Description should be not more than 300 words and must include specify which development phase is the involves innovation (i.e ideation/prototype/Commercialization /market testing)</i>{error}
            '])->textarea(['rows' => 12])?>
        </div>
    </div>

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
             I/We have read and agree to the Swiss Innovation Challenge Malaysia (SIC) 2021 Format, Rules and Regulations (link to the rules). I/We understand that SIC has the right to refuse my/our application if any non-conformance to the Rules and Regulations is found.
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">                    
            
        <?= $form->field($model, 'aggrement_disclaimer')->checkbox(['value' => '1', 'label'=> '<b>Agree</b>']); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Save as Draft', ['class' => 'btn btn-info', 'name' => 'btn-submit', 'value' => 0]) ?> 
         <?= Html::submitButton('<i class="fa fa-submit"></i> Submit Application', ['class' => 'btn btn-success', 'name' => 'btn-submit', 'value' => 10]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


