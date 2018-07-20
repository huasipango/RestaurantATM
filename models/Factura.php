<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factura".
 *
 * @property int $fac_id id de Factura
 * @property string $fac_fecha Fecha de Factura
 * @property double $fac_subtotal Subtotal de Factura
 * @property double $fac_total Total a Pagar
 * @property double $fac_iva Iva de Factura
 * @property int $cli_id id de Cliente
 * @property int $ped_id id de Pedido
 * @property int $cob_id id Cobro
 *
 * @property Pedido $ped
 * @property Cliente $cli
 * @property Cobro $cob
 */
class Factura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fac_fecha', 'fac_subtotal', 'fac_total', 'fac_iva', 'cli_id', 'ped_id', 'cob_id'], 'required'],
            [['fac_fecha'], 'safe'],
            [['fac_subtotal', 'fac_total', 'fac_iva'], 'number'],
            [['cli_id', 'ped_id', 'cob_id'], 'integer'],
            [['ped_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['ped_id' => 'ped_id']],
            [['cli_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cli_id' => 'cli_id']],
            [['cob_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cobro::className(), 'targetAttribute' => ['cob_id' => 'cob_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fac_id' => 'id de Factura',
            'fac_fecha' => 'Fecha de Factura',
            'fac_subtotal' => 'Subtotal de Factura',
            'fac_total' => 'Total a Pagar',
            'fac_iva' => 'Iva de Factura',
            'cli_id' => 'id de Cliente',
            'ped_id' => 'id de Pedido',
            'cob_id' => 'id Cobro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPed()
    {
        return $this->hasOne(Pedido::className(), ['ped_id' => 'ped_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCli()
    {
        return $this->hasOne(Cliente::className(), ['cli_id' => 'cli_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCob()
    {
        return $this->hasOne(Cobro::className(), ['cob_id' => 'cob_id']);
    }
}
