<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property float $amount
 * @property int $receiptNumber
 * @property string $transaction_date
 * @property int $client_id
 * @property int $charge_type_id
 *
 * @property Chargetype $chargeType
 * @property Client $client
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'receiptNumber', 'client_id', 'charge_type_id'], 'required'],
            [['amount'], 'number'],
            [['receiptNumber', 'client_id', 'charge_type_id'], 'integer'],
            [['transaction_date'], 'safe'],
            [['receiptNumber'], 'unique'],
            [['charge_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chargetype::className(), 'targetAttribute' => ['charge_type_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'receiptNumber' => 'Receipt Number',
            'transaction_date' => 'Transaction Date',
            'client_id' => 'Client',
            'charge_type_id' => 'Charge Type',
        ];
    }

    /**
     * Gets query for [[ChargeType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChargeType()
    {
        return $this->hasOne(Chargetype::className(), ['id' => 'charge_type_id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }
}
