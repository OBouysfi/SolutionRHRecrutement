<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApiSeeder extends Seeder
{
    public function run()
    {
        $apis = [
            [
                'name' => 'API : 1024HK',
                'system_name' => 'Paychex',
                'type' => 'SIRH',
                'connection_port' => '443',
                'protocol' => 'HTTPS',
                'access_identifier' => 'admin',
                'access_password' => bcrypt('password123'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-1.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1025HK',
                'system_name' => 'SAP HR',
                'type' => 'ERP',
                'connection_port' => '8080',
                'protocol' => 'HTTPS',
                'access_identifier' => 'admin_hr',
                'access_password' => bcrypt('securepass'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-2.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1026HK',
                'system_name' => 'Workday',
                'type' => 'SIRH',
                'connection_port' => '443',
                'protocol' => 'HTTPS',
                'access_identifier' => 'wd_admin',
                'access_password' => bcrypt('workdaysecure'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-3.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1027HK',
                'system_name' => 'Oracle HR',
                'type' => 'ERP',
                'connection_port' => '1521',
                'protocol' => 'HTTPS',
                'access_identifier' => 'oracle_admin',
                'access_password' => bcrypt('oraclehrsecure'),
                'api_token' => null,
                'status' => 0,
                'image_path' => 'assets/img/icon/api-4.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1028HK',
                'system_name' => 'SuccessFactors',
                'type' => 'SIRH',
                'connection_port' => '443',
                'protocol' => 'HTTPS',
                'access_identifier' => 'sf_admin',
                'access_password' => bcrypt('sfsecurepass'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-5.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1029HK',
                'system_name' => 'BambooHR',
                'type' => 'SIRH',
                'connection_port' => '443',
                'protocol' => 'HTTPS',
                'access_identifier' => 'bamboo_admin',
                'access_password' => bcrypt('bamboo123'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-6.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1030HK',
                'system_name' => 'ADP',
                'type' => 'ERP',
                'connection_port' => '1443',
                'protocol' => 'HTTPS',
                'access_identifier' => 'adp_hr',
                'access_password' => bcrypt('adpsecure'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-7.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1031HK',
                'system_name' => 'Kronos Workforce',
                'type' => 'SIRH',
                'connection_port' => '443',
                'protocol' => 'HTTPS',
                'access_identifier' => 'kronos_admin',
                'access_password' => bcrypt('kronossecure'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-8.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1032HK',
                'system_name' => 'UKG Pro',
                'type' => 'SIRH',
                'connection_port' => '443',
                'protocol' => 'HTTPS',
                'access_identifier' => 'ukg_admin',
                'access_password' => bcrypt('ukgsecure'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-9.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API : 1033HK',
                'system_name' => 'Zenefits',
                'type' => 'SIRH',
                'connection_port' => '443',
                'protocol' => 'HTTPS',
                'access_identifier' => 'zen_admin',
                'access_password' => bcrypt('zenefitssecure'),
                'api_token' => null,
                'status' => 1,
                'image_path' => 'assets/img/icon/api-10.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('apis')->insert($apis);
    }
}
