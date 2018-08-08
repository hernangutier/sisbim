<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DivSemovientes;

/**
 * DivSemovientesSearch represents the model behind the search form of `common\models\DivSemovientes`.
 */
class DivSemovientesSearch extends DivSemovientes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_insp', 'categoria', 'is_auditado'], 'integer'],
            [['sexo', 'observaciones', 'date_creation', 'nbov'], 'safe'],
            [['is_herrado'], 'boolean'],
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
        $query = DivSemovientes::find();

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
            'id_insp' => $this->id_insp,
            'categoria' => $this->categoria,
            'is_herrado' => $this->is_herrado,
            'date_creation' => $this->date_creation,
            'is_auditado' => $this->is_auditado,
        ]);

        $query->andFilterWhere(['ilike', 'sexo', $this->sexo])
            ->andFilterWhere(['ilike', 'observaciones', $this->observaciones])
            ->andFilterWhere(['ilike', 'nbov', $this->nbov]);

        return $dataProvider;
    }
}
