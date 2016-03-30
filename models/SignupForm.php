<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;
/* 
 * SignupForm
 */

Class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    
     /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        
            'username' => Yii::t('app','Username'),
            'password' => Yii::t('app','Password'),
            'password_repeat' => Yii::t('app','Repeat Password'),
            'email' => Yii::t('app','Email'),
            'displayname' => Yii::t('app','Display Name'),
           
        ];
    }
    
     /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            ['username', 'filter','filter'=> 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass'=>'app\models\User','message'=>Yii::t('app','This username has been used')],
            // email has to be a valid email address
            ['email', 'email'],
            ['email', 'filter', 'filter'=>'trim'],
        ];
    }
    
    public function signup()
    {
         if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->created_at=  strtotime(date('Y-m-d H:i:s'));
        $user->updated_at=  strtotime(date('Y-m-d H:i:s'));
        
        return $user->save() ? $user : null;
    }
}