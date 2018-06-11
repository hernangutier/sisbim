<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bienes;

/**
 * BienesSearch represents the model behind the search form about `app\models\Bienes`.
 */
class BienesSearch extends Bienes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_inc', 'dias_garantia', 'id_resp_directo', 'status', 'notasigned', 'isvehicle', 'id_vehicle', 'id_und_actual', 'isasigned', 'id_clas', 'id_user', 'operativo', 'tipobien', 'id_lin', 'pendientedesinc', 'aplicaiva', 'existe', 'id_cat', 'statusfisical', 'disponibilidad', 'mantenimiento', 'estado_uso', 'estado_fisico', 'activo','id_color'], 'integer'],
            [['codigo', 'serial', 'observacion', 'foto', 'descripcion', 'marca', 'fcreacion', 'localizacion', 'fdesinc', 'undmedida', 'foto1', 'old_cod', 'motivo_indisponibilidad'], 'safe'],
            [['costo'], 'number'],
            [['is_colectivo', 'is_in','is_custodia'], 'boolean'],
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
        $query = Bienes::find()->orderBy('codigo');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_inc' => $this->id_inc,
            'dias_garantia' => $this->dias_garantia,
            'id_resp_directo' => $this->id_resp_directo,
            'status' => $this->status,
            'costo' => $this->costo,
            'notasigned' => $this->notasigned,
            'isvehicle' => $this->isvehicle,
            'id_vehicle' => $this->id_vehicle,
            'id_und_actual' => $this->id_und_actual,
            'isasigned' => $this->isasigned,
            'id_clas' => $this->id_clas,
            'fcreacion' => $this->fcreacion,
            'id_user' => $this->id_user,
            'operativo' => $this->operativo,
            'tipobien' => $this->tipobien,
            'id_lin' => $this->id_lin,
            'fdesinc' => $this->fdesinc,
            'pendientedesinc' => $this->pendientedesinc,
            'aplicaiva' => $this->aplicaiva,
            'existe' => $this->existe,
            'id_cat' => $this->id_cat,
            'statusfisical' => $this->statusfisical,
            'disponibilidad' => $this->disponibilidad,
            'mantenimiento' => $this->mantenimiento,
            'estado_uso' => $this->estado_uso,
            'estado_fisico' => $this->estado_fisico,
            'activo' => $this->activo,
            'is_colectivo' => $this->is_colectivo,
            'is_in' => $this->is_in,
            'is_custodia'=>$this->is_custodia,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'localizacion', $this->localizacion])
            ->andFilterWhere(['like', 'undmedida', $this->undmedida])
            ->andFilterWhere(['like', 'foto1', $this->foto1])
            ->andFilterWhere(['like', 'old_cod',strtoupper($this->old_cod)])
            ->andFilterWhere(['like', 'motivo_indisponibilidad', $this->motivo_indisponibilidad]);

        return $dataProvider;
    }
}
