<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_log".
 *
 * @property int $id
 * @property string $email 邮箱
 * @property string $issuccess 是否成功
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'issuccess'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'issuccess' => 'Issuccess',
            'addtime' => 'Addtime'
        ];
    }
}
