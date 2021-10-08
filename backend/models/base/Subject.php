<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "subject".
 *
 * @property integer $id
 * @property string $title
 * @property integer $class_room_id
 * @property integer $teacher_id
 *
 * @property \app\models\Absent[] $absents
 * @property \app\models\ClassRoom $classRoom
 * @property \app\models\Exam[] $exams
 * @property \app\models\Question[] $questions
 * @property \app\models\User $teacher
 * @property string $aliasModel
 */
abstract class Subject extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'class_room_id', 'teacher_id'], 'required'],
            [['title'], 'string'],
            [['class_room_id', 'teacher_id'], 'integer'],
            [['class_room_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\ClassRoom::className(), 'targetAttribute' => ['class_room_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['teacher_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'title' => Yii::t('models', 'Title'),
            'class_room_id' => Yii::t('models', 'Class Room ID'),
            'teacher_id' => Yii::t('models', 'Teacher ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsents()
    {
        return $this->hasMany(\app\models\Absent::className(), ['subject_id' => 'id']);
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
    public function getExams()
    {
        return $this->hasMany(\app\models\Exam::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(\app\models\Question::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'teacher_id']);
    }




}