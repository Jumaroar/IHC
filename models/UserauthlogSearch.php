<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Userauthlog;

/**
 * UserauthlogSearch represents the model behind the search form about `app\models\Userauthlog`.
 */
class UserauthlogSearch extends Userauthlog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userId', 'cookieBased', 'duration'], 'integer'],
            [['date', 'error', 'ip', 'host', 'url', 'userAgent'], 'safe'],
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
        $query = Userauthlog::find();

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
            'userId' => $this->userId,
            'date' => $this->date,
            'cookieBased' => $this->cookieBased,
            'duration' => $this->duration,
        ]);

        $query->andFilterWhere(['like', 'error', $this->error])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'userAgent', $this->userAgent]);

        return $dataProvider;
    }
}
