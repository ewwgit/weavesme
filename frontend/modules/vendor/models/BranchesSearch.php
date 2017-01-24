<?php

namespace frontend\modules\vendor\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\vendor\models\Branches;

/**
 * BranchesSearch represents the model behind the search form about `frontend\modules\vendor\models\Branches`.
 */
class BranchesSearch extends Branches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branchId', 'vendorId', 'city', 'state', 'country'], 'integer'],
            [['branchName', 'address1', 'address2', 'postalCode', 'aboutShop', 'status'], 'safe'],
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
    		$query = Branches::find()->where(['vendorId' => Yii::$app->user->id]);
    	}
    	else {
        $query = Branches::find();
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
            'branchId' => $this->branchId,
            'vendorId' => $this->vendorId,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
        ]);

        $query->andFilterWhere(['like', 'branchName', $this->branchName])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'postalCode', $this->postalCode])
            ->andFilterWhere(['like', 'aboutShop', $this->aboutShop])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
