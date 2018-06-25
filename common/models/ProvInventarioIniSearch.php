<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProvInventarioIni;

/**
 * ProvInventarioIniSearch represents the model behind the search form of `common\models\ProvInventarioIni`.
 */
class ProvInventarioIniSearch extends ProvInventarioIni
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['fecha_creation', 'fecha_cierre', 'motivo'], 'safe'],
            [['status'], 'boolean'],
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
        $query = ProvInventarioIni::find();

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
            'id_user' => $this->id_user,
            'fecha_creation' => $this->fecha_creation,
            'fecha_cierre' => $this->fecha_cierre,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['ilike', 'motivo', $this->motivo]);

        return $dataProvider;
    }
}
