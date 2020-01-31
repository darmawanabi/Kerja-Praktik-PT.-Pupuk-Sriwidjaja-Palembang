@component('mail::layout', ['token' => $token], ['name' => $name])
@slot('header')
@component('mail::header', ['url' => 'http://localhost:8000'])
PT. PUPUK SRIWIDJAJA PALEMBANG
@endcomponent
@endslot

# Reset Password Sistem Pengelolaan Kontrak dan Perizinan Departemen Hukum

Yth. Bpk/Ibu **{{ $name }}**, anda telah mengirimkan permintaan untuk me-reset password akun anda.
Silahkan login dengan menggunakan nomor badge anda dengan password **{{ $token }}**

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
