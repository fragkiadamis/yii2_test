<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landtype".
 *
 * @property int $id
 * @property string $name
 * @property string|null $notes
 * @property float $charge
 * @property string $state
 *
 * @property Estate[] $estates
 */
class Landtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'landtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'charge', 'state'], 'required'],
            [['charge'], 'number'],
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
            'name' => 'Land Type Name',
            'notes' => 'Notes',
            'charge' => 'Charge',
            'state' => 'State',
        ];
    }

    /**
     * Gets query for [[Estates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstates()
    {
        return $this->hasMany(Estate::className(), ['land_type_id' => 'id']);
    }
}
