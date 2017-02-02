<?php

namespace frontend\modules\vendor\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\vendor\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `frontend\modules\vendor\models\Products`.
 */
class ProductsSearch extends Products
{
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productId', 'vendorId', 'createdBy', 'updatedBy'], 'integer'],
            [['productCode', 'productName', 'branchId',  'categoryId','description', 'productStatus', 'cashOnDeliveryStatus', 'CashOnDeliveryPrice', 'productColor', 'sareeFabric', 'sareeType', 'sareeWork', 'sareeLength', 'blouseAvailable', 'blouseColor', 'blouseWork', 'blouseFabric', 'blouseSize', 'pettiCoat', 'occation', 'WashCare', 'createdDate', 'updatedDate', 'status'], 'safe'],
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
    		
    		$query = Products::find();
    	}
    	else {
    		
        $query = Products::find();
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
        $query->joinWith('branch');
        $query->joinWith('category');
        

        // grid filtering conditions
        $query->andFilterWhere([
            'productId' => $this->productId,
            //'vendorId' => $this->vendorId,
            //'branchId' => $this->branchId,
            //'categoryId' => $this->categoryId,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
            'createdDate' => $this->createdDate,
            'updatedDate' => $this->updatedDate,
        	'products.status' => $this->status,
        	//'branchName' => $this->branchName,
        		
        ]);

        $query->andFilterWhere(['like', 'productCode', $this->productCode])
            ->andFilterWhere(['like', 'productName', $this->productName])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'productStatus', $this->productStatus])
            ->andFilterWhere(['like', 'cashOnDeliveryStatus', $this->cashOnDeliveryStatus])
            ->andFilterWhere(['like', 'CashOnDeliveryPrice', $this->CashOnDeliveryPrice])
            ->andFilterWhere(['like', 'productColor', $this->productColor])
            ->andFilterWhere(['like', 'sareeFabric', $this->sareeFabric])
            ->andFilterWhere(['like', 'sareeType', $this->sareeType])
            ->andFilterWhere(['like', 'sareeWork', $this->sareeWork])
            ->andFilterWhere(['like', 'sareeLength', $this->sareeLength])
            ->andFilterWhere(['like', 'blouseAvailable', $this->blouseAvailable])
            ->andFilterWhere(['like', 'blouseColor', $this->blouseColor])
            ->andFilterWhere(['like', 'blouseWork', $this->blouseWork])
            ->andFilterWhere(['like', 'blouseFabric', $this->blouseFabric])
            ->andFilterWhere(['like', 'blouseSize', $this->blouseSize])
            ->andFilterWhere(['like', 'pettiCoat', $this->pettiCoat])
            ->andFilterWhere(['like', 'occation', $this->occation])
            ->andFilterWhere(['like', 'WashCare', $this->WashCare])
            ->andFilterWhere(['like', 'branches.branchName', $this->branchId])
            ->andFilterWhere(['like', 'categories.name', $this->categoryId])
            //->andFilterWhere(['like', 'branch.branchName', $this->branchName])
            ->andFilterWhere(['like', 'products.status', $this->status])
        ;
        

        return $dataProvider;
    }
}
