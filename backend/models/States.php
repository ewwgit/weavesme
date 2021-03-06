<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "states".
 *
 * @property integer $id
 * @property string $name
 * @property integer $country_id
 */
class States extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['country_id'], 'integer'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'country_id' => 'Country ID',
        ];
    }
    public static function getStateId($stateName)
    {
    	$statesModel = States::find()->select(['id'])->asArray()->where(['name'=>$stateName])
    	->one();
    	return $statesModel['id'];
    }
    public static function getStateName($stateId)
    {
    	$statesModel = States::find()->select(['name'])->asArray()->where(['id'=>$stateId])
    	->one();
    	return $statesModel['name'];
    }
}
