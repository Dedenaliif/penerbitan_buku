@extends('layout.index')
@section('content')
<div class="mx-50 mt-20">
    <h1 class="text-black text-7xl font-bold font-sans">Halo,</h1>
    <h2 class="text-lg font-bold mt-4">Seperti kata pepatah, tak kenal maka tak sayang. Mari mengenal <br>
        lebih dalam tentang CRP Press.</h2>
    <p class="mt-3">CRP Press adalah sebuah penerbit buku akademis. Sebagai sebuah <br>
        penerbit akademis, CRP Press telah menerbitkan buku-buku untuk kepentingan akademis, <br>
        pendidikan, dan kebudayaan. sebagai penerbit buku CRP bertekad untuk membangun semangat para akademis dan masyarakat untuk lebih baik untuk membaca.</p>
</div>

<div class="flex mx-50 mt-13">
    <div>
        <img class="h-full object-cover w-auto" src="{{ asset('assets/image/aboutme1.jpg') }}" alt="batmi1">
    </div>
    <div>
        <img class="h-full object-cover w-auto" src="{{ asset('assets/image/aboutme2.jpg') }}" alt="batmi1">
    </div>
</div>

<div class="mx-50 mt-20">
    <h1 class="text-black text-5xl font-bold font-sans">Kilas Balik</h1>
    <p class="mt-3">CRP Press berkomitmen untuk memberikan jasa layanan penerbitan bagi sivitas maupun <br>
        nonsivitas. Sebagai penerbit, sejak tahun 2025, CRP Press. <br>
        mendukung komunikasi ilmiah para pakar dan profesional untuk mendiseminasikan berbagai <br>
        karyanya melalui multi-paltform bagi komunitas ilmiah. Selain itu, CRP Press juga memberikan <br>
        layanan penebitan untuk karya fiksi bagi masyarakat umum guna menyebarkan hasil olah pikir <br>
        kreatif.</p>
</div>

<div class="mt-8">
    <div>
        <hr class="mx-40">
    </div>

    <div>
        <h1 class="container mx-auto text-black h-17 pt-5 pl-10">© 2025 RCP. All Rights Reserved</h1>
    </div>
</div>
@endsection