<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\GvPolizas;

/**
 * GvPolizasSearch represents the model behind the search form of `common\models\GvPolizas`.
 */
class GvPolizasSearch extends GvPolizas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_aseguradora', 'moneda', 'tipo_cobertura', 'id_bien', 'id', 'status', 'id_user'], 'integer'],
            [['otra_aseguradora', 'npoliza', 'tipo', 'especifique_moneda', 'f_ini', 'f_fin', 'resp_civil', 'especifique_tipo_cobertura', 'descripcion_cobertura', 'observaciones', 'f_nulls'], 'safe'],
            [['monto'], 'number'],
            [['active'], 'boolean'],
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
        $query = GvPolizas::find();

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
            'id_aseguradora' => $this->id_aseguradora,
            'monto' => $this->monto,
            'moneda' => $this->moneda,
            'f_ini' => $this->f_ini,
            'f_fin' => $this->f_fin,
            'tipo_cobertura' => $this->tipo_cobertura,
            'id_bien' => $this->id_bien,
            'active' => $this->active,
            'id' => $this->id,
            'f_nulls' => $this->f_nulls,
            'status' => $this->status,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['ilike', 'otra_aseguradora', $this->otra_aseguradora])
            ->andFilterWhere(['ilike', 'npoliza', $this->npoliza])
            ->andFilterWhere(['ilike', 'tipo', $this->tipo])
            ->andFilterWhere(['ilike', 'especifique_moneda', $this->especifique_moneda])
            ->andFilterWhere(['ilike', 'resp_civil', $this->resp_civil])
            ->andFilterWhere(['ilike', 'especifique_tipo_cobertura', $this->especifique_tipo_cobertura])
            ->andFilterWhere(['ilike', 'descripcion_cobertura', $this->descripcion_cobertura])
            ->andFilterWhere(['ilike', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
