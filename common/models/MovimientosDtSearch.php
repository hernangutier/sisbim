<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MovimientosDt;

/**
 * MovimientosDtSearch represents the model behind the search form about `common\models\MovimientosDt`.
 */
class MovimientosDtSearch extends MovimientosDt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_bien', 'id_mov', 'id_user_old', 'id_user_new', 'estado_uso', 'estado_fisico', 'id_und_destino'], 'integer'],
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
        $query = MovimientosDt::find();

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
            'id_bien' => $this->id_bien,
            'id_mov' => $this->id_mov,
            'id_user_old' => $this->id_user_old,
            'id_user_new' => $this->id_user_new,
            'estado_uso' => $this->estado_uso,
            'estado_fisico' => $this->estado_fisico,
            'id_und_destino' => $this->id_und_destino,
        ]);

        return $dataProvider;
    }
}
