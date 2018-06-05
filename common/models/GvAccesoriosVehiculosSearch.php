<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\GvAccesoriosVehiculos;

/**
 * GvAccesoriosVehiculosSearch represents the model behind the search form of `common\models\GvAccesoriosVehiculos`.
 */
class GvAccesoriosVehiculosSearch extends GvAccesoriosVehiculos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_veh'], 'integer'],
            [['descripcion', 'serial'], 'safe'],
            [['en_uso'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = GvAccesoriosVehiculos::find();

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
            'id_veh' => $this->id_veh,
            'en_uso' => $this->en_uso,
        ]);

        $query->andFilterWhere(['ilike', 'descripcion', $this->descripcion])
            ->andFilterWhere(['ilike', 'serial', $this->serial]);

        return $dataProvider;
    }
}
