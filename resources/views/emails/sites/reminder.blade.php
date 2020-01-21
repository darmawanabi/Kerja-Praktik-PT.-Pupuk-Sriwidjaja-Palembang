@php
    $post = \App\PostPerizinan::find($todo->post_id);
    $tgl = date('d-m-Y', strtotime($post->tanggal_berakhir));
    $link = "http://localhost:8000/perizinan/" . $todo->post_id;
@endphp

@component('mail::layout', ['title' => $post->nama], ['nama' => $post->user->name] , ['tgl' => $tgl], ['link' => $link])
@slot('header')
@component('mail::header', ['url' => $link])
PT. PUPUK SRIWIDJAJA PALEMBANG
@endcomponent
@endslot

# Reminder Untuk Perizinan | {{ $post->nama }}

Yth. Bapak/Ibu **{{ $post->user->name }}**, diharapkan untuk melakukan pembaharuan terkait perizinan yang disebutkan, dikarenakan perizinan tersebut akan berakhir pada tanggal **{{ $tgl }}**. Silahkan klik tombol di bawah ini untuk langsung diarahkan ke halaman perizinan tersebut.

@component('mail::button', ['url' => $link])
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
