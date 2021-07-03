<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class RegisterClientForm extends Model
{
    public $firstName;
    public $lastName;
    public $vatNumber;
    public $taxOffice;
    public $address;
    public $telephone;
    public $idNumber;
    public $protocolNumber;

    public function rules()
    {
        return [
            [['firstName', 'lastName', 'vatNumber', 'taxOffice', 'address', 'telephone', 'idNumber', 'protocolNumber'], 'required'],
            [['firstName', 'lastName', 'taxOffice', 'address', 'telephone', 'idNumber', 'protocolNumber'], 'string'],
            ['vatNumber', 'number'],
        ];
    }

    public function registerClient()
    {
        $client = new Client();
        $client->firstName = $this->firstName;
        $client->lastName = $this->lastName;
        $client->vatNumber = $this->vatNumber;
        $client->taxOffice = $this->taxOffice;
        $client->address = $this->address;
        $client->telephone = $this->telephone;
        $client->idNumber = $this->idNumber;
        $client->protocolNumber = $this->protocolNumber;

        if($client->save())
            return true;
        else {
            \Yii::error("User was not saved. ". VarDumper::dumpAsString($client->errors));
            return false; 
        }
    }
}