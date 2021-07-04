<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estate".
 *
 * @property int $id
 * @property float $size
 * @property string|null $notes
 * @property int $area_id
 * @property int $client_id
 * @property int $land_type_id
 *
 * @property Area $area
 * @property Client $client
 * @property Landtype $landType
 */
class Estate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size', 'area_id', 'client_id', 'land_type_id'], 'required'],
            [['size'], 'number'],
            [['area_id', 'client_id', 'land_type_id'], 'integer'],
            [['notes'], 'string', 'max' => 255],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['land_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Landtype::className(), 'targetAttribute' => ['land_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Size',
            'notes' => 'Notes',
            'area_id' => 'Area ID',
            'client_id' => 'Client ID',
            'land_type_id' => 'Land Type ID',
        ];
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
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

    /**
     * Gets query for [[LandType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLandType()
    {
        return $this->hasOne(Landtype::className(), ['id' => 'land_type_id']);
    }
}
