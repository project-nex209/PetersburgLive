<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "token".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_excursion
 * @property string $date
 * @property int $countMan
 * @property int $countChildren
 * @property int $price
 *
 * @property Excursion $excursion
 * @property User $user
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_excursion', 'countMan', 'countChildren', 'price'], 'integer'],
            [['date'], 'safe'],
            [['id_excursion'], 'exist', 'skipOnError' => true, 'targetClass' => Excursion::className(), 'targetAttribute' => ['id_excursion' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_excursion' => 'Id Excursion',
            'date' => 'Date',
            'countMan' => 'Count Man',
            'countChildren' => 'Count Children',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExcursion()
    {
        return $this->hasOne(Excursion::className(), ['id' => 'id_excursion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
