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
   public $imageFile;
    

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
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['excursion', 'position','image'], 'string', 'max' => 255],
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
            'imageFile' => 'Image',
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
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('../../frontend/web/uploads/excursion/' . $this->id .'_'.  md5($this->imageFile->baseName) . '.' . $this->imageFile->extension);
            $this->image = '../../frontend/web/uploads/excursion/' . $this->id .'_'. md5($this->imageFile->baseName) . '.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }

}
