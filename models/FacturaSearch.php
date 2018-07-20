<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Factura;

/**
 * FacturaSearch represents the model behind the search form of `app\models\Factura`.
 */
class FacturaSearch extends Factura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fac_id', 'cli_id', 'ped_id', 'cob_id'], 'integer'],
            [['fac_fecha'], 'safe'],
            [['fac_subtotal', 'fac_total', 'fac_iva'], 'number'],
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
        $query = Factura::find();

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
            'fac_id' => $this->fac_id,
            'fac_fecha' => $this->fac_fecha,
            'fac_subtotal' => $this->fac_subtotal,
            'fac_total' => $this->fac_total,
            'fac_iva' => $this->fac_iva,
            'cli_id' => $this->cli_id,
            'ped_id' => $this->ped_id,
            'cob_id' => $this->cob_id,
        ]);

        return $dataProvider;
    }
}
