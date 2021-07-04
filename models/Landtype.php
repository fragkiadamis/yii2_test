<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landtype".
 *
 * @property int $id
 * @property string $name
 * @property string|null $notes
 * @property int $chargetype_id
 *
 * @property Estate[] $estates
 * @property Chargetype $chargetype
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
            [['name', 'chargetype_id'], 'required'],
            [['chargetype_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['notes'], 'string', 'max' => 255],
            [['chargetype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chargetype::className(), 'targetAttribute' => ['chargetype_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'notes' => 'Notes',
            'chargetype_id' => 'Chargetype ID',
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

    /**
     * Gets query for [[Chargetype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChargetype()
    {
        return $this->hasOne(Chargetype::className(), ['id' => 'chargetype_id']);
    }
}
