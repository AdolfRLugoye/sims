<?php

namespace app\modules\registration\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $student_id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $dob
 * @property string $phone
 * @property string $mobile
 * @property integer $parent_id
 * @property string $join_date
 * @property string $status
 * @property string $last_login
 *
 * @property Attendance[] $attendances
 * @property ClassroomStudent[] $classroomStudents
 * @property ExamResult[] $examResults
 * @property Parent $parent
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'parent_id'], 'required'],
            [['dob', 'join_date', 'last_login'], 'safe'],
            [['parent_id'], 'integer'],
            [['status'], 'string'],
            [['email', 'password'], 'string', 'max' => 100],
            [['first_name', 'middle_name', 'last_name', 'phone', 'mobile'], 'string', 'max' => 45],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parent::className(), 'targetAttribute' => ['parent_id' => 'parent_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'email' => 'Email',
            'password' => 'Password',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'parent_id' => 'Parent ID',
            'join_date' => 'Join Date',
            'status' => 'Status',
            'last_login' => 'Last Login',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassroomStudents()
    {
        return $this->hasMany(ClassroomStudent::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamResults()
    {
        return $this->hasMany(ExamResult::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Parent::className(), ['parent_id' => 'parent_id']);
    }
}
