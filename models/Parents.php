<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parent".
 *
 * @property integer $parent_id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $dob
 * @property string $mobile
 * @property string $status
 * @property string $last_login
 *
 * @property Student[] $students
 */
class Parents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name'], 'required'],
            [['dob', 'last_login'], 'safe'],
            [['status'], 'string'],
            [['email', 'password', 'first_name', 'last_name'], 'string', 'max' => 45],
            [['mobile'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent_id' => 'Parent ID',
            'email' => 'Email',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'dob' => 'Dob',
            'mobile' => 'Mobile',
            'status' => 'Status',
            'last_login' => 'Last Login',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['parent_id' => 'parent_id']);
    }
}
