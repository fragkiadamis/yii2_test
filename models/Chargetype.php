<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chargetype".
 *
 * @property int $id
 * @property string $name
 * @property string|null $notes
 * @property float $amount
 * @property string $state
 *
 * @property Transaction[] $transactions
 */
class Chargetype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chargetype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'amount', 'state'], 'required'],
            [['amount'], 'number'],
            [['name'], 'string', 'max' => 45],
            [['notes'], 'string', 'max' => 255],
            [['state'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Charge Type Name',
            'notes' => 'Notes',
            'amount' => 'Amount',
            'state' => 'State',
        ];
    }

    /**
     * Gets query for [[Transactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['charge_type_id' => 'id']);
    }
}
