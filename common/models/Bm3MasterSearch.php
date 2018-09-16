<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bm3Master;

/**
 * Bm3MasterSearch represents the model behind the search form of `common\models\Bm3Master`.
 */
class Bm3MasterSearch extends Bm3Master
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_periodo', 'id_user', 'ncontrol'], 'integer'],
            [['date_creation', 'date_close', 'date_ini', 'observaciones'], 'safe'],
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
        $query = Bm3Master::find();

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
            'date_creation' => $this->date_creation,
            'date_close' => $this->date_close,
            'date_ini' => $this->date_ini,
            'id_periodo' => $this->id_periodo,
            'id_user' => $this->id_user,
            'ncontrol' => $this->ncontrol,
        ]);

        $query->andFilterWhere(['ilike', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
