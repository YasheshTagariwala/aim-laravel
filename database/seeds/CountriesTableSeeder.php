<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Afghanistan',
                'codename' => 'AF',
                'delete_status' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Albania',
                'codename' => 'AL',
                'delete_status' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Algeria',
                'codename' => 'DZ',
                'delete_status' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'American Samoa',
                'codename' => 'DS',
                'delete_status' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Andorra',
                'codename' => 'AD',
                'delete_status' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Angola',
                'codename' => 'AO',
                'delete_status' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Anguilla',
                'codename' => 'AI',
                'delete_status' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Antarctica',
                'codename' => 'AQ',
                'delete_status' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Antigua and Barbuda',
                'codename' => 'AG',
                'delete_status' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Argentina',
                'codename' => 'AR',
                'delete_status' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Armenia',
                'codename' => 'AM',
                'delete_status' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Aruba',
                'codename' => 'AW',
                'delete_status' => 0,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Australia',
                'codename' => 'AU',
                'delete_status' => 0,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Austria',
                'codename' => 'AT',
                'delete_status' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Azerbaijan',
                'codename' => 'AZ',
                'delete_status' => 0,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Bahamas',
                'codename' => 'BS',
                'delete_status' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Bahrain',
                'codename' => 'BH',
                'delete_status' => 0,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Bangladesh',
                'codename' => 'BD',
                'delete_status' => 0,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Barbados',
                'codename' => 'BB',
                'delete_status' => 0,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Belarus',
                'codename' => 'BY',
                'delete_status' => 0,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Belgium',
                'codename' => 'BE',
                'delete_status' => 0,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Belize',
                'codename' => 'BZ',
                'delete_status' => 0,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Benin',
                'codename' => 'BJ',
                'delete_status' => 0,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Bermuda',
                'codename' => 'BM',
                'delete_status' => 0,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Bhutan',
                'codename' => 'BT',
                'delete_status' => 0,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Bolivia',
                'codename' => 'BO',
                'delete_status' => 0,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Bosnia and Herzegovina',
                'codename' => 'BA',
                'delete_status' => 0,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Botswana',
                'codename' => 'BW',
                'delete_status' => 0,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Bouvet Island',
                'codename' => 'BV',
                'delete_status' => 0,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Brazil',
                'codename' => 'BR',
                'delete_status' => 0,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'British Indian Ocean Territory',
                'codename' => 'IO',
                'delete_status' => 0,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Brunei Darussalam',
                'codename' => 'BN',
                'delete_status' => 0,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Bulgaria',
                'codename' => 'BG',
                'delete_status' => 0,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Burkina Faso',
                'codename' => 'BF',
                'delete_status' => 0,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Burundi',
                'codename' => 'BI',
                'delete_status' => 0,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Cambodia',
                'codename' => 'KH',
                'delete_status' => 0,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Cameroon',
                'codename' => 'CM',
                'delete_status' => 0,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Canada',
                'codename' => 'CA',
                'delete_status' => 0,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Cape Verde',
                'codename' => 'CV',
                'delete_status' => 0,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Cayman Islands',
                'codename' => 'KY',
                'delete_status' => 0,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Central African Republic',
                'codename' => 'CF',
                'delete_status' => 0,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Chad',
                'codename' => 'TD',
                'delete_status' => 0,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Chile',
                'codename' => 'CL',
                'delete_status' => 0,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'China',
                'codename' => 'CN',
                'delete_status' => 0,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Christmas Island',
                'codename' => 'CX',
                'delete_status' => 0,
            ),
            45 => 
            array (
                'id' => 46,
            'name' => 'Cocos (Keeling) Islands',
                'codename' => 'CC',
                'delete_status' => 0,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Colombia',
                'codename' => 'CO',
                'delete_status' => 0,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Comoros',
                'codename' => 'KM',
                'delete_status' => 0,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Congo',
                'codename' => 'CG',
                'delete_status' => 0,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Cook Islands',
                'codename' => 'CK',
                'delete_status' => 0,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Costa Rica',
                'codename' => 'CR',
                'delete_status' => 0,
            ),
            51 => 
            array (
                'id' => 52,
            'name' => 'Croatia (Hrvatska)',
                'codename' => 'HR',
                'delete_status' => 0,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Cuba',
                'codename' => 'CU',
                'delete_status' => 0,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Cyprus',
                'codename' => 'CY',
                'delete_status' => 0,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Czech Republic',
                'codename' => 'CZ',
                'delete_status' => 0,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Denmark',
                'codename' => 'DK',
                'delete_status' => 0,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Djibouti',
                'codename' => 'DJ',
                'delete_status' => 0,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Dominica',
                'codename' => 'DM',
                'delete_status' => 0,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Dominican Republic',
                'codename' => 'DO',
                'delete_status' => 0,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'East Timor',
                'codename' => 'TP',
                'delete_status' => 0,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Ecuador',
                'codename' => 'EC',
                'delete_status' => 0,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Egypt',
                'codename' => 'EG',
                'delete_status' => 0,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'El Salvador',
                'codename' => 'SV',
                'delete_status' => 0,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Equatorial Guinea',
                'codename' => 'GQ',
                'delete_status' => 0,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Eritrea',
                'codename' => 'ER',
                'delete_status' => 0,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Estonia',
                'codename' => 'EE',
                'delete_status' => 0,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Ethiopia',
                'codename' => 'ET',
                'delete_status' => 0,
            ),
            67 => 
            array (
                'id' => 68,
            'name' => 'Falkland Islands (Malvinas)',
                'codename' => 'FK',
                'delete_status' => 0,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Faroe Islands',
                'codename' => 'FO',
                'delete_status' => 0,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Fiji',
                'codename' => 'FJ',
                'delete_status' => 0,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Finland',
                'codename' => 'FI',
                'delete_status' => 0,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'France',
                'codename' => 'FR',
                'delete_status' => 0,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'France, Metropolitan',
                'codename' => 'FX',
                'delete_status' => 0,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'French Guiana',
                'codename' => 'GF',
                'delete_status' => 0,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'French Polynesia',
                'codename' => 'PF',
                'delete_status' => 0,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'French Southern Territories',
                'codename' => 'TF',
                'delete_status' => 0,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Gabon',
                'codename' => 'GA',
                'delete_status' => 0,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Gambia',
                'codename' => 'GM',
                'delete_status' => 0,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Georgia',
                'codename' => 'GE',
                'delete_status' => 0,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Germany',
                'codename' => 'DE',
                'delete_status' => 0,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Ghana',
                'codename' => 'GH',
                'delete_status' => 0,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Gibraltar',
                'codename' => 'GI',
                'delete_status' => 0,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Guernsey',
                'codename' => 'GK',
                'delete_status' => 0,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Greece',
                'codename' => 'GR',
                'delete_status' => 0,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Greenland',
                'codename' => 'GL',
                'delete_status' => 0,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Grenada',
                'codename' => 'GD',
                'delete_status' => 0,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Guadeloupe',
                'codename' => 'GP',
                'delete_status' => 0,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Guam',
                'codename' => 'GU',
                'delete_status' => 0,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Guatemala',
                'codename' => 'GT',
                'delete_status' => 0,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Guinea',
                'codename' => 'GN',
                'delete_status' => 0,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Guinea-Bissau',
                'codename' => 'GW',
                'delete_status' => 0,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Guyana',
                'codename' => 'GY',
                'delete_status' => 0,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Haiti',
                'codename' => 'HT',
                'delete_status' => 0,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Heard and Mc Donald Islands',
                'codename' => 'HM',
                'delete_status' => 0,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Honduras',
                'codename' => 'HN',
                'delete_status' => 0,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Hong Kong',
                'codename' => 'HK',
                'delete_status' => 0,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Hungary',
                'codename' => 'HU',
                'delete_status' => 0,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Iceland',
                'codename' => 'IS',
                'delete_status' => 0,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'India',
                'codename' => 'IN',
                'delete_status' => 0,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Isle of Man',
                'codename' => 'IM',
                'delete_status' => 0,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Indonesia',
                'codename' => 'ID',
                'delete_status' => 0,
            ),
            101 => 
            array (
                'id' => 102,
            'name' => 'Iran (Islamic Republic of)',
                'codename' => 'IR',
                'delete_status' => 0,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Iraq',
                'codename' => 'IQ',
                'delete_status' => 0,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Ireland',
                'codename' => 'IE',
                'delete_status' => 0,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Israel',
                'codename' => 'IL',
                'delete_status' => 0,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Italy',
                'codename' => 'IT',
                'delete_status' => 0,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Ivory Coast',
                'codename' => 'CI',
                'delete_status' => 0,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Jersey',
                'codename' => 'JE',
                'delete_status' => 0,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Jamaica',
                'codename' => 'JM',
                'delete_status' => 0,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Japan',
                'codename' => 'JP',
                'delete_status' => 0,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Jordan',
                'codename' => 'JO',
                'delete_status' => 0,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Kazakhstan',
                'codename' => 'KZ',
                'delete_status' => 0,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Kenya',
                'codename' => 'KE',
                'delete_status' => 0,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Kiribati',
                'codename' => 'KI',
                'delete_status' => 0,
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Korea, Democratic People\'s Republic of',
                'codename' => 'KP',
                'delete_status' => 0,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Korea, Republic of',
                'codename' => 'KR',
                'delete_status' => 0,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Kosovo',
                'codename' => 'XK',
                'delete_status' => 0,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Kuwait',
                'codename' => 'KW',
                'delete_status' => 0,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Kyrgyzstan',
                'codename' => 'KG',
                'delete_status' => 0,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Lao People\'s Democratic Republic',
                'codename' => 'LA',
                'delete_status' => 0,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Latvia',
                'codename' => 'LV',
                'delete_status' => 0,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Lebanon',
                'codename' => 'LB',
                'delete_status' => 0,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Lesotho',
                'codename' => 'LS',
                'delete_status' => 0,
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Liberia',
                'codename' => 'LR',
                'delete_status' => 0,
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Libyan Arab Jamahiriya',
                'codename' => 'LY',
                'delete_status' => 0,
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Liechtenstein',
                'codename' => 'LI',
                'delete_status' => 0,
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Lithuania',
                'codename' => 'LT',
                'delete_status' => 0,
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Luxembourg',
                'codename' => 'LU',
                'delete_status' => 0,
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Macau',
                'codename' => 'MO',
                'delete_status' => 0,
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Macedonia',
                'codename' => 'MK',
                'delete_status' => 0,
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Madagascar',
                'codename' => 'MG',
                'delete_status' => 0,
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Malawi',
                'codename' => 'MW',
                'delete_status' => 0,
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Malaysia',
                'codename' => 'MY',
                'delete_status' => 0,
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Maldives',
                'codename' => 'MV',
                'delete_status' => 0,
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Mali',
                'codename' => 'ML',
                'delete_status' => 0,
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Malta',
                'codename' => 'MT',
                'delete_status' => 0,
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Marshall Islands',
                'codename' => 'MH',
                'delete_status' => 0,
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Martinique',
                'codename' => 'MQ',
                'delete_status' => 0,
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Mauritania',
                'codename' => 'MR',
                'delete_status' => 0,
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Mauritius',
                'codename' => 'MU',
                'delete_status' => 0,
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Mayotte',
                'codename' => 'TY',
                'delete_status' => 0,
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Mexico',
                'codename' => 'MX',
                'delete_status' => 0,
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Micronesia, Federated States of',
                'codename' => 'FM',
                'delete_status' => 0,
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Moldova, Republic of',
                'codename' => 'MD',
                'delete_status' => 0,
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Monaco',
                'codename' => 'MC',
                'delete_status' => 0,
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Mongolia',
                'codename' => 'MN',
                'delete_status' => 0,
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Montenegro',
                'codename' => 'ME',
                'delete_status' => 0,
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Montserrat',
                'codename' => 'MS',
                'delete_status' => 0,
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Morocco',
                'codename' => 'MA',
                'delete_status' => 0,
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Mozambique',
                'codename' => 'MZ',
                'delete_status' => 0,
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Myanmar',
                'codename' => 'MM',
                'delete_status' => 0,
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Namibia',
                'codename' => 'NA',
                'delete_status' => 0,
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Nauru',
                'codename' => 'NR',
                'delete_status' => 0,
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Nepal',
                'codename' => 'NP',
                'delete_status' => 0,
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Netherlands',
                'codename' => 'NL',
                'delete_status' => 0,
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Netherlands Antilles',
                'codename' => 'AN',
                'delete_status' => 0,
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'New Caledonia',
                'codename' => 'NC',
                'delete_status' => 0,
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'New Zealand',
                'codename' => 'NZ',
                'delete_status' => 0,
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Nicaragua',
                'codename' => 'NI',
                'delete_status' => 0,
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Niger',
                'codename' => 'NE',
                'delete_status' => 0,
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Nigeria',
                'codename' => 'NG',
                'delete_status' => 0,
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Niue',
                'codename' => 'NU',
                'delete_status' => 0,
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Norfolk Island',
                'codename' => 'NF',
                'delete_status' => 0,
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Northern Mariana Islands',
                'codename' => 'MP',
                'delete_status' => 0,
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Norway',
                'codename' => 'NO',
                'delete_status' => 0,
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Oman',
                'codename' => 'OM',
                'delete_status' => 0,
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Pakistan',
                'codename' => 'PK',
                'delete_status' => 0,
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Palau',
                'codename' => 'PW',
                'delete_status' => 0,
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Palestine',
                'codename' => 'PS',
                'delete_status' => 0,
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Panama',
                'codename' => 'PA',
                'delete_status' => 0,
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Papua New Guinea',
                'codename' => 'PG',
                'delete_status' => 0,
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Paraguay',
                'codename' => 'PY',
                'delete_status' => 0,
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Peru',
                'codename' => 'PE',
                'delete_status' => 0,
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Philippines',
                'codename' => 'PH',
                'delete_status' => 0,
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Pitcairn',
                'codename' => 'PN',
                'delete_status' => 0,
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Poland',
                'codename' => 'PL',
                'delete_status' => 0,
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Portugal',
                'codename' => 'PT',
                'delete_status' => 0,
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Puerto Rico',
                'codename' => 'PR',
                'delete_status' => 0,
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Qatar',
                'codename' => 'QA',
                'delete_status' => 0,
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Reunion',
                'codename' => 'RE',
                'delete_status' => 0,
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Romania',
                'codename' => 'RO',
                'delete_status' => 0,
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Russian Federation',
                'codename' => 'RU',
                'delete_status' => 0,
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Rwanda',
                'codename' => 'RW',
                'delete_status' => 0,
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Saint Kitts and Nevis',
                'codename' => 'KN',
                'delete_status' => 0,
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'Saint Lucia',
                'codename' => 'LC',
                'delete_status' => 0,
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Saint Vincent and the Grenadines',
                'codename' => 'VC',
                'delete_status' => 0,
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Samoa',
                'codename' => 'WS',
                'delete_status' => 0,
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'San Marino',
                'codename' => 'SM',
                'delete_status' => 0,
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Sao Tome and Principe',
                'codename' => 'ST',
                'delete_status' => 0,
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Saudi Arabia',
                'codename' => 'SA',
                'delete_status' => 0,
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Senegal',
                'codename' => 'SN',
                'delete_status' => 0,
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Serbia',
                'codename' => 'RS',
                'delete_status' => 0,
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'Seychelles',
                'codename' => 'SC',
                'delete_status' => 0,
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'Sierra Leone',
                'codename' => 'SL',
                'delete_status' => 0,
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'Singapore',
                'codename' => 'SG',
                'delete_status' => 0,
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'Slovakia',
                'codename' => 'SK',
                'delete_status' => 0,
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'Slovenia',
                'codename' => 'SI',
                'delete_status' => 0,
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'Solomon Islands',
                'codename' => 'SB',
                'delete_status' => 0,
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'Somalia',
                'codename' => 'SO',
                'delete_status' => 0,
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'South Africa',
                'codename' => 'ZA',
                'delete_status' => 0,
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'South Georgia South Sandwich Islands',
                'codename' => 'GS',
                'delete_status' => 0,
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'South Sudan',
                'codename' => 'SS',
                'delete_status' => 0,
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'Spain',
                'codename' => 'ES',
                'delete_status' => 0,
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Sri Lanka',
                'codename' => 'LK',
                'delete_status' => 0,
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'St. Helena',
                'codename' => 'SH',
                'delete_status' => 0,
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'St. Pierre and Miquelon',
                'codename' => 'PM',
                'delete_status' => 0,
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Sudan',
                'codename' => 'SD',
                'delete_status' => 0,
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Suriname',
                'codename' => 'SR',
                'delete_status' => 0,
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'Svalbard and Jan Mayen Islands',
                'codename' => 'SJ',
                'delete_status' => 0,
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Swaziland',
                'codename' => 'SZ',
                'delete_status' => 0,
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'Sweden',
                'codename' => 'SE',
                'delete_status' => 0,
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Switzerland',
                'codename' => 'CH',
                'delete_status' => 0,
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Syrian Arab Republic',
                'codename' => 'SY',
                'delete_status' => 0,
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Taiwan',
                'codename' => 'TW',
                'delete_status' => 0,
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Tajikistan',
                'codename' => 'TJ',
                'delete_status' => 0,
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Tanzania, United Republic of',
                'codename' => 'TZ',
                'delete_status' => 0,
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Thailand',
                'codename' => 'TH',
                'delete_status' => 0,
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Togo',
                'codename' => 'TG',
                'delete_status' => 0,
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Tokelau',
                'codename' => 'TK',
                'delete_status' => 0,
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Tonga',
                'codename' => 'TO',
                'delete_status' => 0,
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Trinidad and Tobago',
                'codename' => 'TT',
                'delete_status' => 0,
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'Tunisia',
                'codename' => 'TN',
                'delete_status' => 0,
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'Turkey',
                'codename' => 'TR',
                'delete_status' => 0,
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'Turkmenistan',
                'codename' => 'TM',
                'delete_status' => 0,
            ),
            224 => 
            array (
                'id' => 225,
                'name' => 'Turks and Caicos Islands',
                'codename' => 'TC',
                'delete_status' => 0,
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'Tuvalu',
                'codename' => 'TV',
                'delete_status' => 0,
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'Uganda',
                'codename' => 'UG',
                'delete_status' => 0,
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'Ukraine',
                'codename' => 'UA',
                'delete_status' => 0,
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'United Arab Emirates',
                'codename' => 'AE',
                'delete_status' => 0,
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'United Kingdom',
                'codename' => 'GB',
                'delete_status' => 0,
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'United States',
                'codename' => 'US',
                'delete_status' => 0,
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'United States minor outlying islands',
                'codename' => 'UM',
                'delete_status' => 0,
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'Uruguay',
                'codename' => 'UY',
                'delete_status' => 0,
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'Uzbekistan',
                'codename' => 'UZ',
                'delete_status' => 0,
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'Vanuatu',
                'codename' => 'VU',
                'delete_status' => 0,
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Vatican City State',
                'codename' => 'VA',
                'delete_status' => 0,
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'Venezuela',
                'codename' => 'VE',
                'delete_status' => 0,
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Vietnam',
                'codename' => 'VN',
                'delete_status' => 0,
            ),
            238 => 
            array (
                'id' => 239,
            'name' => 'Virgin Islands (British)',
                'codename' => 'VG',
                'delete_status' => 0,
            ),
            239 => 
            array (
                'id' => 240,
            'name' => 'Virgin Islands (U.S.)',
                'codename' => 'VI',
                'delete_status' => 0,
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'Wallis and Futuna Islands',
                'codename' => 'WF',
                'delete_status' => 0,
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'Western Sahara',
                'codename' => 'EH',
                'delete_status' => 0,
            ),
            242 => 
            array (
                'id' => 243,
                'name' => 'Yemen',
                'codename' => 'YE',
                'delete_status' => 0,
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'Zaire',
                'codename' => 'ZR',
                'delete_status' => 0,
            ),
            244 => 
            array (
                'id' => 245,
                'name' => 'Zambia',
                'codename' => 'ZM',
                'delete_status' => 0,
            ),
            245 => 
            array (
                'id' => 246,
                'name' => 'Zimbabwe',
                'codename' => 'ZW',
                'delete_status' => 0,
            ),
        ));
        
        
    }
}