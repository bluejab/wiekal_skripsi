@component('mail::message')
# Selamat

Kamu telah diterima menjadi anggota Band. Silahkan tekan tombol dibawah ini untuk langsung akses ke halaman band kamu :)

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
