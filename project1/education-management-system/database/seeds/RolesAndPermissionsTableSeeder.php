<?php

use Illuminate\Database\Seeder;
use App\RoleModel;
use App\PermissionModel;
use App\Product\DAO\RoleDAO;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $roledao;

    public function __construct(RoleDAO $roledao){
        $this->roledao = $roledao;
    }
    public function run()
    {
        $defaultRolesAndPermissions = Config::get('client.info')['defaultRolesAndPermissions'];
        $defaultRolesAndPermissions = collect($defaultRolesAndPermissions);

        $defaultRoles = $defaultRolesAndPermissions->keys();

//        $defaultPermissions = $defaultRolesAndPermissions->values()
//                                                        ->unique()
//                                                        ->reject(function($value,$key){
//                                                            return sizeof($value) == 0 || empty($value);
//                                                        })->unique();

        $defaultRoles->map(function($item, $key){
            $role = array();
            echo 'Adding Role: '.$item.PHP_EOL.PHP_EOL;
            $role['name'] = $item;
            $role['display_name'] = $item;
            $this->roledao->create($role);
        });

//        $defaultPermissions->map(function($item,$key){
//            $permission = array();
//            $permission['name'] = $item[0];
//            $permission['display_name'] = $item[0];
//            PermissionModel::create($permission);
//        });

    }
}