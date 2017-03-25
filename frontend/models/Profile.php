<?php

namespace frontend\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $age
 * @property resource $pic
 * @property string $jop
 * @property integer $status_id
 * @property integer $root1
 * @property integer $root2
 * @property integer $active
 *
 * @property Comment[] $comments
 * @property Event[] $events
 * @property Group[] $groups
 * @property LikeComment[] $likeComments
 * @property LikePost[] $likePosts
 * @property Message[] $messages
 * @property Message[] $messages0
 * @property Post[] $posts
 * @property User $user
 * @property Profile $root10
 * @property Profile[] $profiles
 * @property Profile $root20
 * @property Profile[] $profiles0
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $file;
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'age', 'pic', 'jop', 'status_id', 'active'], 'required'],
            [['user_id', 'age','status_id', 'root1', 'root2', 'active'], 'integer'],
            [['pic'], 'file','extensions'=>'png ,jpg, gif'],
            [['jop'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'age' => 'Age',
            'file' => 'Profile Picture',
            'jop' => 'Jop',
            'status_id' => 'Status',
            'root1' => 'Root1',
            'root2' => 'Root2',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikeComments()
    {
        return $this->hasMany(LikeComment::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikePosts()
    {
        return $this->hasMany(LikePost::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['recipent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages0()
    {
        return $this->hasMany(Message::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoot10()
    {
        return $this->hasOne(Profile::className(), ['id' => 'root1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['root1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoot20()
    {
        return $this->hasOne(Profile::className(), ['id' => 'root2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles0()
    {
        return $this->hasMany(Profile::className(), ['root2' => 'id']);
    }
}
