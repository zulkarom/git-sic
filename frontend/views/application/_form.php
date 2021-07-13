<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Common;
use kartik\checkbox\CheckboxX;
use backend\models\Countries;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model backend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'category')->checkboxList(
                Common::category(), ['custom' => true, 'inline' => true, 'id' => 'custom-checkbox-list-inline'])->label('Choose Your Category') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'applicant_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nationality') ->dropDownList(
                ArrayHelper::map(Countries::find()->all(),'id', 'country_enName'), ['prompt' => 'Please Select' ]
            ) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'ic_number')->textInput()?>
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
            <?= $form->field($model, 'logo_file')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'logo_file')->textInput(['maxlength' => true]) ?>
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
            'product_id',
            'description',
            'price',
            'quantity'
        ],
    ]); ?>
    
    
   <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%"></th>
                <th>No.</th>
                <th>NAME AND DESIGNATION (PROJECT LEADER / TEAM MEMBER)</th>
                <th>IDEN. DOC./ PASSPORT NO.</th>
                <th>INSTITUTION/BUSINESS NAME</th>
                <th>
                 MOBILE NO.   
                </th>
                <th>
                 EMAIL   
                </th>
                <th>   
                </th>
            </tr>
        </thead>
        <tbody class="container-items">
        <?php foreach ($items as $indexItem => $item): ?>
            <tr class="row-item">
                <td class="sortable-handle text-center vcenter" style="cursor: move;">
                        <i class="fas fa-arrows-alt"></i>
                    </td>
            
                <td class="vcenter">
                    <?php
                        // necessary for update action.
                        if (! $item->isNewRecord) {
                            echo Html::activeHiddenInput($item, "[{$indexItem}]id");
                        }
                    ?>
                </td>

                
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
    <div class="form-group">
        <?= Html::submitButton('Save Application', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
