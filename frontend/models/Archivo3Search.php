<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Archivo;

/**
 * Archivo3Search represents the model behind the search form of `common\models\Archivo`.
 */
class Archivo3Search extends Archivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipo_inmueble', 'id_user','id_mun'], 'integer'],
            [['identificacion', 'ubicacion', 'nexp'], 'safe'],
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
        ]);

        $query->andFilterWhere(['ilike', 'identificacion', $this->identificacion])
            ->andFilterWhere(['ilike', 'ubicacion', $this->ubicacion])

            ->andFilterWhere(['ilike', 'nexp', $this->nexp]);

        return $dataProvider;
    }
}
