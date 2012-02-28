<?php

class Eyeem_User extends Eyeem_Ressource
{

  public static $name = 'user';

  public static $endpoint = '/users/{id}';

  public static $properties = array(
    'id',
    'fullname', 'nickname', 'description',
    'thumbUrl', 'photoUrl',
    'totalPhotos', 'totalFollowers', 'totalFriends', 'totalLikedAlbums'
  );

  public static $collections = array(
    'photos' => 'photo',
    'friends' => 'user',
    'followers' => 'user',
    'likedAlbums' => 'album',
    'likedPhotos' => 'photo',
    'friendsPhotos' => 'photo',
    'feed' => 'album'
  );

  public function getCacheKey()
  {
    if (empty($this->id)) {
      throw new Exception("Unknown id.");
    }
    $id = $this->id == 'me' ? $this->getEyeem()->getAccessToken() : $this->id;
    $updated = $this->getUpdated('U');
    return static::$name . '_' . $id . ($updated ? '_' . $updated : '');
  }

}