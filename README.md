Anggota:
- Nathanael Kanaya Chriesman / 2272018
- Joseph Adiwiguna Kartawihardja / 2272020
- Benedict Wijaya / 2272022
- Rafael Cavin Emmanuel Tuasuun / 2272041

Setup Database (migrations & seeders):
php artisan migrate

Masukkan Seeders (masukkan sesuai urutan):
1. php artisan db:seed --class=DepartemenSeeder
2. php artisan db:seed --class=GolonganSeeder
3. php artisan db:seed --class=JabatanSeeder
4. php artisan db:seed --class=RoleSeeder
5. php artisan db:seed --class=KaryawanSeeder

Setup Aplikasi:
php artisan serve

Akun Default:
- Admin:
  - Username: jono@gmail.com
  - Pass: Adm12345
- Manajer:
  - Username: agus@gmail.com	
  - Pass: Mnj12345
- Karyawan:
  - Username: asep@gmail.com
  - Pass: Pgw12345

# Link Miro Activity Diagram : https://miro.com/app/board/uXjVLaAPr68=/?share_link_id=809917764691
# Link Miro ERD : https://miro.com/app/board/uXjVLZCBT1o=/?share_link_id=44441675315
# Link Miro Use Case : https://miro.com/app/board/uXjVLaAEb2g=/?share_link_id=472950193529
# Link Trello : https://trello.com/invite/b/6717c18d9f2138c3c82afc12/ATTI055fc39fa0aa362deb7b46e2b9b736f9EA45C201/website-administratif-kehadiran-karyawan-pegawai




