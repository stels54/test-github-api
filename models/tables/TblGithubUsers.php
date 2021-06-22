<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tbl_github_users".
 *
 * @property int $id
 * @property string $login
 * @property string|null $avatar_url
 * @property string|null $html_url
 * @property string|null $name
 * @property string|null $location
 * @property string $created_at
 *
 * @property TblRepositories[] $tblRepositories
 */
class TblGithubUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_github_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login'], 'required'],
            [['created_at'], 'safe'],
            [['login', 'avatar_url', 'html_url', 'name', 'location'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'avatar_url' => 'Avatar Url',
            'html_url' => 'Html Url',
            'name' => 'Name',
            'location' => 'Location',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[TblRepositories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblRepositories()
    {
        return $this->hasMany(TblRepositories::className(), ['user_id' => 'id']);
    }
}
