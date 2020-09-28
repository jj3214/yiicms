<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_subscription".
 *
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $institution
 * @property string $country
 * @property string $create_time
 */
class Subscription extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_subscription';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_time'], 'safe'],
            [['username', 'email', 'country'], 'string', 'max' => 128],
            [['institution'], 'string', 'max' => 512],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'institution' => 'Institution',
            'country' => 'Country',
            'create_time' => 'Create Time',
        ];
    }
}
