<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "student_answer".
 *
 * @property integer $id
 * @property integer $question_id
 * @property integer $answer_id
 * @property integer $student_id
 *
 * @property \app\models\Answer $answer
 * @property \app\models\Question $question
 * @property \app\models\Student $student
 * @property string $aliasModel
 */
abstract class StudentAnswer extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'answer_id', 'student_id'], 'required'],
            [['question_id', 'answer_id', 'student_id'], 'integer'],
            [['answer_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Answer::className(), 'targetAttribute' => ['answer_id' => 'id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Question::className(), 'targetAttribute' => ['question_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Student::className(), 'targetAttribute' => ['student_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'question_id' => Yii::t('models', 'Question ID'),
            'answer_id' => Yii::t('models', 'Answer ID'),
            'student_id' => Yii::t('models', 'Student ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswer()
    {
        return $this->hasOne(\app\models\Answer::className(), ['id' => 'answer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(\app\models\Question::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(\app\models\Student::className(), ['id' => 'student_id']);
    }




}
