@component('mail::layout')
@slot('header')
@component('mail::header', ['url' => 'http://localhost:8000'])
PT. PUPUK SRIWIDJAJA PALEMBANG
@endcomponent
@endslot

# Registrasi Sistem Pengelolaan Kontrak dan Perizinan Departemen Hukum

Selamat, registrasi anda di website Sistem Pengelolaan Kontrak dan Perizinan Departemen Hukum berhasil. <br>
Silahkan login dengan menggunakan nomor badge anda dengan password 12345678

@component('mail::button', ['url' => 'http://localhost:8000'])
Klik di sini!
@endcomponent

Terima Kasih,<br>
Administrasi Departemen Hukum

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} PT. Pupuk Sriwidjaja Palembang. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
