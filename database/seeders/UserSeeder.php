<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\UserDetail;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['nama'=>'user'],
            ['nama'=>'admin']
        ];

        foreach($users as $key=>$row){

            $name = Str::slug($row['nama']);

            $role = Role::create([
                'name'=>$row['nama'],
                'guard_name'=>'web'
            ]);            

            $user = User::create([
                'name'=>$name,
                'email'=>$name.'@mail.com',
                'password'=>bcrypt('admin123'),
                'status'=>1
            ]);

            $userDetail = UserDetail::create([
                'user_id'=>$user->id,
                'date_birth'=>'1995-02-02',
                'address'=>'Pandeyan Ngemplak Boyolali, Jawa Tengah',
                'gender'=>1
            ]);

            $user->assignRole($row['nama']);
            
        }
    }
}
