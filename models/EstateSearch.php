<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estate;

/**
 * EstateSearch represents the model behind the search form of `app\models\Estate`.
 */
class EstateSearch extends Estate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'area_id', 'client_id', 'land_type_id'], 'integer'],
            [['size'], 'number'],
            [['notes'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Estate::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'size' => $this->size,
            'area_id' => $this->area_id,
            'client_id' => $this->client_id,
            'land_type_id' => $this->land_type_id,
        ]);

        $query->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
