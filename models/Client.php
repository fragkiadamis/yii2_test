<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property int $vatNumber
 * @property string $taxOffice
 * @property string $address
 * @property string $telephone
 * @property string $idNumber
 * @property string $protocolNumber
 *
 * @property Estate[] $estates
 * @property Transaction[] $transactions
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'vatNumber', 'taxOffice', 'address', 'telephone', 'idNumber', 'protocolNumber'], 'required'],
            [['vatNumber'], 'integer'],
            [['firstName', 'lastName', 'taxOffice', 'address', 'telephone', 'idNumber', 'protocolNumber'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'vatNumber' => 'Vat Number',
            'taxOffice' => 'Tax Office',
            'address' => 'Address',
            'telephone' => 'Telephone',
            'idNumber' => 'Id Number',
            'protocolNumber' => 'Protocol Number',
        ];
    }

    /**
     * Gets query for [[Estates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstates()
    {
        return $this->hasMany(Estate::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Transactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['client_id' => 'id']);
    }
}
