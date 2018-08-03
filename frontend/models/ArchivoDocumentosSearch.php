<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ArchivoDocumentos;

/**
 * ArchivoDocumentos3Search represents the model behind the search form of `frontend\models\ArchivoDocumentos`.
 */
class ArchivoDocumentosSearch extends ArchivoDocumentos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipo', 'ano_ejecucion', 'id_archivo'], 'integer'],
            [['monto'], 'number'],
            [['datos_registro'], 'safe'],
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
        $query = ArchivoDocumentos::find();

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
            'ano_ejecucion' => $this->ano_ejecucion,
            'monto' => $this->monto,
            'id_archivo' => $this->id_archivo,
        ]);

        $query->andFilterWhere(['ilike', 'datos_registro', $this->datos_registro]);

        return $dataProvider;
    }
}
