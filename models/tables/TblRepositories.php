<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tbl_repositories".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $html_url
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property TblGithubUsers $user
 */
class TblRepositories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_repositories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['html_url'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblGithubUsers::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'html_url' => 'Html Url',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(TblGithubUsers::className(), ['id' => 'user_id']);
    }
}
