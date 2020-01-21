@component('mail::message')
# Registrasi Contract Pool Departemen Hukum | PT. Pupuk Sriwidjaja Palembang

Anda telah teregistrasi di Contract Pool Dept. Hukum | PT. Pupuk Sriwidjaja Palembang
silakan login dengan menggunakan No. Badge dan password = 12345678

@component('mail::button', ['url' => 'http://localhost:8000/'])
Klik Disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
