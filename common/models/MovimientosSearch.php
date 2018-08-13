<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Movimientos;

/**
 * MovimientosSearch represents the model behind the search form about `common\models\Movimientos`.
 */
class MovimientosSearch extends Movimientos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_und_origen', 'id_user', 'tipo', 'status', 'periodo', 'ano'], 'integer'],
            [['fecha', 'observaciones', 'ncontrol', 'fecha_process', 'fecha_creation'], 'safe'],
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
        $query = Movimientos::find()->orderBy(['(status)' => SORT_ASC]);

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
            'fecha' => $this->fecha,
            'id_und_origen' => $this->id_und_origen,

            'id_user' => $this->id_user,
            'tipo' => $this->tipo,
            'status' => $this->status,
            'periodo' => $this->periodo,
            'ano' => $this->ano,
            'fecha_process' => $this->fecha_process,
            'fecha_creation' => $this->fecha_creation,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'ncontrol', $this->ncontrol]);

        return $dataProvider;
    }
}
