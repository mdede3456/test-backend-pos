<p align="center"><a href="https://mdh-digital.com" target="_blank"><img src="https://mdh-digital.com/public/uploads/berkas/logo.png" width="400"></a></p>

 

## Kata Pengantar

Scripts ini bersifat open source, scripts ini di buat bertujuan untuk test praktek untuk melamar sebuah pekerjaan di PT PAS GLOBAL TEKNOLOGI. Fitur didalam scripts ini dari mulai Authentication seperti ( Login, Register, Lupa Password & Verifikasi Email). Pembukaan Toko & cabang toko yang dilengkapi juga dengan Notifikasi Via Email. Selain itu scripts ini cocok sekali digunakan bagi yang ingin mempelajari bahasa pemograman laravel dengan fitur activity dan web notifikasi. Terakhir, Scripts ini dilengkapi dengan api ( sanctum ) dari laravel 8.

- [Requirements](#requirements)
- [Cara Install](#install)
- [Penggunaan Api](#api)
- [Video Installation](#videoinstall)
- [Video Alur Sistem](#videosistem)
- [Video Api](#videoapi) 


## requirements

* [Laravel 8 ](https://laravel.com/docs/installation)
* PHP 7.4
* Local Server or Online Server 

## install

1. Silahkan Clone Link Github ini : 
```bash
   git clone https://github.com/mdede3456/test-backend-pos.git
```


2. Setelah Proses Clone Selesai, Lalu Jalankan Perintah
```bash
    composer install
```


3. Jika Kalian Menjalankannya di subdirectory, maka edit app/config.php di line 57
```bash
   'asset_url' => env('ASSET_URL', "/{yourdirectory}/public/"),
```

Namun Jika Menjalankannya di direcrory pusat maka cukup
```bash
   'asset_url' => env('ASSET_URL', "/public/"),
```

Adapun jika kalian menjalankannya via php serve, maka tidak perlu ada yang di edit kembali, cukup seperti semula
```bash
   'asset_url' => env('ASSET_URL', null),
```

4. Di browser tempat kalian menjalankannya, silahkan masuk ke {base_url}/install
5. Install Aplikasi Sesuai Step yang ada, jangan lupa untuk mengisi SMTP Server agar Email Notifikasi Dapat digunakan

## api

Untuk Documentasi Api yang digunakan di Aplikasi ini, silahkan masuk ke link berikut : 
* [Documentasi Api ](https://documenter.getpostman.com/view/13206338/UVC8DRvY)

## videoinstall

Berikut Video Link Installasi Aplikasinya
* [Video Installasi](https://drive.google.com/file/d/1E0giGHA4zo_DiL9sJVzp1QbVUlvYB0G_/view?usp=sharing)

## videosistem

Berikut Video Penjelasan Alur Sistemnya
* [Video Alur Sistem](https://drive.google.com/file/d/1Fwa9BsJ6dR9wZ1eMHUpadOQ1VVOAya57/view?usp=sharing)

## videoapi

Berikut Video Penjelasan Api Aplikasi
* [Video Penggunaan Api](https://drive.google.com/file/d/1qvAEIAWjrwkfzRNgTFVJfMJuA2lHS5Vg/view?usp=sharing)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
