<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "student".
 *
 * @property integer $id
 * @property string $student_code
 * @property string $first_name
 * @property string $last_name
 * @property integer $class_room_id
 *
 * @property \app\models\Absent[] $absents
 * @property \app\models\Activity[] $activities
 * @property \app\models\ClassRoom $classRoom
 * @property \app\models\StudentAnswer[] $studentAnswers
 * @property string $aliasModel
 */
abstract class Student extends \yii\db\ActiveRecord
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
            [['student_code', 'first_name', 'last_name', 'class_room_id'], 'required'],
            [['class_room_id'], 'integer'],
            [['student_code', 'first_name'], 'string', 'max' => 255],
            [['last_name'], 'string', 'max' => 45],
            [['class_room_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\ClassRoom::className(), 'targetAttribute' => ['class_room_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'student_code' => Yii::t('models', 'Student Code'),
            'first_name' => Yii::t('models', 'First Name'),
            'last_name' => Yii::t('models', 'Last Name'),
            'class_room_id' => Yii::t('models', 'Class Room ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsents()
    {
        return $this->hasMany(\app\models\Absent::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(\app\models\Activity::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassRoom()
    {
        return $this->hasOne(\app\models\ClassRoom::className(), ['id' => 'class_room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentAnswers()
    {
        return $this->hasMany(\app\models\StudentAnswer::className(), ['student_id' => 'id']);
    }




}
