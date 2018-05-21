<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "excursion".
 *
 * @property int $id
 * @property string $excursion
 * @property string $position
 * @property int $priceMan
 * @property int $priceChildren
 *
 * @property Token[] $tokens
 */
class Excursion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'excursion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['priceMan', 'priceChildren'], 'integer'],
            [['excursion', 'position'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'excursion' => 'Excursion',
            'position' => 'Position',
            'priceMan' => 'Price Man',
            'priceChildren' => 'Price Children',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Token::className(), ['id_excursion' => 'id']);
    }
}
