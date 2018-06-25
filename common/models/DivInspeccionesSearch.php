<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DivInspecciones;

/**
 * DivInspeccionesSearch represents the model behind the search form of `common\models\DivInspecciones`.
 */
class DivInspeccionesSearch extends DivInspecciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'id_user'], 'integer'],
            [['ncontrol', 'descripcion', 'f_ini', 'f_fin'], 'safe'],
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
        $query = DivInspecciones::find();

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
            'f_ini' => $this->f_ini,
            'f_fin' => $this->f_fin,
            'status' => $this->status,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['ilike', 'ncontrol', $this->ncontrol])
            ->andFilterWhere(['ilike', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
