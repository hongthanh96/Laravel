<?php
    namespace App\Repositories;

use App\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{
        public function all(){
            $users = User::select('users.*','userinformations.phone','userinformations.image','userinformations.block','userinformations.role')
                    ->join('userinformations','users.id','=','userinformations.user_id')
                    ->get();
            return $users;
        }
    }
?>
