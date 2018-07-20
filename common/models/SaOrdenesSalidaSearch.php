<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SaOrdenesSalida;

/**
 * SaOrdenesSalidaSearch represents the model behind the search form of `common\models\SaOrdenesSalida`.
 */
class SaOrdenesSalidaSearch extends SaOrdenesSalida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'motivo', 'id_resp', 'status', 'id_user', 'max_dias'], 'integer'],
            [['motivo_descripcion', 'date_creation', 'ncontrol'], 'safe'],
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
        $query = SaOrdenesSalida::find();

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
            'motivo' => $this->motivo,
            'id_resp' => $this->id_resp,
            'date_creation' => $this->date_creation,
            'status' => $this->status,
            'id_user' => $this->id_user,
            'max_dias' => $this->max_dias,
        ]);

        $query->andFilterWhere(['ilike', 'motivo_descripcion', $this->motivo_descripcion])
            ->andFilterWhere(['ilike', 'ncontrol', $this->ncontrol]);

        return $dataProvider;
    }
}
