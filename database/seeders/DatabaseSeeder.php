<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kud;
use App\Models\Core;
use App\Models\Role;
use App\Models\User;
use App\Models\Method;
use App\Models\Sample;
use App\Models\Status;
use App\Models\AriCard;
use App\Models\Kawalan;
use App\Models\Posbrix;
use App\Models\Station;
use App\Models\Timbang;
use App\Models\Variety;
use App\Models\Wilayah;
use App\Models\CoreCard;
use App\Models\Material;
use App\Models\Moisture;
use App\Models\Coloromat;
use App\Models\Pospantau;
use App\Models\AnalisaUmum;
use App\Models\Saccharomat;
use App\Models\AnalisaAmpas;
use App\Models\AnalisaKetel;
use App\Models\RafaksiValue;
use App\Models\AnalisaBlotong;
use App\Models\AnalisaPosbrix;
use App\Models\AnalisaSulphur;
use Illuminate\Database\Seeder;
use App\Models\RendemenNppAcuan;
use App\Models\Faktor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application"s database.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            ["name" => "Admin"],                // 1
            ["name" => "Kepala Bagian"],        // 2
            ["name" => "Kasie"],                // 3
            ["name" => "Kasubsie"],             // 4
            ["name" => "Quality Management"],   // 5
            ["name" => "Koordinator"],          // 6
            ["name" => "Mandor Off Farm"],      // 7
            ["name" => "Operator Off Farm"],    // 8
            ["name" => "Mandor On Farm"],       // 9
            ["name" => "Operator On Farm"],     // 10
            ["name" => "Operator Non QC"],      // 11
            ["name" => "User 1"],               // 12
            ["name" => "User 2"],               // 13
        ];
        Role::insert($role);

        $users = [
            [
                "role_id" => 1,
                "name" => "Andik Kurniawan",
                "username" => "andik",
                "password" => bcrypt("andik987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 2,
                "name" => "Muhammad Anas Mu'allif",
                "username" => "anas",
                "password" => bcrypt("anas987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 3,
                "name" => "Tofan Andrew Irawan",
                "username" => "tofan",
                "password" => bcrypt("tofan987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 4,
                "name" => "Yudi Suyadi",
                "username" => "yudi",
                "password" => bcrypt("yudi987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 5,
                "name" => "Tutus Agustyn R",
                "username" => "tutus",
                "password" => bcrypt("tutus987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 5,
                "name" => "Fernina Ellen",
                "username" => "ellen",
                "password" => bcrypt("ellen987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 6,
                "name" => "Dwi Wahyu Nugroho",
                "username" => "dwi",
                "password" => bcrypt("dwi987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 6,
                "name" => "Nico Aldy",
                "username" => "nico",
                "password" => bcrypt("nico987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 6,
                "name" => "Muslimin",
                "username" => "muslimin",
                "password" => bcrypt("muslimin987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 6,
                "name" => "Achmad Zauzi Rifqi",
                "username" => "zauzi",
                "password" => bcrypt("zauzi987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 6,
                "name" => "Risky Anggara",
                "username" => "risky",
                "password" => bcrypt("risky987"),
                "is_active" => 1,
            ],
            [
                "role_id" => 6,
                "name" => "Aris Dedi Setiawan",
                "username" => "aris",
                "password" => bcrypt("aris987"),
                "is_active" => 1,
            ],
        ];
        User::insert($users);

        $stations = [
            ["name" => "Raw Sugar"],
            ["name" => "Gilingan"],
            ["name" => "Pemurnian"],
            ["name" => "Penguapan"],
            ["name" => "DRK"],
            ["name" => "Masakan"],
            ["name" => "Stroop"],
            ["name" => "Gula"],
            ["name" => "Tangki Tetes"],
            ["name" => "Ketel"],
            ["name" => "Packer"],
        ];
        Station::insert($stations);

        $methods = [
            [
                "id" => 1,
                "name" => "Brix, Pol, HK, Icumsa",
            ],
            [
                "id" => 2,
                "name" => "Brix, Pol, HK",
            ],
            [
                "id" => 3,
                "name" => "Brix, Pol, R, pH",
            ],
            [
                "id" => 4,
                "name" => "Pol Ampas, ZK",
            ],
            [
                "id" => 5,
                "name" => "PI, Sabut",
            ],
            [
                "id" => 6,
                "name" => "Brix, Pol, HK, Gured, Saccharosa",
            ],
            [
                "id" => 7,
                "name" => "Brix, Pol, HK, Icumsa, CaO, pH, Turbidity",
            ],
            [
                "id" => 8,
                "name" => "Pol, Kadar Air",
            ],
            [
                "id" => 9,
                "name" => "Pol, Moisture",
            ],
            [
                "id" => 10,
                "name" => "Brix",
            ],
            [
                "id" => 11,
                "name" => "Brix, Pol, HK, IU, Hl",
            ],
            [
                "id" => 12,
                "name" => "Icumsa, Moisture, SO2",
            ],
            [
                "id" => 13,
                "name" => "TDS, pH, Kesadahan, Phospat",
            ],
            [
                "id" => 14,
                "name" => "TDS, pH, Kesadahan",
            ],
            [
                "id" => 15,
                "name" => "TDS, pH",
            ],
            [
                "id" => 16,
                "name" => "Kapur",
            ],
            [
                "id" => 17,
                "name" => "Brix, pH, Suhu",
            ],
            [
                "id" => 18,
                "name" => "Brix, TSAI",
            ],
        ];
        Method::insert($methods);

        $materials = [
            ["name" => "RS Kedatangan", "station_id" => 1, "method_id" => 12 ],
            ["name" => "RS Silo", "station_id" => 1, "method_id" => 12 ],
            ["name" => "Nira Gilingan 1", "station_id" => 2, "method_id" => 3 ],
            ["name" => "Nira Gilingan 2", "station_id" => 2, "method_id" => 2 ],
            ["name" => "Nira Gilingan 3", "station_id" => 2, "method_id" => 2 ],
            ["name" => "Nira Gilingan 4", "station_id" => 2, "method_id" => 2 ],
            ["name" => "Nira Gilingan 5", "station_id" => 2, "method_id" => 2 ],
            ["name" => "Ampas Gilingan 1", "station_id" => 2, "method_id" => 4 ],
            ["name" => "Ampas Gilingan 2", "station_id" => 2, "method_id" => 4 ],
            ["name" => "Ampas Gilingan 3", "station_id" => 2, "method_id" => 4 ],
            ["name" => "Ampas Gilingan 4", "station_id" => 2, "method_id" => 4 ],
            ["name" => "Ampas Gilingan 5", "station_id" => 2, "method_id" => 4 ],
            ["name" => "Tebu Cacah", "station_id" => 2, "method_id" => 5 ],
            ["name" => "Nira Mentah", "station_id" => 3, "method_id" => 7 ],
            ["name" => "NM Sulfitasi", "station_id" => 3, "method_id" => 7 ],
            ["name" => "Nira Tapis", "station_id" => 3, "method_id" => 7 ],
            ["name" => "Nira Encer", "station_id" => 3, "method_id" => 7 ],
            ["name" => "Blotong RVF 1", "station_id" => 3, "method_id" => 8 ],
            ["name" => "Blotong RVF 2", "station_id" => 3, "method_id" => 8 ],
            ["name" => "Blotong RVF 3", "station_id" => 3, "method_id" => 8 ],
            ["name" => "Blotong RVF 4", "station_id" => 3, "method_id" => 8 ],
            ["name" => "Blotong RVF Timur", "station_id" => 3, "method_id" => 8 ],
            ["name" => "Blotong RVF Barat", "station_id" => 3, "method_id" => 8 ],
            ["name" => "Blotong RVF Truk", "station_id" => 3, "method_id" => 8 ],
            ["name" => "Kapur PT Sedar", "station_id" => 3, "method_id" => 16 ],
            ["name" => "Nira Kotor", "station_id" => 3, "method_id" => 17  ],
            ["name" => "Nira Kental", "station_id" => 4, "method_id" => 7 ],
            ["name" => "NK Sulfitasi", "station_id" => 4, "method_id" => 7 ],
            ["name" => "Pre-Evaporator 1", "station_id" => 4, "method_id" => 10 ],
            ["name" => "Pre-Evaporator 2", "station_id" => 4, "method_id" => 10 ],
            ["name" => "Evaporator 1", "station_id" => 4, "method_id" => 10 ],
            ["name" => "Evaporator 2", "station_id" => 4, "method_id" => 10 ],
            ["name" => "Evaporator 3", "station_id" => 4, "method_id" => 10 ],
            ["name" => "Evaporator 4", "station_id" => 4, "method_id" => 10 ],
            ["name" => "Evaporator 5", "station_id" => 4, "method_id" => 10 ],
            ["name" => "Remelter In", "station_id" => 5, "method_id" => 7 ],
            ["name" => "Reaction Tank", "station_id" => 5, "method_id" => 7 ],
            ["name" => "Carbonated", "station_id" => 5, "method_id" => 7 ],
            ["name" => "Clear Liquor", "station_id" => 5, "method_id" => 7 ],
            ["name" => "Cake Head", "station_id" => 5, "method_id" => 9 ],
            ["name" => "Cake Mid", "station_id" => 5, "method_id" => 9 ],
            ["name" => "Cake End", "station_id" => 5, "method_id" => 9 ],
            ["name" => "Masakan A", "station_id" => 6, "method_id" => 11 ],
            ["name" => "Masakan A Raw", "station_id" => 6, "method_id" => 11 ],
            ["name" => "Masakan C", "station_id" => 6, "method_id" => 11 ],
            ["name" => "Masakan D", "station_id" => 6, "method_id" => 11 ],
            ["name" => "Masakan R1", "station_id" => 6, "method_id" => 11 ],
            ["name" => "Masakan R2", "station_id" => 6, "method_id" => 11 ],
            ["name" => "Masakan R3", "station_id" => 6, "method_id" => 11 ],
            ["name" => "CVP C", "station_id" => 6, "method_id" => 1 ],
            ["name" => "CVP D", "station_id" => 6, "method_id" => 1 ],
            ["name" => "Einwuurf C", "station_id" => 6, "method_id" => 1 ],
            ["name" => "Einwuurf D", "station_id" => 6, "method_id" => 1 ],
            ["name" => "Sogokan C", "station_id" => 6, "method_id" => 1 ],
            ["name" => "Sogokan D", "station_id" => 6, "method_id" => 1 ],
            ["name" => "Klare SHS", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Klare D", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Stroop A", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Stroop C", "station_id" => 7, "method_id" => 1 ],
            ["name" => "R1 Mol", "station_id" => 7, "method_id" => 1 ],
            ["name" => "R2 Mol", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Remelter A", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Remelter CD", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Tetes Puteran", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Tetes Produk", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Magma RS", "station_id" => 7, "method_id" => 1 ],
            ["name" => "Gula SHS", "station_id" => 8, "method_id" => 12 ],
            ["name" => "Gula A", "station_id" => 8, "method_id" => 12 ],
            ["name" => "Gula R1", "station_id" => 8, "method_id" => 12 ],
            ["name" => "Gula R2", "station_id" => 8, "method_id" => 12 ],
            ["name" => "Gula R3", "station_id" => 8, "method_id" => 12 ],
            ["name" => "Gula A Raw", "station_id" => 8, "method_id" => 12 ],
            ["name" => "Gula C", "station_id" => 8, "method_id" => 12 ],
            ["name" => "Gula D1", "station_id" => 8 , "method_id" => 12],
            ["name" => "Gula D2", "station_id" => 8 , "method_id" => 12],
            ["name" => "Kristal RS", "station_id" => 8, "method_id" => 12 ],
            ["name" => "Tetes Tangki 1", "station_id" => 9, "method_id" => 18 ],
            ["name" => "Tetes Tangki 2", "station_id" => 9, "method_id" => 18 ],
            ["name" => "Tetes Tangki 3", "station_id" => 9, "method_id" => 18 ],
            ["name" => "Tetes Tandon", "station_id" => 9, "method_id" => 18 ],
            ["name" => "Tetes Kumpulan", "station_id" => 9, "method_id" => 18 ],
            ["name" => "Jiangxin Jianglin", "station_id" => 10, "method_id" => 13 ],
            ["name" => "Yoshimine 1", "station_id" => 10, "method_id" => 13 ],
            ["name" => "Yoshimine 2", "station_id" => 10, "method_id" => 13 ],
            ["name" => "WTP", "station_id" => 10, "method_id" => 14 ],
            ["name" => "Daert JJ", "station_id" => 10, "method_id" => 15 ],
            ["name" => "Daert Yoshimine1", "station_id" => 10, "method_id" => 15 ],
            ["name" => "Daert Yoshimine2", "station_id" => 10, "method_id" => 15 ],
            ["name" => "HW", "station_id" => 10, "method_id" => 15 ],
            ["name" => "Gula Produksi 50Kg", "station_id" => 11, "method_id" => 12 ],
            ["name" => "Gula Produksi Retail", "station_id" => 11, "method_id" => 12 ],
        ];
        Material::insert($materials);

        $posbrixes = [
            ["name" => "Emplasemen EK Core Sample Non Aktif"],
            ["name" => "Emplasemen EB Gandeng"],
            ["name" => "Emplasemen Magersari"],
            ["name" => "Emplasemen EK Core Sample Aktif"],
        ];
        Posbrix::insert($posbrixes);

        $kawalans = [
            ["name" => "Non VMA"],
            ["name" => "VMA"],
            ["name" => "ZPK"],
        ];
        Kawalan::insert($kawalans);

        $varieties = [
            ["name" => "BL"],
            ["name" => "PSKA942"],
            ["name" => "PS862"],
            ["name" => "PS881"],
            ["name" => "PSJK922"],
            ["name" => "CENING"],
            ["name" => "PSJT941"],
            ["name" => "CO617"],
            ["name" => "PS864"],
            ["name" => "PS921"],
            ["name" => "LAIN2"],
        ];
        Variety::insert($varieties);

        $status = [
            ["name" => "Diterima"],
            ["name" => "Ditolak"],
            ["name" => "Terbakar"],
            ["name" => "Lolos"],
        ];
        Status::insert($status);

        $cores = [
            ["name" => "EK Timur"],
            ["name" => "EK Barat"],
            ["name" => "EB Gandeng"],
        ];
        Core::insert($cores);

        $timbangs = [
            ["name" => "Tebu Utara"],
            ["name" => "Tebu Selatan"],
            ["name" => "Non Tebu"],
        ];
        Timbang::insert($timbangs);

        $kuds = [
           [ "code" => "1", "name" => "Gondanglegi" ],
           [ "code" => "2", "name" => "Pagelaran" ],
           [ "code" => "3", "name" => "Dampit" ],
           [ "code" => "4", "name" => "Bantur" ],
           [ "code" => "5", "name" => "Donomulyo" ],
           [ "code" => "A", "name" => "Lawang" ],
           [ "code" => "B", "name" => "Dengkol" ],
           [ "code" => "C", "name" => "Karangploso" ],
           [ "code" => "D", "name" => "Jabung" ],
           [ "code" => "E", "name" => "Pakis" ],
           [ "code" => "F", "name" => "Tumpang Agung" ],
           [ "code" => "G", "name" => "Poncokusumo" ],
           [ "code" => "H", "name" => "Wagir" ],
           [ "code" => "I", "name" => "Tajinan" ],
           [ "code" => "J", "name" => "Bululawang" ],
           [ "code" => "K", "name" => "Pakisaji" ],
           [ "code" => "L", "name" => "Kromengan" ],
           [ "code" => "M", "name" => "Wonosari" ],
           [ "code" => "N", "name" => "Sumberpucung" ],
           [ "code" => "O", "name" => "Ngajum" ],
           [ "code" => "P", "name" => "Pagak" ],
           [ "code" => "Q", "name" => "Kalipare" ],
           [ "code" => "R", "name" => "Sri Sedono" ],
           [ "code" => "S", "name" => "Rekanan Utara" ],
           [ "code" => "T", "name" => "Kesamben" ],
           [ "code" => "U", "name" => "Kedungkandang" ],
           [ "code" => "V", "name" => "Kepanjen" ],
           [ "code" => "W", "name" => "Sari Madu" ],
           [ "code" => "X", "name" => "Rekanan Selatan Timur" ],
           [ "code" => "Y", "name" => "Rekanan Selatan Barat" ],
           [ "code" => "Z", "name" => "Tumpang Padita" ],
       ];
       Kud::insert($kuds);

       $pospantaus = [
           [ "code" => "O", "name" => "Banyuglugur" ],
           [ "code" => "P", "name" => "Tongas" ],
           [ "code" => "Q", "name" => "Turen" ],
           [ "code" => "R", "name" => "Purwosari" ],
           [ "code" => "S", "name" => "Ngoro" ],
           [ "code" => "T", "name" => "Brongkos" ],
           [ "code" => "U", "name" => "Talun" ],
           [ "code" => "V", "name" => "Gumitir" ],
           [ "code" => "W", "name" => "Gedok" ],
           [ "code" => "X", "name" => "Peteng" ],
           [ "code" => "Y", "name" => "Pagak" ],
           [ "code" => "Z", "name" => "Pronojiwo" ],
           [ "code" => "1", "name" => "Kromengan" ],
           [ "code" => "2", "name" => "Jatikerto" ],
           [ "code" => "4", "name" => "Pagelaran" ],
           [ "code" => "5", "name" => "Singosari" ],
           [ "code" => "6", "name" => "Ngajum" ],
           [ "code" => "7", "name" => "Gondanglegi" ],
           [ "code" => "8", "name" => "Donomulyo" ],
           [ "code" => "9", "name" => "Pakis" ],
       ];
       Pospantau::insert($pospantaus);

       $wilayahs = [
           [ "code" => "A", "name" => "Banyuwangi" ],
           [ "code" => "B", "name" => "Jember" ],
           [ "code" => "C", "name" => "Situbondo" ],
           [ "code" => "D", "name" => "Bondowoso" ],
           [ "code" => "E", "name" => "Probolinggo" ],
           [ "code" => "F", "name" => "Lumajang" ],
           [ "code" => "G", "name" => "Pasuruan" ],
           [ "code" => "H", "name" => "Mojokerto" ],
           [ "code" => "I", "name" => "Jombang" ],
           [ "code" => "J", "name" => "Blitar" ],
           [ "code" => "K", "name" => "Kredit DW TR" ],
           [ "code" => "L", "name" => "Kediri" ],
           [ "code" => "M", "name" => "Tulungagung" ],
           [ "code" => "N", "name" => "Non Kredit DW" ],
           [ "code" => "P", "name" => "Kebun Benih Datar" ],
           [ "code" => "Q", "name" => "Kebun Benih Induk" ],
           [ "code" => "R", "name" => "Kebun Benih Nenek" ],
           [ "code" => "S", "name" => "Kebun Benih Pokok" ],
           [ "code" => "T", "name" => "Kebun Persilangan P3GI" ],
           [ "code" => "U", "name" => "Kebun Percobaan" ],
           [ "code" => "V", "name" => "Kebun Pengenalan Jenis" ],
           [ "code" => "X", "name" => "Tebu Giling TS" ],
           [ "code" => "Z", "name" => "SPT" ],
       ];
       Wilayah::insert($wilayahs);

       $analisa_posbrix = [
            ["user_id" => 1, "posbrix_id" => 1, "kawalan_id" => 1, "variety_id" => 1, "brix" => rand(15, 17), "spta" => "08231517", "status_id" => 1],
            ["user_id" => 1, "posbrix_id" => 1, "kawalan_id" => 1, "variety_id" => 1, "brix" => rand(15, 17), "spta" => "08231516", "status_id" => 1],
            ["user_id" => 1, "posbrix_id" => 1, "kawalan_id" => 1, "variety_id" => 1, "brix" => rand(15, 17), "spta" => "08231701", "status_id" => 1],
            ["user_id" => 1, "posbrix_id" => 1, "kawalan_id" => 1, "variety_id" => 1, "brix" => rand(15, 17), "spta" => "08231699", "status_id" => 1],
            ["user_id" => 1, "posbrix_id" => 1, "kawalan_id" => 1, "variety_id" => 1, "brix" => rand(15, 17), "spta" => "08231756", "status_id" => 1],
       ];
       AnalisaPosbrix::insert($analisa_posbrix);

       $core_card = [
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567890"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567891"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567892"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567893"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567894"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567895"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567896"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567897"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567898"],
            ["user_id" => 1, "core_id" => 1, "rfid" => "1234567899"],
       ];
       CoreCard::insert($core_card);

       $ari_card = [
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567890"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567891"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567892"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567893"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567894"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567895"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567896"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567897"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567898"],
            ["user_id" => 1, "timbang_id" => 1, "rfid" => "1234567899"],
        ];
        AriCard::insert($ari_card);

        $rendemen_npp_acuan = ["value" => 8.03, "user_id" => 1];
        RendemenNppAcuan::insert($rendemen_npp_acuan);

        $rafakasi_value = [
            "daduk" => 0.05,
            "akar" => 0.05,
            "tali_pucuk" => 0.05,
            "sogolan" => 0.15,
            "pucuk" => 0.15,
            "tebu_muda" => 0.30,
            "lelesan" => 0.30,
            "terbakar" => 0.30,
            "user_id" => 1,
        ];
        RafaksiValue::insert($rafakasi_value);

        $material_total = count($materials);
        for($i=1; $i < 1000; $i++)
        {
            $samples[$i]["material_id"] = rand(1, $material_total);
            $samples[$i]["user_id"] = 1;

            $saccharomats[$i]["sample_id"] = $i;
            $saccharomats[$i]["pbrix"] = 55;
            $saccharomats[$i]["ppol"] = 55;
            $saccharomats[$i]["pol"] = 55;
            $saccharomats[$i]["hk"] = 55;
            $saccharomats[$i]["rendemen"] = 55;
            $saccharomats[$i]["user_id"] = 1;

            $coloromats[$i]["sample_id"] = $i;
            $coloromats[$i]["icumsa"] = 555;
            $coloromats[$i]["user_id"] = 1;

            $moistures[$i]["sample_id"] = $i;
            $moistures[$i]["moisture"] = 0.55;
            $moistures[$i]["user_id"] = 1;

            $analisa_ampas[$i]["sample_id"] = $i;
            $analisa_ampas[$i]["pol"] = 5.55;
            $analisa_ampas[$i]["zat_kering"] = 55;
            $analisa_ampas[$i]["kadar_air"] = 55;
            $analisa_ampas[$i]["user_id"] = 1;

            $analisa_blotongs[$i]["sample_id"] = $i;
            $analisa_blotongs[$i]["zat_kering"] = 55;
            $analisa_blotongs[$i]["kadar_air"] = 55;
            $analisa_blotongs[$i]["user_id"] = 1;

            $analisa_umums[$i]["sample_id"] = $i;
            $analisa_umums[$i]["cao"] = 5.55;
            $analisa_umums[$i]["ph"] = 55;
            $analisa_umums[$i]["turbidity"] = 55;
            $analisa_umums[$i]["user_id"] = 1;

            $analisa_ketels[$i]["sample_id"] = $i;
            $analisa_ketels[$i]["tds"] = 5.55;
            $analisa_ketels[$i]["ph"] = 55;
            $analisa_ketels[$i]["kesadahan"] = 55;
            $analisa_ketels[$i]["phospat"] = 55;
            $analisa_ketels[$i]["user_id"] = 1;

            $analisa_sulphurs[$i]["sample_id"] = $i;
            $analisa_sulphurs[$i]["so2"] = 5.55;
            $analisa_sulphurs[$i]["bjb"] = 55;
            $analisa_sulphurs[$i]["user_id"] = 1;
        }
        Sample::insert($samples);
        Saccharomat::insert($saccharomats);
        Coloromat::insert($coloromats);
        Moisture::insert($moistures);
        AnalisaAmpas::insert($analisa_ampas);
        AnalisaBlotong::insert($analisa_blotongs);
        AnalisaUmum::insert($analisa_umums);
        AnalisaKetel::insert($analisa_ketels);
        AnalisaSulphur::insert($analisa_sulphurs);

        $faktors = [
            [
                "user_id" => 1,
                "faktor_analisa_ampas" => 0,
                "faktor_rendemen_npp" => 0.7,
                "faktor_mellase_npp" => 0.4,
                "faktor_pol_saccharomat" => 0,
                "faktor_rendemen_ari" => 0,
                "faktor_mellase_ari" => 0,
                "faktor_pol_saccharomat_ari" => 0,
            ]
        ];
        Faktor::insert($faktors);
    }
}
