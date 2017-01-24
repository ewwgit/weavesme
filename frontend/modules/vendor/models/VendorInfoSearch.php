<?php

namespace frontend\modules\vendor\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\vendor\models\VendorInfo;

/**
 * VendorInfoSearch represents the model behind the search form about `frontend\modules\vendor\models\VendorInfo`.
 */
class VendorInfoSearch extends VendorInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendorInfoId', 'vendorId', 'createdBy', 'updatedBy'], 'integer'],
            [['firstName', 'lastName', 'telephone', 'mobile', 'fax', 'createdDate', 'updatedDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
    	if(isset($params['searchnewType']) && ($params['searchnewType'] == 'vendor'))
    	{
    		$query = VendorInfo::find()->where(['vendorId' => Yii::$app->user->id]);
    	}
    	else {
        $query = VendorInfo::find();
    	}

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'vendorInfoId' => $this->vendorInfoId,
            'vendorId' => $this->vendorId,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
            'createdDate' => $this->createdDate,
            'updatedDate' => $this->updatedDate,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'fax', $this->fax]);

        return $dataProvider;
    }
}
