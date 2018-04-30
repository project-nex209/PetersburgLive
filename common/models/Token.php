<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "token".
 *
 * @property int $id
 * @property int $id_user
 * @property string $excursion
 * @property string $date
 * @property int $countMan
 * @property int $countChildren
 * @property int $price
 *
 * @property Excursion $excursion0
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
            [['id_user', 'countMan', 'countChildren', 'price'], 'integer'],
            [['id_user'], 'default', 'value' => Yii::$app->user->identity->id],
            [['date'], 'safe'],
            [['excursion'], 'string', 'max' => 255],
            [['excursion'], 'exist', 'skipOnError' => true, 'targetClass' => Excursion::className(), 'targetAttribute' => ['excursion' => 'excursion']],
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
            'excursion' => 'Excursion',
            'date' => 'Date',
            'countMan' => 'Count Man',
            'countChildren' => 'Count Children',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExcursion0()
    {
        return $this->hasOne(Excursion::className(), ['excursion' => 'excursion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
