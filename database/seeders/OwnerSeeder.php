<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        $owners = [
            [
                'owner_name' => 'Sheriffo Ceesay',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB123456',
                'dob' => '1985-04-12',
                'phone' => '2201234567',
                'email' => 'sheriffo.ceesay@example.com',
                'address' => 'Kairaba Avenue, Serrekunda',
            ],
            [
                'owner_name' => 'Fatou Camara',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB234567',
                'dob' => '1990-07-21',
                'phone' => '2202345678',
                'email' => 'fatou.camara@example.com',
                'address' => 'Bertil Harding Highway, Bakau',
            ],
            [
                'owner_name' => 'Lamin Sanyang',
                'owner_id_type' => 'Passport',
                'owner_id_number' => 'P1234567',
                'dob' => '1978-02-15',
                'phone' => '2203456789',
                'email' => 'lamin.sanyang@example.com',
                'address' => 'Independence Drive, Banjul',
            ],
            [
                'owner_name' => 'Isatou Jallow',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB345678',
                'dob' => '1988-11-30',
                'phone' => '2204567890',
                'email' => 'isatou.jallow@example.com',
                'address' => 'Brikama Highway, Brikama',
            ],
            [
                'owner_name' => 'Ebrima Bah',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB456789',
                'dob' => '1982-09-05',
                'phone' => '2205678901',
                'email' => 'ebrima.bah@example.com',
                'address' => 'North Bank Road, Farafenni',
            ],
            [
                'owner_name' => 'Awa Touray',
                'owner_id_type' => 'Passport',
                'owner_id_number' => 'P2345678',
                'dob' => '1995-03-18',
                'phone' => '2206789012',
                'email' => 'awa.touray@example.com',
                'address' => 'Basse Main Road, Basse',
            ],
            [
                'owner_name' => 'Momodou Jobe',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB567890',
                'dob' => '1975-06-22',
                'phone' => '2207890123',
                'email' => 'momodou.jobe@example.com',
                'address' => 'Janjanbureh Road, Janjanbureh',
            ],
            [
                'owner_name' => 'Mariama Faye',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB678901',
                'dob' => '1987-12-10',
                'phone' => '2208901234',
                'email' => 'mariama.faye@example.com',
                'address' => 'Soma Highway, Soma',
            ],
            [
                'owner_name' => 'Abdoulie Njie',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB789012',
                'dob' => '1983-08-14',
                'phone' => '2209012345',
                'email' => 'abdoulie.njie@example.com',
                'address' => 'Kerewan Road, Kerewan',
            ],
            [
                'owner_name' => 'Binta Coker',
                'owner_id_type' => 'Passport',
                'owner_id_number' => 'P3456789',
                'dob' => '1992-01-27',
                'phone' => '2201234500',
                'email' => 'binta.coker@example.com',
                'address' => 'Sanyang Coastal Road, Sanyang',
            ],
            [
                'owner_name' => 'Modou Lamin Drammeh',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB890123',
                'dob' => '1980-10-11',
                'phone' => '2202345600',
                'email' => 'modou.drammeh@example.com',
                'address' => 'Kotu, Kanifing',
            ],
            [
                'owner_name' => 'Saffie Jatta',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB901234',
                'dob' => '1993-05-19',
                'phone' => '2203456700',
                'email' => 'saffie.jatta@example.com',
                'address' => 'Bakoteh, Kanifing',
            ],
            [
                'owner_name' => 'Ousman Sowe',
                'owner_id_type' => 'Passport',
                'owner_id_number' => 'P4567890',
                'dob' => '1979-04-03',
                'phone' => '2204567800',
                'email' => 'ousman.sowe@example.com',
                'address' => 'Fajara, Bakau',
            ],
            [
                'owner_name' => 'Aminata Sissoho',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB012345',
                'dob' => '1986-07-25',
                'phone' => '2205678900',
                'email' => 'aminata.sissoho@example.com',
                'address' => 'Latri Kunda, Serrekunda',
            ],
            [
                'owner_name' => 'Pa Modou Gaye',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB112233',
                'dob' => '1981-02-17',
                'phone' => '2206789000',
                'email' => 'pamodou.gaye@example.com',
                'address' => 'Brufut, West Coast Region',
            ],
            [
                'owner_name' => 'Yusupha Cham',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB223344',
                'dob' => '1984-09-09',
                'phone' => '2207890000',
                'email' => 'yusupha.cham@example.com',
                'address' => 'Sukuta, West Coast Region',
            ],
            [
                'owner_name' => 'Fatoumatta Jobe',
                'owner_id_type' => 'Passport',
                'owner_id_number' => 'P5678901',
                'dob' => '1991-06-13',
                'phone' => '2208900000',
                'email' => 'fatoumatta.jobe@example.com',
                'address' => 'Essau, North Bank Region',
            ],
            [
                'owner_name' => 'Baboucarr Sanyang',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB334455',
                'dob' => '1989-03-29',
                'phone' => '2209010000',
                'email' => 'baboucarr.sanyang@example.com',
                'address' => 'Soma, Lower River Region',
            ],
            [
                'owner_name' => 'Jankey Darboe',
                'owner_id_type' => 'National ID',
                'owner_id_number' => 'GMB445566',
                'dob' => '1994-12-22',
                'phone' => '2200123400',
                'email' => 'jankey.darboe@example.com',
                'address' => 'Bansang, Central River Region',
            ],
            [
                'owner_name' => 'Alieu Ceesay',
                'owner_id_type' => 'Passport',
                'owner_id_number' => 'P6789012',
                'dob' => '1982-08-08',
                'phone' => '2201234001',
                'email' => 'alieu.ceesay@example.com',
                'address' => 'Basse, Upper River Region',
            ],
        ];

        foreach ($owners as $owner) {
            Owner::firstOrCreate(
                ['owner_id_number' => $owner['owner_id_number']],
                $owner
            );
        }
    }
}
