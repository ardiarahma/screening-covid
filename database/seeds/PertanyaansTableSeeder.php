<?php

use Illuminate\Database\Seeder;

class PertanyaansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pertanyaans')->delete();
        
        \DB::table('pertanyaans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kategori' => '',
            'pertanyaan' => 'Dalam 14 hari terakhir, apakah pernah kontak erat (kontak fisik atau berada dalam satu ruangan atau dalam radius 1 meter) dengan pasien positif COVID-19?',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            1 => 
            array (
                'id' => 2,
                'kategori' => '',
            'pertanyaan' => 'Dalam 14 hari terakhir, apakah pernah berkunjung ke luar negeri/luar kota (Zona Merah)?',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            2 => 
            array (
                'id' => 3,
                'kategori' => '',
            'pertanyaan' => 'Dalam 14 hari terakhir, apakah pernah melakukan kegiatan yang melibatkan banyak orang (contoh: ronda, sholat jumat, sholat tarawih, pengajian, rapat/pertemuan)?',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            3 => 
            array (
                'id' => 4,
                'kategori' => '',
                'pertanyaan' => 'Dalam 14 hari terakhir, apakah pernah berkunjung ke Fasilitas Kesehatan yang berhubungan dengan pasien positif COVID-19?',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            4 => 
            array (
                'id' => 5,
                'kategori' => '',
            'pertanyaan' => 'Dalam 14 hari terakhir, apakah pernah kontak dengan orang yang memiliki riwayat perjalanan ke luar negeri dan luar kota (Zona merah)?',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            5 => 
            array (
                'id' => 6,
                'kategori' => '',
            'pertanyaan' => 'Dalam 14 hari terakhir, apakah ada demam (≥ 38oC) atau riwayat demam (≥ 38oC)?',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            6 => 
            array (
                'id' => 7,
                'kategori' => '',
            'pertanyaan' => 'Dalam 14 hari terakhir, mengalami gejala saluran nafas (batuk, pilek, sakit tenggorokan, sesak napas)?',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            7 => 
            array (
                'id' => 8,
                'kategori' => '',
            'pertanyaan' => 'Apakah memiliki penyakit Infeksi Saluran Pernapasan Akut (ISPA)/Pneumonia?',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            8 => 
            array (
                'id' => 9,
                'kategori' => '',
            'pertanyaan' => 'Apakah memiliki penyakit lain (contoh: penyakit gula, darah tinggi, asma, dll) yang sedang diderita? Sebutkan!',
                'skor_ya' => 1,
                'skor_tidak' => 0,
                'created_at' => '2020-02-06 07:56:53',
                'updated_at' => '2020-02-06 07:56:53',
            ),
            9 => 
            array (
                'id' => 10,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa bahwa diri saya menjadi marah karena hal-hal sepele',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 20:37:59',
                'updated_at' => '2020-05-18 20:37:59',
            ),
            10 => 
            array (
                'id' => 11,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa bibir saya sering kering.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 20:37:59',
                'updated_at' => '2020-05-18 20:37:59',
            ),
            11 => 
            array (
                'id' => 12,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya sama sekali tidak dapat merasakan perasaan positif.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 20:37:59',
                'updated_at' => '2020-05-18 20:37:59',
            ),
            12 => 
            array (
                'id' => 13,
                'kategori' => 'Psikis',
            'pertanyaan' => 'Saya mengalami kesulitan bernafas (misalnya: seringkali terengah-engah atau tidak dapat bernafas padahal tidak melakukan aktivitas fisik sebelumnya).',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 20:37:59',
                'updated_at' => '2020-05-18 20:37:59',
            ),
            13 => 
            array (
                'id' => 14,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya sepertinya tidak kuat lagi untuk melakukan suatu kegiatan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 00:00:00',
                'updated_at' => '2020-05-18 00:00:00',
            ),
            14 => 
            array (
                'id' => 15,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya cenderung bereaksi berlebihan terhadap suatu situasi.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:16:35',
                'updated_at' => '2020-05-18 22:16:35',
            ),
            15 => 
            array (
                'id' => 16,
                'kategori' => 'Psikis',
            'pertanyaan' => 'Saya merasa goyah (misalnya, kaki terasa mau ’copot’).',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:18',
                'updated_at' => '2020-05-18 22:17:18',
            ),
            16 => 
            array (
                'id' => 17,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa sulit untuk bersantai.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:18',
                'updated_at' => '2020-05-18 22:17:18',
            ),
            17 => 
            array (
                'id' => 18,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya menemukan diri saya berada dalam situasi yang membuat saya merasa sangat cemas dan saya akan merasa sangat lega jika semua ini berakhir.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            18 => 
            array (
                'id' => 19,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa tidak ada hal yang dapat diharapkan di masa depan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            19 => 
            array (
                'id' => 20,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya menemukan diri saya mudah merasa kesal.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            20 => 
            array (
                'id' => 21,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa telah menghabiskan banyak energi untuk merasa cemas.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            21 => 
            array (
                'id' => 22,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa sedih dan tertekan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            22 => 
            array (
                'id' => 23,
                'kategori' => 'Psikis',
            'pertanyaan' => 'Saya menemukan diri saya menjadi tidak sabar ketika mengalami penundaan (misalnya: kemacetan lalu lintas, menunggu sesuatu).',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            23 => 
            array (
                'id' => 24,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa lemas seperti mau pingsan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            24 => 
            array (
                'id' => 25,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa saya kehilangan minat akan segala hal.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            25 => 
            array (
                'id' => 26,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa bahwa saya tidak berharga sebagai seorang manusia.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            26 => 
            array (
                'id' => 27,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa bahwa saya mudah tersinggung.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            27 => 
            array (
                'id' => 28,
                'kategori' => 'Psikis',
            'pertanyaan' => 'Saya berkeringat secara berlebihan (misalnya: tangan berkeringat), padahal temperatur tidak panas atau tidak melakukan aktivitas fisik sebelumnya.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            28 => 
            array (
                'id' => 29,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa takut tanpa alasan yang jelas.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            29 => 
            array (
                'id' => 30,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa bahwa hidup tidak bermanfaat.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            30 => 
            array (
                'id' => 31,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa sulit untuk beristirahat.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            31 => 
            array (
                'id' => 32,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya mengalami kesulitan dalam menelan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            32 => 
            array (
                'id' => 33,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya tidak dapat merasakan kenikmatan dari berbagai hal yang saya lakukan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            33 => 
            array (
                'id' => 34,
                'kategori' => 'Psikis',
            'pertanyaan' => 'Saya menyadari kegiatan jantung, walaupun saya tidak sehabis melakukan aktivitas fisik (misalnya: merasa detak jantung meningkat atau melemah).',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            34 => 
            array (
                'id' => 35,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa putus asa dan sedih.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            35 => 
            array (
                'id' => 36,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa bahwa saya sangat mudah marah.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            36 => 
            array (
                'id' => 37,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa saya hampir panik.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            37 => 
            array (
                'id' => 38,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa sulit untuk tenang setelah sesuatu membuat saya kesal.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            38 => 
            array (
                'id' => 39,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya takut bahwa saya akan ‘terhambat’ oleh tugas-tugas sepele yang tidak biasa saya lakukan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            39 => 
            array (
                'id' => 40,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya tidak merasa antusias dalam hal apapun.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:19',
                'updated_at' => '2020-05-18 22:17:19',
            ),
            40 => 
            array (
                'id' => 41,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya sulit untuk sabar dalam menghadapi gangguan terhadap hal yang sedang saya lakukan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            41 => 
            array (
                'id' => 42,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya sedang merasa gelisah.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            42 => 
            array (
                'id' => 43,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa bahwa saya tidak berharga.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            43 => 
            array (
                'id' => 44,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya tidak dapat memaklumi hal apapun yang menghalangi saya untuk menyelesaikan hal yang sedang saya lakukan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            44 => 
            array (
                'id' => 45,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa sangat ketakutan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            45 => 
            array (
                'id' => 46,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya melihat tidak ada harapan untuk masa depan.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            46 => 
            array (
                'id' => 47,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa bahwa hidup tidak berarti.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            47 => 
            array (
                'id' => 48,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya menemukan diri saya mudah gelisah.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            48 => 
            array (
                'id' => 49,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa khawatir dengan situasi dimana saya mungkin menjadi panik dan mempermalukan diri sendiri.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            49 => 
            array (
                'id' => 50,
                'kategori' => 'Psikis',
            'pertanyaan' => 'Saya merasa gemetar (misalnya: pada tangan).',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
            50 => 
            array (
                'id' => 51,
                'kategori' => 'Psikis',
                'pertanyaan' => 'Saya merasa sulit untuk meningkatkan inisiatif dalam melakukan sesuatu.',
                'skor_ya' => NULL,
                'skor_tidak' => NULL,
                'created_at' => '2020-05-18 22:17:20',
                'updated_at' => '2020-05-18 22:17:20',
            ),
        ));
        
        
    }
}