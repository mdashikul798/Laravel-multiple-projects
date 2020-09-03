<?php
namespace App\Helpers;
use App\User;
use App\Helpers\GravatarHelper;
/**
 * 
 */
class ImgHelper
{
	
	public static function getUserImg($id){
		$user = User::find($id);

		$avatar_url = '';
		if(!is_null($user)){
			if($user->avatar == null){
				if(GravatarHelper::validate_gravatar($user->email)){
					$avatar_url = GravatarHelper::gravatar_img($user->email, 80);
				}else{
					$avatar_url = url('asset/admin/images/admin.jpg');
				}
			}else{
				$avatar_url = url('asset/admin/images/users' . $user->avatar);
			}
		}else{
			return redirect('/');
		}
		return $avatar_url;
	}
}