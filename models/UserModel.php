<?php

namespace app\models;

use yii2mod\user\models\UserModel as BaseUserModel;

class UserModel extends BaseUserModel
{
    public function getFavorites()
    {
        return $this->hasMany(Favorites::class, ['user_id' => 'id']);
    }

    public function getFavoriteParts()
    {
        return $this->hasMany(Part::class, ['id' => 'part_id'])
            ->via('favorites');
    }

    public function getUserTrailer()
    {
        return $this->hasMany(UserTrailer::class, ['user_id' => 'id']);
    }

    public function getTrailers()
    {
        return $this->hasMany(Trailer::class, ['id' => 'trailer_id'])
            ->via('userTrailer');
    }
}
