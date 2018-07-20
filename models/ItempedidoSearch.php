<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Itempedido;

/**
 * ItempedidoSearch represents the model behind the search form of `app\models\Itempedido`.
 */
class ItempedidoSearch extends Itempedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ite_id', 'ite_cantidad', 'ped_id', 'pro_id'], 'integer'],
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
        $query = Itempedido::find();

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
            'ite_id' => $this->ite_id,
            'ite_cantidad' => $this->ite_cantidad,
            'ped_id' => $this->ped_id,
            'pro_id' => $this->pro_id,
        ]);

        return $dataProvider;
    }
}
