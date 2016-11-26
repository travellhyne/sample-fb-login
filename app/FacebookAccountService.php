<?php

namespace App;

use Laravel\Socialite\Contracts\User as FacebookUser;

class FacebookAccountService {
  public function createOrGetUser(FacebookUser $facebookUser)
  {
    $fb_account = FacebookAccount::where('facebook_user_id', $facebookUser->getId())
      ->first();

    if ($fb_account) {
      return $fb_account->user;
    } else {
      $fb_account = new FacebookAccount([
        'facebook_user_id' => $facebookUser->getId(),
      ]);

      $user = User::where('email', $facebookUser->getEmail())->first();

      if (!$user) {
        $user = User::create([
          'email' => $facebookUser->getEmail(),
          'name' => $facebookUser->getName(),
          'password' => bcrypt($facebookUser->getEmail()),
        ]);
      }

      $fb_account->user()->associate($user);
      $fb_account->save();
      return $user;
    }
  }
}
