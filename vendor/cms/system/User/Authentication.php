<?php
	namespace Cms\System\User;
	use \Cms\System\User\Models\User;

	class Authentication {

		public function getUser($user_id) {
			return User::find($user_id);
		}

		public function clear() {
			\Session::forget('user_login');
			\Session::forget('user_id');
		}

		public function check($email = null,$password = null,$setSession = false) {
			if( is_null($email) || is_null($password) ) { return false; }
			try {
				$user = User::where('email','like',$email)->firstOrFail();
				if( \Hash::check($password,$user->password) ) {
					if( $setSession ) {
						\Session::put('user_login',true);
						\Session::put('user_id',$user->user_id);
					}
					return true;
				} else {
					return false;
				}
			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
				return false;
			}
		}

		public function isLoggedIn() {
			if( \Session::has('user_login') && \Session::get('user_login') === true ) {
				return true;
			} else {
				return false;
			}
		}






	}