<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DivBienes;

/**
 * DivBienesSearch represents the model behind the search form of `common\models\DivBienes`.
 */
class DivBienesSearch extends DivBienes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipo', 'id_insp'], 'integer'],
            [['ref', 'serial_carroceria', 'serial_motor', 'placa', 'descripcion', 'observacion'], 'safe'],
            [['is_operativo'], 'boolean'],
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
        $query = DivBienes::find();

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
            'tipo' => $this->tipo,
            'is_operativo' => $this->is_operativo,
            'id_insp' => $this->id_insp,
        ]);

        $query->andFilterWhere(['ilike', 'ref', $this->ref])
            ->andFilterWhere(['ilike', 'serial_carroceria', $this->serial_carroceria])
            ->andFilterWhere(['ilike', 'serial_motor', $this->serial_motor])
            ->andFilterWhere(['ilike', 'placa', $this->placa])
            ->andFilterWhere(['ilike', 'descripcion', $this->descripcion])
            ->andFilterWhere(['ilike', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
