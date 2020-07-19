@component('mail::message')
# Congratulations

Kamu akhirnya menjadi seorang anggota Band. <br>
Silahkan tekan tombol dibawah ini untuk langsung akses ke halaman band kamu

@component('mail::button', ['url' => ''])
Let's Go
@endcomponent

Thanks,<br>
My Band
@endcomponent
