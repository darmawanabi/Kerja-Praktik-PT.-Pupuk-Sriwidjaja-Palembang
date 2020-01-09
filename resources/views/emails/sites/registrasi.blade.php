@component('mail::message')
# Pendaftaran Sistem Contract Pool Dept. Hukum | PT. Pupuk Sriwidjaja Palembang

Anda telah terdaftar pada sistem aplikasi Contract Pool Departemen Hukum
PT. Pupuk Sriwidjaja Palembang.
Silakan Login dengan No. Badge dengan password : 12345678

@component('mail::button', ['url' => 'http://localhost:8000/'])
Klik Disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
