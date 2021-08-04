<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $cat_name
 * @property string|null $age
 * @property string|null $biz_operation
 * @property string|null $scope
 * @property string|null $prototype
 * @property string|null $group_member
 * @property string|null $reg_fee
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_name', 'age', 'biz_operation', 'scope', 'prototype', 'group_member', 'reg_fee'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => 'Cat Name',
            'age' => 'AGE',
            'biz_operation' => 'BUSINESS OPERATION',
            'scope' => 'SCOPE',
            'prototype' => 'PROTOTYPE',
            'group_member' => 'TEAM MEMBER',
            'reg_fee' => 'REGISTRATION FEE',
        ];
    }
    
    public function sorting(){
        return ['age', 'biz_operation', 'group_member', 'scope', 'prototype', 'reg_fee'];
    }
    
    public function getCategoryFees(){
        return $this->cat_name . ' | Fee: ' . $this->reg_fee ;
    }
}
