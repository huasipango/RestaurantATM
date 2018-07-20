<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itempedido".
 *
 * @property int $ite_id id de Item Pedido
 * @property int $ite_cantidad Cantidad de Item Pedido
 * @property int $ped_id id de Pedido
 * @property int $pro_id id de Producto
 *
 * @property Producto $pro
 * @property Pedido $ped
 */
class Itempedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'itempedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ite_cantidad', 'ped_id', 'pro_id'], 'required'],
            [['ite_cantidad', 'ped_id', 'pro_id'], 'integer'],
            [['pro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['pro_id' => 'pro_id']],
            [['ped_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['ped_id' => 'ped_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ite_id' => 'id de Item Pedido',
            'ite_cantidad' => 'Cantidad de Item Pedido',
            'ped_id' => 'id de Pedido',
            'pro_id' => 'id de Producto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPro()
    {
        return $this->hasOne(Producto::className(), ['pro_id' => 'pro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPed()
    {
        return $this->hasOne(Pedido::className(), ['ped_id' => 'ped_id']);
    }
}
