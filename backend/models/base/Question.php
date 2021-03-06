<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "question".
 *
 * @property integer $id
 * @property string $question
 * @property string $details
 * @property integer $subject_id
 * @property integer $exam_id
 *
 * @property \app\models\Answer[] $answers
 * @property \app\models\Exam $exam
 * @property \app\models\StudentAnswer[] $studentAnswers
 * @property \app\models\Subject $subject
 * @property string $aliasModel
 */
abstract class Question extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'subject_id', 'exam_id'], 'required'],
            [['question', 'details'], 'string'],
            [['subject_id', 'exam_id'], 'integer'],
            [['exam_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Exam::className(), 'targetAttribute' => ['exam_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Subject::className(), 'targetAttribute' => ['subject_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'question' => Yii::t('models', 'Question'),
            'details' => Yii::t('models', 'Details'),
            'subject_id' => Yii::t('models', 'Subject ID'),
            'exam_id' => Yii::t('models', 'Exam ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(\app\models\Answer::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExam()
    {
        return $this->hasOne(\app\models\Exam::className(), ['id' => 'exam_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentAnswers()
    {
        return $this->hasMany(\app\models\StudentAnswer::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(\app\models\Subject::className(), ['id' => 'subject_id']);
    }




}
