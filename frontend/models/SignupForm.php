<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $date;
    public $phone;
    public $photo;
    public $photoFile;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email занят'],
            [['photoFile'], 'file', 'extensions' => 'png, jpg'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['date', 'required'],

            ['phone', 'required'],
    ];
  }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->date = $this->date;
        $user->phone = $this->phone;
        //$user->photo = $this->photo;
        $user->photoFile = $this->photoFile->saveAs('uploads/user/' . $this->id .'_'. md5($this->photoFile->baseName) . '.' . $this->photoFile->extension);
        $user->photo = 'uploads/user/' . $this->id .'_'. md5($this->photoFile->baseName) . '.' . $this->photoFile->extension;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
    
}
