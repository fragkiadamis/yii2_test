<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $id
 * @property string $name
 * @property string|null $notes
 * @property int $state
 *
 * @property Estate[] $estates
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'state'], 'required'],
            [['state'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['notes'], 'string', 'max' => 255],
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
        return $this->hasMany(Estate::className(), ['area_id' => 'id']);
    }
}