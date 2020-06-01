<?php

use Illuminate\Database\Seeder;

class HasilSkorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('hasil_skors')->delete();

        \DB::table('hasil_skors')->insert(array (
            0 =>
            array (
                'id' => 1,
                'kategori_screening' => 'Covid',
                'kategori_hasil' => 'otg',
            'hasil' => 'Orang Tanpa Gejala (OTG)',
                'interpretasi' => 'a.	Orang yang tidak bergejala dan memiliki risiko tertular dari orang positif COVID-19
b.	Orang tanpa gejala merupakan kontak erat dengan kasus positif COVID-19',
                'tatalaksana' => 'Isolasi diri di rumah selama 14 hari, rajin cuci tangan, gunakan masker, terapkan etika bersin dan batuk yang baik, jaga jarak minimal 1 meter',
                'batas_bawah' => NULL,
                'gambar' => '2.png',
                'batas_atas' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'kategori_screening' => 'Covid',
                'kategori_hasil' => 'odp',
            'hasil' => 'Orang Dalam Pemantauan (ODP)',
            'interpretasi' => 'a.	Orang yang mengalami demam (≥380C) atau riwayat demam; atau gejala gangguan sistem pernapasan seperti pilek/sakit tenggorokan/batuk DAN pada 14 hari terakhir sebelum timbul gejala memiliki riwayat perjalanan atau tinggal di negara/wilayah yang melaporkan transmisi lokal
b.	Orang yang mengalami gejala gangguan sistem pernapasan seperti pilek/sakit tenggorokan/batuk DAN pada 14 hari terakhir sebelum timbul gejala memiliki riwayat kontak dengan kasus konfirmasi atau probabel COVID-19
',
                'tatalaksana' => 'Isolasi diri di rumah selama 14 hari, rajin cuci tangan, gunakan masker, terapkan etika bersin dan batuk yang baik, jaga jarak minimal 1 meter',
                'batas_bawah' => NULL,
                'gambar' => '3.png',
                'batas_atas' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'kategori_screening' => 'Covid',
                'kategori_hasil' => 'pdp',
            'hasil' => 'Pasien Dalam Pemantauan (PDP)',
            'interpretasi' => 'a.	Orang dengan Infeksi Saluran Pernapasan Akut (ISPA) yaitu demam (≥38oC) atau riwayat demam; disertai salah satu gejala/tanda penyakit pernapasan seperti: batuk/sesak nafas/sakit tenggorokan/pilek/pneumonia ringan hingga berat DAN pada 14 hari terakhir sebelum timbul gejala memiliki riwayat perjalanan atau tinggal di negara/wilayah yang melaporkan transmisi lokal
b.	Orang dengan demam (≥38oC) atau riwayat demam atau ISPA DAN pada 14 hari terakhir sebelum timbul gejala memiliki riwayat kontak dengan kasus konfirmasi atau probabel COVID-19
c.	Orang dengan ISPA (Infeksi Saluran Pernapasan Akut) berat/pneumonia berat yang membutuhkan perawatan di rumah sakit DAN tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan.',
                'tatalaksana' => 'a.	Jika gejala ringan : Isolasi diri di rumah selama 14 hari, rajin cuci tangan, gunakan masker, terapkan etika bersin dan batuk yang baik, jaga jarak minimal 1 meter
b.	Jika gejala sedang : Hubungi Fasilitas Kesehatan
c.	Jika gejala berat : Hubungi Fasilitas Kesehatan
',
                'batas_bawah' => NULL,
                'gambar' => '4.png',
                'batas_atas' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'kategori_screening' => 'Covid',
                'kategori_hasil' => 'imun',
                'hasil' => 'Imun yang rentan',
                'interpretasi' => 'Sehat dari covid-19 namun HARUS WASPADA',
                'tatalaksana' => 'Jaga kesehatan, makan teratur dan bergizi, tidur yang cukup, rajin cuci tangan, gunakan masker jika keluar rumah, jaga jarak minimal 1 meter, hindari kerumunan orang',
                'batas_bawah' => NULL,
                'gambar' => '2.png',
                'batas_atas' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'kategori_screening' => 'Covid',
                'kategori_hasil' => 'sehat',
                'hasil' => 'Sehat',
                'interpretasi' => 'Sehat dari COVID-19',
                'tatalaksana' => 'Jaga kesehatan, rajin cuci tangan, gunakan masker jika keluar rumah, jaga jarak minimal 1 meter',
                'batas_bawah' => NULL,
                'gambar' => '1.png',
                'batas_atas' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'kategori_screening' => 'Covid',
                'kategori_hasil' => 'belum_diketahui',
                'hasil' => 'Belum Diketahui',
                'interpretasi' => 'Belum Diketahui',
                'tatalaksana' => 'Hubungi Fasilitas Kesehatan',
                'batas_bawah' => NULL,
                'gambar' => '1.png',
                'batas_atas' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
