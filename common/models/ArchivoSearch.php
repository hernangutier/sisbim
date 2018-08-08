<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Archivo;

/**
 * ArchivoSearch represents the model behind the search form of `common\models\Archivo`.
 */
class ArchivoSearch extends Archivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipo_inmueble', 'id_user', 'id_mun','ano_in','id_ubic'], 'integer'],
            [['identificacion', 'ubicacion', 'nexp'], 'safe'],
            [['is_register'], 'boolean'],
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
        $query = Archivo::find();

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
            'tipo_inmueble' => $this->tipo_inmueble,
            'id_user' => $this->id_user,
            'id_mun' => $this->id_mun,
            'is_register' => $this->is_register,
            'ano_in' => $this->ano_in,
            'id_ubic'=>$this->id_ubic,
        ]);

        $query->andFilterWhere(['ilike', 'identificacion', $this->identificacion])
            ->andFilterWhere(['ilike', 'ubicacion', $this->ubicacion])
            ->andFilterWhere(['ilike', 'nexp', $this->nexp]);

        return $dataProvider;
    }
}
