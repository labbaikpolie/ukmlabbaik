<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $checkup->patient->name }} - All Report</title>
</head>
<style>
    @page {
        /* header: page-header;
        footer: page-footer; */
        margin-top: 1cm;
        margin-bottom: 1cm;
        margin-left: 1cm;
        margin-right: 1cm;
    }

    @page resume {
        odd-footer-name: html_FooterResume;
        margin-bottom: 2.5cm;
        background: url('images/confidential_document.png') no-repeat 210px 280px;
        font-size: 10px;
    }

    div.resume {
        page-break-after: avoid;
        page: resume;
        font-size: 10px;
    }

    @page medical_surveillance {
        odd-footer-name: html_FooterMedicalSurveillance;
        margin-bottom: 2.5cm;
    }

    div.medical_surveillance {
        page-break-after: avoid;
        page: medical_surveillance;
    }

    @page jakarta_cardiovascular_score {
        odd-footer-name: html_FooterJakartaCardiovascularScore;
        margin-bottom: 2.5cm;
    }

    div.jakarta_cardiovascular_score {
        page-break-after: avoid;
        page: jakarta_cardiovascular_score;
    }

    @page mcu {
        odd-footer-name: html_FooterMCU;
        background: url('images/confidential_document.png') no-repeat 210px 280px;
        margin-bottom: 3cm;
    }

    div.mcu {
        page-break-after: avoid;
        page: mcu;
    }

    @page radiology {
        odd-footer-name: html_FooterRadiology;
        margin-bottom: 3cm;
    }

    div.radiology {
        page-break-after: avoid;
        page: radiology;
    }

    @page nofooter {
        odd-footer-name: _blank;
    }

    div.nofooter {
        page: nofooter;
    }

    body {
        font-size: 11px;
        font-family: {{ $company->default_font }}
    }

    .page {
        page-break-inside: auto;
        display: inline-block;
    }

    .page-break {
        page-break-after: always;
    }

    .page-break-before {
        page-break-before: always;
    }

    /* Cover */
    .cover {
        border: 2mm ridge #6994cc;
        border-radius: 3mm / 3mm;
        background-clip: border-box;
        padding: 1em;
        /* position: fixed; */
        padding-bottom: 100px;
        align: center;
    }

    /* Resume Report */
    li {
        padding-left: -20px;
    }

    table {
        border-collapse: collapse;
    }

    .border {
        border: 1px solid black;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .bold {
        font-weight: bold;
    }

    .p-0 {
        padding: 0;
    }

    .p-3 {
        padding: 3px;
    }

    .p-5 {
        padding: 5px;
    }

    .p-10 {
        padding: 10px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .m-0 {
        margin: 0;
    }

    .mt-0 {
        margin-top: 0;
    }

    .mb-0 {
        margin-bottom: 0;
    }

    /* .bg-green {
        background-color: rgb(172, 190, 170);
    } */

    /* Medical Suveillance Report */
    .table {
        border: 1px solid black;
        border-collapse: collapse;
        padding-left: 10px;
        padding-right: 10px;
    }

    h1,
    h2 {
        text-align: center;
        margin: 0;
        padding: 0;
    }

    .red {
        color: red;
    }

    .form-inline {
        display: flex;
        flex-flow: row wrap;
        align-items: center;
    }

    .form-inline label {
        margin: 5px 10px 5px 0;
    }

    input {
        display: inline-block;
        border: transparent;
        outline: none;
    }

    .noborder {
        text-align: left;
        border: 1px;
        padding-left: 10px;
        padding-right: 10px;
        font-size: 16px;
    }

    .center {
        text-align: center;
    }

    .right {
        text-align: right;
    }

    .gray {
        background-color: #DCDCDC;
    }

    .dark-gray {
        background-color: #808080;
    }

    .box1 {
        width: 220px;
        background: #FF0000;
        color: white;
        padding: 10px;
        margin-bottom: 10px;
    }

    .box2 {
        position: absolute;
        background-color: #D3D3D3;
        margin-bottom: 20px;
        border: 3px solid #696969;
    }

    .img-center {
        display: block;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        width: 60%;
    }

    .img-patient {
        padding: 0;
        border: 3px solid gray;
        width: 3.81cm;
        height: 5.59cm;
    }

    .bold {
        font-weight: bold;
    }
</style>

<body>

    {{-- Cover --}}
    <div class="page cover nofooter">
        <div align="center" style="color: rgb(72, 157, 255); font-size: 26px; margin-top: 50px;">
            <b>{{ ucwords($company->name) }}</b>
        </div>
        <table width="100%">
            <tr>
                <td height="350px" align="center">
                    @if ($site_logo != null)
                        <img src="{{ 'company/' . $site_logo }}" alt="" style="width:300px;">
                    @else
                        <img src="{{ 'images/logo.png' }}" alt="" style="width:300px;">
                    @endif
                </td>
            </tr>
        </table>
        <br>
        <h1 align="center" style="margin-top: 30px;">MEDICAL CHECK UP REPORT</h1>
        <table cellspacing="0" border="0" width="100%" style="margin-top: 30px; font-size: 18px;" align="right">
            <tr>
                <td class="p-10" width="30%" valign="top"><b>No. Reg</b></td>
                <td class="p-10" width="5%" valign="top"><b>:</b></td>
                <td class="p-10" width="65%"><b>{{ $checkup->serial_number }}</b></td>
            </tr>
            <tr>
                <td class="p-10" valign="top"><b>Name</b></td>
                <td class="p-10" valign="top"><b>:</b></td>
                <td class="p-10"><b>{{ $checkup->patient->name ?? '-' }}</b></td>
            </tr>
            <tr>
                <td class="p-10" valign="top"><b>Age</b></td>
                <td class="p-10" valign="top"><b>:</b></td>
                <td class="p-10">
                    <b>
                        @php
                            $now = Carbon\Carbon::now();
                            $b_day = Carbon\Carbon::parse($checkup->patient->birthdate);
                            $age = $b_day->diffInYears($now);
                            echo $age . ' Years Old';
                        @endphp
                    </b>
                </td>
            </tr>
            <tr>
                <td class="p-10" valign="top"><b>Position</b></td>
                <td class="p-10" valign="top"><b>:</b></td>
                <td class="p-10"><b>{{ $checkup->patient->position ?? '-' }}</b></td>
            </tr>
            <tr>
                <td class="p-10" valign="top"><b>Company</b></td>
                <td class="p-10" valign="top"><b>:</b></td>
                <td class="p-10"><b>{{ $checkup->patient->company }}</b></td>
            </tr>
        </table>
        <div align="center" style="color: rgb(72, 157, 255); font-size: 26px; margin-top: 100px;">
            <b>PILIHAN TEPAT UNTUK ANDA</b>
        </div>
    </div>

    {{-- Resume Report --}}
    <div class="page resume">
        <table width="100%" cellspacing="0" border="0">
            <tr>
                <td width="80%">
                    @if ($site_logo != null)
                        <img src="{{ 'company/' . $site_logo }}" alt=""
                            style="width:100px; margin-right: 10px;">
                    @else
                        <img src="{{ 'images/logo.png' }}" alt="" style="width:100px; margin-right: 10px;">
                    @endif
                    @foreach ($model_certificates as $model_certificate)
                        @if ($model_certificate->certificate->logo)
                            <img src="{{ '/storage/certificate/' . $model_certificate->certificate->logo }}"
                                alt="" style="height:60px;">
                        @endif
                    @endforeach
                </td>
                <td class="bold" align="right">
                    health screening
                    <br>
                    <div style="font-size: 22px">
                        MEDICAL CHECKUP
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <p>RAHASIA KEDOKTERAN</p>
        <p class="text-center bold m-0">RESUME</p>
        <p class="text-center bold m-0">HASIL PEMERIKSAAN KESEHATAN BERKALA TAHUN {{ date('Y') }}</p>
        <p class="mt-0">Kepada Yth,</p>
        <table cellspacing="0" border="0" width="100%">
            <tr>
                <td width="15%" border="0">Nama</td>
                <td width="1%" border="0">:</td>
                <td width="34%" border="0">{{ $checkup->patient->name ?? '' }}</td>
                <td width="15%" border="0">Tipe MCU</td>
                <td width="1%" border="0">:</td>
                <td width="34%" border="0">{{ $checkup->checkup_type ? $checkup->checkup_type->name : 'Umum' }}
                </td>
            </tr>
            <tr>
                <td border="0">Posisi</td>
                <td border="0">:</td>
                <td border="0">{{ $checkup->position ?? '-' }}</td>
                <td border="0">Tanggal Lahir</td>
                <td border="0">:</td>
                <td border="0">
                    {{ Carbon\Carbon::parse($checkup->patient->birthdate)->formatLocalized('%d %B %Y') }}</td>
            </tr>
            <tr>
                <td border="0">Umur</td>
                <td border="0">:</td>
                <td border="0">
                    @php
                        $now = Carbon\Carbon::now();
                        $b_day = Carbon\Carbon::parse($checkup->patient->birthdate);
                        $age = $b_day->diffInYears($now);
                        echo $age . ' Tahun';
                    @endphp
                </td>
                <td border="0">Jenis Kelamin</td>
                <td border="0">:</td>
                <td border="0">
                    @if ($checkup->patient->gender == 'male')
                        Laki-laki
                    @else
                        Perempuan
                    @endif
                </td>
            </tr>
            <tr>
                <td border="0">No. Reg</td>
                <td border="0">:</td>
                <td border="0">{{ $checkup->serial_number ?? '-' }}</td>
                <td border="0">NRP</td>
                <td border="0">:</td>
                <td border="0"></td>
            </tr>
        </table>
        <p class="mb-0">Berikut adalah hasil pemeriksaan Medical Check Up yang telah dilaksanakan pada tanggal :</p>
        <p class="mt-0">{{ Carbon\Carbon::parse($medical_record->in_date)->formatLocalized('%d %B %Y') }}</p>
        @if ($checkup->options != null)
            <p class="m-0 bold">Hasil Pemeriksaan :</p>
            <ul class="mt-0">
                @foreach ($checkup->options->result as $result)
                    <li class="mt-0">{{ $result->title }} : {{ isset($result->remarks) ? $result->remarks : null }}
                    </li>
                @endforeach
            </ul>
        @endif
        <table cellspacing="0" border="1" width="100%">
            <tr>
                <td colspan="2" class="text-center p-3 bold bg-green">KATEGORI</td>
                <td class="text-center p-3 bold bg-green">CATATAN</td>
            </tr>
            @foreach ($checkup_category_results as $category_result)
                <tr>
                    <td width="7%" class="text-center p-3 bold">
                        @if ($checkup->category_result_id == $category_result->id)
                            X
                        @endif
                    </td>
                    <td width="7%" class="text-center p-3">{{ $category_result->title }}</td>
                    <td width="86%" class="p-3">{{ $category_result->description }}</td>
                </tr>
            @endforeach
        </table>
        <p class="mb-0 bold">Kesimpulan :</p>
        <table width="100%" cellspacing="0" border="0">
            @foreach ($checkup_conclusions as $conclusion)
                <tr>
                    <td width="7%" class="text-center p-3 border bold">
                        @if ($checkup->conclusion_id == $conclusion->id)
                            X
                        @endif
                    </td>
                    <td width="93%" class="p-3">{{ $conclusion->title }}</td>
                </tr>
            @endforeach
        </table>
        <br>
        @if ($checkup->suggestion_id != null)
            <p class="m-0 bold">Saran - saran :</p>
            <ul class="m-0">
                @foreach ($checkup->suggestion_id as $key => $value)
                    <li class="m-0">{{ $value['checkup_suggestion']['remarks'] }}</li>
                @endforeach
            </ul>
        @endif
        <table cellspacing="0" border="0" width="100%">
            <tr>
                <td border="0" width="60%" valign="top">Demikian dan terima kasih atas kerjasamanya.</td>
                <td border="0" class="text-center">
                    <p class="m-0">{{ ucwords(strtolower($company->regency->name)) ?? '' }},
                        {{ Carbon\Carbon::parse($medical_record->in_date)->formatLocalized('%d %B %Y') }}</p>
                    <br>
                    <barcode code={!! route('guest.qr.checkup', ['type' => Hash::make('mcu-general-resume'), 'validate' => $medical_record->id]) !!} size="1" type="QR" error="M"
                        class="barcode" disableborder="1" />
                    <br>
                    <br>
                    <b><u>{{ $medical_record->physician->name ?? '-' }}</u></b>
                    @if ($certificate_number_physician_resume)
                        <br>
                        SIP. {{ $certificate_number_physician_resume }}
                    @endif
                </td>
            </tr>
        </table>
        <htmlpagefooter name="FooterResume">
            <table width="100%" style="font-size: 8px" border="0">
                <tr>
                    <td width="65%" class="p-0 m-0"style="border-top: 1px solid black">
                        <img src="{{ 'images/location.png' }}" alt="#" style="width: 10px">
                        {{ $company->address }} {{ ucwords(strtolower($company->village->name)) }}
                        {{ ucwords(strtolower($company->district->name)) }}
                        {{ ucwords(strtolower($company->regency->name)) }}
                        {{ ucwords(strtolower($company->province->name)) }}
                        <br>
                        <img src="{{ 'images/phone.png' }}" alt="#" style="width: 10px">
                        {{ $company->contact }}
                        <br>
                        <img src="{{ 'images/email.png' }}" alt="#" style="width: 10px">
                        {{ $company->email }}
                    </td>
                    <td width="35%" class="p-0 m-0" align="right" valign="bottom">
                        <div style="font-size: 6px;">
                            Printed at {{ Carbon\Carbon::now()->formatLocalized('%d %b %Y') }} by {{ $user->name }}
                            | {PAGENO} of {nbpg}
                        </div>
                    </td>
                </tr>
            </table>
        </htmlpagefooter>
    </div>

    {{-- Medical Surveillance Report --}}
    <div class="page medical_surveillance">
        {{-- Cover --}}
        <br>
        <h1 style="margin-top: 20px;">HEALTH AND MEDICAL SURVEILLANCE</h1>
        <h1 class="red">{{ date('Y') }}</h1>
        <div class="img-center" style="margin-top: 40px; margin-bottom: 40px;">
            @if ($site_logo != null)
                <img src="{{ 'company/' . $site_logo }}" alt="" style="width:300px;">
            @else
                <img src="{{ 'images/logo.png' }}" alt="" style="width:300px;">
            @endif
        </div>
        @if ($checkup->patient->avatar != null)
            <table width="100%">
                <tr>
                    <td align="center">
                        <img src="{{ 'storage/patient/' . $checkup->patient->avatar }}" alt=""
                            class="img-patient">
                    </td>
                </tr>
            </table>
        @else
            @if ($checkup->patient->gender == 'male')
                <table width="100%">
                    <tr>
                        <td align="center">
                            <img src="{{ 'images/male.png' }}" alt="" class="img-patient">
                        </td>
                    </tr>
                </table>
            @else
                <table width="100%">
                    <tr>
                        <td align="center">
                            <img src="{{ 'images/female.png' }}" alt="" class="img-patient">
                        </td>
                    </tr>
                </table>
            @endif
        @endif
        <br>
        <table class="noborder">
            <tr class="noborder">
                <td class="noborder">NAMA</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $checkup->patient->name ?? '-' }}</td>
            </tr>
            <tr class="noborder">
                <td class="noborder">UMUR / TANGGAL LAHIR</td>
                <td class="noborder">:</td>
                <td class="noborder">
                    @php
                        $now = Carbon\Carbon::now();
                        $b_day = Carbon\Carbon::parse($checkup->patient->birthdate);
                        $age = $b_day->diffInYears($now);
                        echo $age . ' Tahun';
                    @endphp
                    /
                    {{ Carbon\Carbon::parse($checkup->patient->birthdate)->formatLocalized('%d-%m-%Y') ?? '-' }}
                </td>
            </tr>
            <tr class="noborder">
                <td class="noborder">S / N</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $checkup->serial_number ?? '-' }}</td>
            </tr>
            <tr class="noborder">
                <td class="noborder">DEPT / SERVICE</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $checkup->service ?? '-' }}</td>
            </tr>
            <tr class="noborder">
                <td class="noborder">LOKASI KERJA</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $checkup->workplace ?? '-' }}</td>
            </tr>
            <tr class="noborder">
                <td class="noborder" valign="top">JENIS PEMERIKSAAN</td>
                <td class="noborder" valign="top">:</td>
                <td class="noborder" valign="top">
                    @forelse ($checkup_types as $checkup_type)
                        <p>
                            @if ($checkup->checkup_type_id == $checkup_type->id)
                                <input type="checkbox" checked="true">
                            @else
                                <input type="checkbox">
                            @endif
                            {{ $checkup_type->name }}
                        </p>
                    @empty
                    @endforelse
                </td>
            </tr>
        </table>
        <div class="page-break"> </div>

        {{-- Questionnare --}}

        @if ($checkup->checkup_type && $checkup->checkup_type->name != 'Annual')
            <div class="box1">
                <div style="margin-left: 10px;">
                    <b>RAHASIA KEDOKTERAN</b>
                    Mohon diisi oleh pekerja atau calon pekerja
                </div>
            </div>
        @else
            <div class="box1">
                <div style="margin-left: 25px;">
                    <b>RAHASIA KEDOKTERAN</b>
                </div>
            </div>
        @endif

        <h2>HEALTH SURVEILLANCE {{ date('Y') }}</h2>
        <hr>
        <p style="text-align: justify;">
            Isilah formulir ini dengan sebenarnya dan selengkap-lengkapnya. Apabila ada hal-hal yang kurang dipahami
            segera hubungi dokter atau perawat.
        </p>

        <h3>IDENTITAS PEKERJA / CALON PEKERJA</h3>
        <table class="noborder" width="100%">
            <tr class="noborder">
                <td class="noborder" valign="top">1.</td>
                <td class="noborder" valign="top" colspan="2">Posisi / Jabatan</td>
                <td class="noborder" valign="top">:</td>
                <td class="noborder" valign="top" colspan="4">{{ $checkup->position ?? '-' }}</td>
            </tr>
            <tr class="noborder">
                <td class="noborder">2.</td>
                <td class="noborder" colspan="2">Status</td>
                <td class="noborder">:</td>
                <td class="noborder" colspan="4">
                    @if ($checkup->marital_status == 'belum-kawin')
                        <label for="belum_kawin">Belum Kawin</label>
                    @elseif($checkup->marital_status == 'kawin')
                        <label for="kawin">Kawin</label>
                    @elseif($checkup->marital_status == 'janda')
                        <label for="janda">Janda</label>
                    @elseif($checkup->marital_status == 'duda')
                        <label for="duda">Duda</label>
                    @elseif($checkup->marital_status == 'cerai')
                        <label for="cerai">Cerai</label>
                    @endif
                </td>
            </tr>
            <tr class="noborder">
                <td class="noborder" valign="top">3.</td>
                <td class="noborder" valign="top" colspan="2">Jumlah Tanggungan (Anak)</td>
                <td class="noborder" valign="top">:</td>
                <td class="noborder" valign="top">Laki-laki:</td>
                <td class="noborder" valign="top">{{ $checkup->amount_boy ?? '-' }} orang,</td>
                <td class="noborder" valign="top">Perempuan:</td>
                <td class="noborder" valign="top">{{ $checkup->amount_girl ?? '-' }} orang</td>
            </tr>
            <tr class="noborder">
                <td class="noborder" valign="top">4.</td>
                <td class="noborder" valign="top" colspan="2">Alamat Sekarang</td>
                <td class="noborder" valign="top">:</td>
                <td class="noborder" valign="top" colspan="4">
                    {{ $checkup->patient->address_2 ?? '-' }}
                </td>
            </tr>
            <tr class="noborder">
                <td class="noborder">5.</td>
                <td class="noborder" colspan="2">Telepon / Handphone </td>
                <td class="noborder">:</td>
                <td class="noborder" colspan="4">{{ $checkup->patient->contact ?? '-' }}</td>
            </tr>
            <tr class="noborder">
                <td class="noborder" valign="top">6.</td>
                <td class="noborder" valign="top" colspan="2">Extension Telp. Kantor</td>
                <td class="noborder" valign="top">:</td>
                <td class="noborder" valign="top">Kantor:</td>
                <td class="noborder" valign="top">{{ $checkup->office_phone ?? '-' }}</td>
                <td class="noborder" valign="top">Kamar (Lapangan):</td>
                <td class="noborder" valign="top">{{ $checkup->field_phone ?? '-' }}</td>
            </tr>
        </table>

        <h3>HANYA UNTUK CALON PEKERJA : RIWAYAT PEKERJAAN</h3>
        <table class="table" width="100%" style="margin-bottom:30px;">
            <th>
                <tr class="table">
                    <td class="table center" rowspan="2">No</td>
                    <td class="table center" rowspan="2">Posisi</td>
                    <td class="table center" rowspan="2">Lama Kerja</td>
                    <td class="table center" rowspan="2">Perusahaan</td>
                    <td class="table center" colspan="6">Lama paparan dalam jam/hari</td>
                </tr>
                <tr class="table">
                    <td class="table center">Bising</td>
                    <td class="table center">Kimia</td>
                    <td class="table center">Debu</td>
                    <td class="table center">Radiasi</td>
                    <td class="table center">Ergonomi</td>
                    <td class="table center">Lainnya</td>
                </tr>
            </th>
            @if ($checkup->job_experience->count() > 0)
                @foreach ($checkup->job_experience as $job_experience)
                    <tr class="table">
                        <td class="table center">{{ $loop->iteration }}.</td>
                        <td class="table center">{{ $job_experience->position ?? 0 }}</td>
                        <td class="table center">{{ $job_experience->duration ?? 0 }}</td>
                        <td class="table center">{{ $job_experience->company ?? 0 }}</td>
                        <td class="table center">{{ $job_experience->options->noisy ?? 0 }}</td>
                        <td class="table center">{{ $job_experience->options->chemistry ?? 0 }}</td>
                        <td class="table center">{{ $job_experience->options->dust ?? 0 }}</td>
                        <td class="table center">{{ $job_experience->options->radiation ?? 0 }}</td>
                        <td class="table center">{{ $job_experience->options->ergonomics ?? 0 }}</td>
                        <td class="table center">{{ $job_experience->options->other ?? 0 }}</td>
                    </tr>
                @endforeach
            @else
                <tr class="table">
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                    <td class="table center">-</td>
                </tr>
            @endif
        </table>

        <h3>HANYA UNTUK PEKERJA : RIWAYAT PEKERJAAN</h3>
        <p style="text-align: justify;">
            Tuliskan lama kerja pada masing-masing tempat kerja yang sesuai dengan posisi anda. Jumlah jam harus sesuai
            dengan lama kerja anda dalam sehari.
        </p>
        <table class="noborder">
            <tr class="noborder">
                <td class="noborder">1.</td>
                <td class="noborder">Office</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $medical_record->job->options->Office ?? 0 }}</td>
                <td class="noborder">jam/hari</td>
            </tr>
            <tr class="noborder">
                <td class="noborder">2.</td>
                <td class="noborder">Warehouse</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $medical_record->job->options->Warehouse ?? 0 }}</td>
                <td class="noborder">jam/hari</td>
            </tr>
            <tr class="noborder">
                <td class="noborder">3.</td>
                <td class="noborder">Workshop</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $medical_record->job->options->Workshop ?? 0 }}</td>
                <td class="noborder">jam/hari</td>
            </tr>
            <tr class="noborder">
                <td class="noborder">4.</td>
                <td class="noborder">Process Area</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $medical_record->job->options->ProcessArea ?? 0 }}</td>
                <td class="noborder">jam/hari</td>
            </tr>
            <tr class="noborder">
                <td class="noborder">5.</td>
                <td class="noborder">Well / Offshore</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $medical_record->job->options->Offshore ?? 0 }}</td>
                <td class="noborder">jam/hari</td>
            </tr>
        </table>

        <div class="page-break"> </div>

        <p style="text-align: justify;">
            <b>Petunjuk pengisian:</b> Isilah nomor yang sesuai dengan jawaban anda pada kotak jawaban yang telah
            tersedia di samping kanan. Jangan melingkari atau mencoret pilihan jawaban.
        </p>

        @php
            $questionnare_number = 1;
        @endphp
        @foreach ($checkupquestionnaregroups as $key => $group)
            <h3>{{ $group->name }}</h3>
            @if ($group->child->count() > 0)
                @foreach ($group->child as $sub_group)
                    <p>{{ $sub_group->name }}</p>
                    @if ($sub_group->items->count() > 0)
                        <table class="noborder" width="100%">
                            @foreach ($sub_group->items as $item)
                                @php
                                    $values = $questionnare_items
                                        ? $questionnare_items->firstWhere('id', $item->id)
                                        : ['value' => ''];
                                @endphp
                                <tr class="noborder">
                                    <td class="noborder" width="20px" valign="top">{{ $questionnare_number++ }}.
                                    </td>
                                    <td class="noborder" width="500px" valign="top">
                                        {{ $item->title }}
                                    </td>
                                    <td class="noborder" width="200px" valign="top" style="text-align: right;">
                                        @if ($item->question_type == 'qualitative' && $values)
                                            <input type="text" style="width: 200px"
                                                value="{!! ucwords(str_replace('-', ' ', $values['value'])) !!}">
                                        @elseif($item->question_type == 'quantitative' && $values)
                                            <input type="text" style="width: 200px"
                                                value="{!! ucwords(str_replace('-', ' ', $values['value'])) !!}  ({{ $item->unit }})">
                                        @endif
                                    </td>
                                </tr>
                                @if ($item->question_type == 'essai')
                                    <tr>
                                        <td></td>
                                        <td colspan="2" style="padding-bottom: 5px;font-style: italic;">
                                            <b>
                                                <i style="font-weigth: bold;">
                                                    {!! $values['value'] ?? '-' !!}
                                                </i>
                                            </b>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    @endif
                @endforeach
            @else
                @if ($group->items->count() > 0)
                    <table class="noborder" width="100%">
                        @foreach ($group->items as $item)
                            @php
                                $values = $questionnare_items
                                    ? $questionnare_items->firstWhere('id', $item->id)
                                    : ['value' => ''];
                            @endphp
                            <tr class="noborder">
                                <td class="noborder" width="20px" valign="top">{{ $questionnare_number++ }}.
                                </td>
                                <td class="noborder" width="500px" valign="top">
                                    {{ $item->title }}
                                </td>
                                <td class="noborder" width="200px" valign="top" style="text-align: right;">
                                    @if ($item->question_type == 'qualitative' && $values)
                                        <input type="text" style="width: 200px" value="{!! ucwords(str_replace('-', ' ', $values['value'])) !!}">
                                    @elseif($item->question_type == 'quantitative' && $values)
                                        <input type="text" style="width: 200px"
                                            value="{!! ucwords(str_replace('-', ' ', $values['value'])) !!}  ({{ $item->unit }})">
                                    @endif
                                </td>
                            </tr>
                            @if ($item->question_type == 'essai')
                                <tr>
                                    <td></td>
                                    <td colspan="2" style="padding-bottom: 5px;font-style: italic;">
                                        <b>
                                            <i style="font-weigth: bold;">
                                                {!! $values['value'] ?? '-' !!}
                                            </i>
                                        </b>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                @endif
            @endif
        @endforeach

        <div class="page-break"></div>

        <h3 align="center"><b>PERNYATAAN PERSETUJUAN PEMERIKSAAN KESEHATAN</b></h3>
        <p>Melalui pengisian formulir MCU (Medical Check Up) secara elektronik, dengan ini saya menyatakan persetujuan
            ketentuan sebagai berikut :</p>
        <ol>
            <li>Seluruh pernyataan yang saya jawab diatas adalah benar dan dapat dipertanggungjawabkan, apabila terdapat
                ketidaksesuaian dikemudian hari, saya bersedia diberi sanksi sesuai dengan ketentuan perusahaan.</li>
            <li>Saya menyetujui bahwa hasil pemeriksaan kesehatan yang telah dilakukan dapat disimpan dalam bentuk
                tertulis <i>(hardcopy)</i> dan elektronik <i>(softcopy)</i> oleh perusahaan.</li>
            <li>Saya menyetujui dan memberikan kewenangan pada staf kesehatan kerja perusahaan untuk melakukan analisa
                terkait hasil pemeriksaan kesehatan saya. Hal tersebut terkait kegunaan untuk dievaluasi berkaitan
                dengan pekerjaan saya diperusahaan ini.</li>
            <li>Saya memberikan wewenang bagi staf kesehatan kerja perusahaan untuk memberikan hasil analisa dan
                evaluasi pemeriksaan terhadap kesehatan saya kepada manajemen perusahaan agar dilakukan tindaklanjut
                berdasarkan hasil pemeriksaan kondisi fisik dan kesehatan saya. </li>
        </ol>
        <p>Demikian pernyataan persetujuan ini saya buat dengan sebenar benarnya dalam keadaan sadar dan tanpa ada
            paksaan dari pihak manapun.</p>
        @if ($is_checked == true)
            <p>☑ Saya telah menyetujui Syarat dan Ketentuan yang berlaku.</p>
        @else
            <p><input type="checkbox"> Saya telah menyetujui Syarat dan Ketentuan yang berlaku.</p>
        @endif
        <barcode code={!! route('guest.qr.checkup', ['type' => Hash::make('medical-surveillance'), 'validate' => $medical_record->id]) !!} size="1.2" type="QR" error="M" class="barcode"
            disableborder="1" />
        <div style="font-size: 6px;">
            <br>
            Printed at {{ Carbon\Carbon::now()->formatLocalized('%d %b %Y') }} by {{ $user->name }}
        </div>

        <div class="page-break"></div>

        {{-- Physical Examination --}}

        <div class="box1" style="text-align: center;">
            <div style="margin-left: 10px;">
                <b>CONFIDENTIAL</b>
                <br>
                <b>
                    To be filled by the Doctor
                </b>
            </div>
        </div>

        <h1 align="center" style="margin-bottom: 10px;">MEDICAL CHECK UP - {{ date('Y') }}</h1>
        <div class="box2">
            <h3 style="margin-left: 10px;">PHYSICAL EXAMINATION</h3>
        </div>
        <table class="table" width="100%">
            <tr class="table">
                <td class="table gray">NAME</td>
                <td class="table">{{ $checkup->patient->name ?? '-' }}</td>
                <td class="table gray">S / N</td>
                <td class="table">{{ $checkup->serial_number ?? '-' }}</td>
                <td class="table gray">DEPT</td>
                <td class="table">{{ $checkup->service ?? '-' }}</td>
            </tr>
        </table>

        <h3>I. GENERAL CONDITION</h3>
        <table class="table" width="100%">
            <tr class="table">
                <td class="table gray">Blood Pressure (supine)</td>
                <td class="table">{{ $record_physical_check->blood_pressure ?? '-' }}mmHG</td>
                <td class="table gray">Pulse</td>
                <td class="table">{{ $record_physical_check->heart_rate ?? '-' }}X/m</td>
                <td class="table gray">Respiration</td>
                <td class="table">{{ $record_physical_check->breath ?? '-' }}x/m</td>
                <td class="table gray">Temp.</td>
                <td class="table">{{ $record_physical_check->temperature ?? '-' }}&deg;C</td>
            </tr>
            <tr class="table">
                <td class="table gray">Weight (W)</td>
                <td class="table">{{ $record_physical_check->weight ?? '-' }} kg</td>
                <td class="table gray">Height (H)</td>
                <td class="table">{{ $record_physical_check->height ?? '-' }}cm</td>
                <td class="table gray">BMI</td>
                <td class="table">{{ $record_physical_check->body_mass_index ?? '-' }}</td>
                <td class="table gray">Waist</td>
                <td class="table">{{ $record_physical_check->waist ?? '-' }}cm</td>
            </tr>
            <tr class="table">
                <td class="table gray">BMI Conclusion</td>
                <td colspan="7">{{ $record_physical_check->body_mass_index_conclusion ?? '-' }}</td>
            </tr>
        </table>

        @if ($checkup_physical_value != null)
            <h3>II. PHYSICAL</h3>
            <table class="table" width="100%">
                <th>
                    <tr class="table gray" width="100%">
                        <td class="table gray">NO</td>
                        <td class="table gray">PHYSICAL</td>
                        <td class="table gray">A = ABNORMAL N = NORMAL</td>
                        <td class="table gray">A</td>
                        <td class="table gray">N</td>
                        <td class="table gray">
                            Describe abnormalities in detail
                            <br>
                            (circle words of importance and explain)
                        </td>
                    </tr>
                </th>
                @foreach ($checkup_physical_exams as $physical)
                    {{-- @php
                    $physical_value = $checkup_physical_value->where('checkup_physical_id', $physical->id)->first();
                @endphp --}}
                    <tr class="table">
                        <td class="table" style="width:4%;">{{ $loop->iteration ?? '' }}.</td>
                        <td class="table" style="width:22%;">{{ $physical->checkup_physical->name ?? '' }}</td>
                        <td class="table" style="width:40%;">{{ $physical->checkup_physical->description ?? '' }}
                        </td>
                        <td class="table" style="width:5%;">
                            @if ($physical->is_answer == true)
                                v
                            @endif
                        </td>
                        <td class="table" style="width:5%;">
                            @if ($physical->is_answer == false)
                                v
                            @endif
                        </td>
                        <td class="table" style="width:26%;">
                            {{ $physical->description ?? '' }}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif

        <div class="box2" style="margin-top: 20px;">
            <h2 style="margin-left: 10px; text-align: left;">SUPPORTIVE INVESTIGATIONS</h2>
        </div>

        @if (array_key_exists('supportive_investigations', $checkup->result))
            <h3>I. VISION</h3>
            @if (array_key_exists('vision', $checkup->result['supportive_investigations']))
                @php
                    $vision = $checkup->result['supportive_investigations']['vision'];
                @endphp
                <table class="table" width="100%">
                    <th>
                        <tr class="table gray">
                            <td class="table gray" rowspan="2">Vision</td>
                            <td class="table gray" colspan="2">Unaided</td>
                            <td class="table gray" colspan="2">With Spectacles</td>
                            <td class="table gray">Night Vision (if available)</td>
                            <td class="table gray">Color Blindness</td>
                        </tr>
                        <tr class="table">
                            <td class="table gray">Left</td>
                            <td class="table gray">Right</td>
                            <td class="table gray">Left</td>
                            <td class="table gray">Right</td>
                            <td class="table dark-gray"></td>
                            <td class="table" rowspan="3">
                                @if (array_key_exists('colour_blindness', $vision))
                                    @if ($vision['colour_blindness'] == 'normal')
                                        <input type="checkbox" id="normal" name="normal" value="normal"
                                            checked="true">
                                    @else
                                        <input type="checkbox" id="normal" name="normal" value="normal">
                                    @endif
                                    <label for="normal">Normal</label>
                                    <br>

                                    @if ($vision['colour_blindness'] == 'red-green-absent')
                                        <input type="checkbox" id="red_green_absent" name="red_green_absent"
                                            value="red-green-absent" checked="true">
                                    @else
                                        <input type="checkbox" id="red_green_absent" name="red_green_absent"
                                            value="red-green-absent">
                                    @endif
                                    <label for="red_green_absent">Red - Green Absent</label>
                                    <br>

                                    @if ($vision['colour_blindness'] == 'colour-blind')
                                        <input type="checkbox" id="color_blind" name="color_blind"
                                            value="colour-blind" checked="true">
                                    @else
                                        <input type="checkbox" id="color_blind" name="color_blind"
                                            value="color-blind">
                                    @endif
                                    <label for="color_blind">Color Blind</label>
                                @endif
                            </td>
                        </tr>
                    </th>
                    <tr class="table">
                        <td class="table gray">Distant</td>
                        <td class="table">{{ $vision['visions']['distant']['unaided']['left'] ?? '-' }}</td>
                        <td class="table">{{ $vision['visions']['distant']['unaided']['right'] ?? '-' }}</td>
                        <td class="table">{{ $vision['visions']['distant']['with_pectacles']['left'] ?? '-' }}</td>
                        <td class="table">{{ $vision['visions']['distant']['with_pectacles']['right'] ?? '-' }}</td>
                        <td class="table dark-gray"></td>
                    </tr>
                    <tr class="table">
                        <td class="table gray">Near</td>
                        <td class="table">{{ $vision['visions']['near']['unaided']['left'] ?? '-' }}</td>
                        <td class="table">{{ $vision['visions']['near']['unaided']['right'] ?? '-' }}</td>
                        <td class="table">{{ $vision['visions']['near']['with_pectacles']['left'] ?? '-' }}</td>
                        <td class="table">{{ $vision['visions']['near']['with_pectacles']['right'] ?? '-' }}</td>
                        <td class="table dark-gray"></td>
                    </tr>
                    <tr class="table">
                        <td class="table gray" colspan="3">Visual Fields (Normal > 70&deg;)</td>
                        <td class="table gray">Left</td>
                        <td class="table">{{ $vision['visual_fields']['left'] ?? '-' }}</td>
                        <td class="table gray" style="width: 50px;">Right</td>
                        <td class="table">{{ $vision['visual_fields']['right'] ?? '-' }}</td>
                    </tr>
                </table>
            @endif
        @endif
        <htmlpagefooter name="FooterMedicalSurveillance">
            <table width="100%" style="font-size: 8px" border="0">
                <tr>
                    <td width="40%" class="p-0 m-0" rowspan="3">
                        @foreach ($model_certificates as $model_certificate)
                            @if ($model_certificate->certificate->logo)
                                <img src="{{ '/storage/certificate/' . $model_certificate->certificate->logo }}"
                                    alt="" style="height:60px;">
                            @endif
                        @endforeach
                    </td>
                    <td width="60%" class="p-0 m-0" colspan="2" align="right" valign="bottom">
                        Medical Surveillance | {{ $checkup->patient->name }} | {PAGENO} of {nbpg}
                    </td>
                </tr>
            </table>
        </htmlpagefooter>
    </div>

    {{-- Jakarta Cardiovascular Score --}}
    @if (count($checkup_cardiovascular_rubric_selecteds) > 0)
        <div class="page jakarta_cardiovascular_score">
            <h1 align="center" style="font-size: 24px;">Jakarta Cardiovascular Score</h1>
            <br>
            <br>
            <table width="100%" style="font-size: 14px;">
                <tr>
                    <td width="20%">Nama</td>
                    <td width="3%">:</td>
                    <td width="77%">{{ $checkup->patient->name }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ ucwords(set_to_idn($checkup->patient->gender)) }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>
                        {{ Carbon\Carbon::parse($checkup->patient->birthdate)->formatLocalized('%d %B %Y') }}
                        /
                        @php
                            $now = Carbon\Carbon::now();
                            $b_day = Carbon\Carbon::parse($checkup->patient->birthdate);
                            $age = $b_day->diffInYears($now);
                            echo $age . ' Tahun';
                        @endphp
                    </td>
                </tr>
                <tr>
                    <td>Nomor Registrasi</td>
                    <td>:</td>
                    <td>{{ $medical_record->registration_number }}</td>
                </tr>
                <tr>
                    <td>Tanggal MCU</td>
                    <td>:</td>
                    <td>{{ Carbon\Carbon::parse($medical_record->in_date)->formatLocalized('%d %B %Y') }}</td>
                </tr>
            </table>
            <br>
            <table width="100%" border="1" style="font-size: 14px;">
                <tr>
                    <td style="padding: 4px;" class="gray" colspan="2"><b>Risk Factor</b></td>
                    <td style="padding: 4px;" class="gray" align="center"><b>Score</b></td>
                </tr>
                @forelse ($checkup_cardiovascular_rubric_selecteds as $cardiovascular)
                    @if ($cardiovascular->cardiovascular_rubric_group_id == 1)
                        <tr>
                            <td style="padding: 4px;" width="30%">
                                {{ $cardiovascular->cardiovascularRubricParent ? $cardiovascular->cardiovascularRubricParent->title : '' }}
                            </td>
                            <td style="padding: 4px;" width="50%" align="center">
                                {{ $cardiovascular->cardiovascularRubric ? $cardiovascular->cardiovascularRubric->title : '' }}
                            </td>
                            <td style="padding: 4px;" width="20%" align="center">
                                {{ $cardiovascular->cardiovascularRubric ? $cardiovascular->cardiovascularRubric->score : '' }}
                            </td>
                        </tr>
                    @endif
                @empty
                @endforelse
            </table>
            <br>
            <table width="100%" border="1" style="font-size: 14px;">
                @forelse ($checkup_cardiovascular_rubric_selecteds as $cardiovascular)
                    @if ($cardiovascular->cardiovascular_rubric_group_id == 2)
                        <tr>
                            <td style="padding: 4px;" class="gray" rowspan="2" align="center">Total Score</td>
                            <td style="padding: 4px;" align="center">
                                <h2>{{ $cardiovascular_total_score }}</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 4px;" align="center">
                                <h2>{{ $cardiovascular->cardiovascularRubric ? $cardiovascular->cardiovascularRubric->title : '' }}
                                </h2>
                            </td>
                        </tr>
                    @endif
                @empty
                @endforelse
            </table>
            <htmlpagefooter name="FooterJakartaCardiovascularScore">
                <table width="100%" style="font-size: 8px" border="0">
                    <tr>
                        <td width="40%" class="p-0 m-0">
                            {{ $company->name }}
                        </td>
                        <td width="60%" class="p-0 m-0" align="right" valign="bottom">
                            Jakarta Cardiovascular Score | {{ $checkup->patient->name }} | {PAGENO} of {nbpg}
                        </td>
                    </tr>
                </table>
            </htmlpagefooter>
        </div>
    @endif

    {{-- MCU --}}
    @if ($laboratory_service != null)

        <div class="page mcu">
            <table width="100%">
                <tr>
                    <td align="left" rowspan="2">
                        @if ($site_logo != null)
                            <img src="{{ 'company/' . $site_logo }}" alt=""
                                style="width:100px; margin-right: 10px;">
                        @else
                            <img src="{{ 'images/logo.png' }}" alt=""
                                style="width:100px; margin-right: 10px;">
                        @endif
                        @foreach ($model_certificates as $model_certificate)
                            @if ($model_certificate->certificate->logo)
                                <img src="{{ '/storage/certificate/' . $model_certificate->certificate->logo }}"
                                    alt="" style="height:40px;">
                            @endif
                        @endforeach
                    </td>
                    <td align="right" style="vertical-align: text-bottom">
                        <p style="font-size: 17px;">Lembar Hasil</p>
                        <p style="font-size: 17px;">Pemeriksaan Laboratorium</p>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
            <br>

            <table width="100%" cellspacing="0">
                <tr>
                    <td valign="top" width="17%"
                        style="padding: 4px; font-size: 12px; border-left: 3px solid black; border-top: 3px solid black;">
                        No. Reg
                    </td>
                    <td valign="top" width="2%"
                        style="padding: 4x; font-size: 12px; border-top: 3px solid black;">:</td>
                    <td valign="top" width="30%"
                        style="padding: 4px; font-size: 12px; border-right: 3px solid black; border-top: 3px solid black;">
                        {{ $medical_record->registration_number }}
                    </td>
                    <td valign="top" width="1%"></td>
                    <td valign="top" width="22%"
                        style="padding: 4px; font-size: 12px; border-left: 3px solid black; border-top: 3px solid black;">
                        Jenis Sampel
                    </td>
                    <td valign="top" width="2%"
                        style="padding: 4x; font-size: 12px; border-top: 3px solid black;">:</td>
                    <td valign="top" width="25%"
                        style="padding: 4px; font-size: 12px; border-right: 3px solid black;  border-top: 3px solid black;">
                        <div class="row">
                            @if ($laboratory_service->remark != null)
                                @foreach ($laboratory_service->remark as $sample)
                                    {{ $sample['name'] }},
                                @endforeach
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-left: 3px solid black;">
                        Nama
                    </td>
                    <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                        {{ $checkup->patient->name ?? '-' }}
                    </td>
                    <td valign="top"></td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-left: 3px solid black;">
                        Tgl Pengambilan Sampel
                    </td>
                    <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                        {{ $laboratory_service->date_sample_start ? Carbon\Carbon::parse($laboratory_service->date_sample_start)->formatLocalized('%d-%m-%Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-left: 3px solid black;"
                        valign="top">
                        Tanggal Lahir/Umur
                    </td>
                    <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-right: 3px solid black;"
                        valign="top">
                        {{ $checkup->patient->birthplace ? $checkup->patient->birthplace : '-' }},
                        {{ Carbon\Carbon::parse($checkup->patient->birthdate)->formatLocalized('%d %B %Y') }}
                        /
                        @php
                            $now = Carbon\Carbon::now();
                            $b_day = Carbon\Carbon::parse($checkup->patient->birthdate);
                            $age = $b_day->diffInYears($now);
                            echo $age . ' Tahun';
                        @endphp
                    </td>
                    <td></td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-left: 3px solid black;">
                        Jam Pengambilan Sampel
                    </td>
                    <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                        {{ $laboratory_service->date_sample_start ? Carbon\Carbon::parse($laboratory_service->date_sample_start)->formatLocalized('%H:%M') : '' }}
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-left: 3px solid black;">Jabatan
                    </td>
                    <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                        {{ $checkup->patient->job ?? '-' }}</td>
                    <td></td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-left: 3px solid black;">
                        Dokter
                    </td>
                    <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                        {{ $laboratory_service->user ? $laboratory_service->user->name : '-' }}
                    </td>
                </tr>
                <tr style="border-bottom: 2px solid black">
                    <td valign="top"
                        style="padding: 4px; font-size: 12px; border-left: 3px solid black; border-bottom: 3px solid black;">
                    </td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-bottom: 3px solid black;"></td>
                    <td valign="top"
                        style="padding: 4px; font-size: 12px; border-right: 3px solid black; border-bottom: 3px solid black;">
                    </td>
                    <td></td>
                    <td valign="top"
                        style="padding: 4px; font-size: 12px; border-left: 3px solid black; border-bottom: 3px solid black;">
                        Petugas Pemeriksa
                    </td>
                    <td valign="top" style="padding: 4px; font-size: 12px; border-bottom: 3px solid black;">:</td>
                    <td valign="top"
                        style="padding: 4px; font-size: 12px; border-right: 3px solid black; border-bottom: 3px solid black;">
                        {{ $laboratory_service->examiner_officer ?? '-' }}
                    </td>
                </tr>
            </table>
            <br>
            <table border="1" cellspacing="0" width="100%">
                <tr>
                    <td align="center" style="font-size: 14px;">Jenis Pemeriksaan</td>
                    <td align="center" style="font-size: 14px;">Hasil</td>
                    <td align="center" style="font-size: 14px;">Satuan</td>
                    <td align="center" style="font-size: 14px;">Nilai Rujukan</td>
                    <td align="center" style="font-size: 14px;">Metode</td>
                </tr>
                @foreach ($group_selecteds as $group_selected)
                    <tr>
                        <td style="padding: 5px; font-size: 14px; padding-left: 5px; font-size: 12px;">
                            {{ $group_selected->group->name }}</td>
                        <td align="center" style="padding: 5px;"></td>
                        <td align="center" style="padding: 5px;"></td>
                        <td align="center" style="padding: 5px;"></td>
                        <td align="center" style="padding: 5px;"></td>
                    </tr>
                    @foreach ($group_selected->formSelecteds as $form_selected)
                        <tr>
                            <td width="45%" style="padding: 5px; padding-left: 20px; font-size: 12px;">
                                {{ $form_selected->form->title }}</td>
                            <td width="5%" align="center" style="padding: 5px; font-size: 12px;">
                                @if ($form_selected->result)
                                    {{ $form_selected->result ?? '-' }}
                                    @if ($form_selected->min != null)
                                        @if ($form_selected->min >= $form_selected->result)
                                            <span style="color: red;">*</span>
                                        @endif
                                    @endif
                                    @if ($form_selected->max != null)
                                        @if ($form_selected->result >= $form_selected->max)
                                            <span style="color: red;">*</span>
                                        @endif
                                    @endif
                                @endif
                            </td>
                            <td width="10%" align="center" style="padding: 5px; font-size: 12px;">
                                {{ $form_selected->unit }}</td>
                            <td width="15%" align="center" style="padding: 5px; font-size: 12px;">
                                @if ($form_selected->form->type == 'quantitative')
                                    {{ $form_selected->min }} - {{ $form_selected->max }}
                                @else
                                    {!! $form_selected->reference_value ?? '-' !!}
                                @endif
                            </td>
                            <td width="25%" align="center" style="padding: 5px; font-size: 12px;">
                                {!! $form_selected->method !!}</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
            <br>
            <table width="100%" cellspacing="0" border="0">
                <tr>
                    <td width="100%">
                        <i>NB :</i>
                        <br>
                        <i>Jika hasil dibawah/diatas nilai normal bertanda bintang warna merah (<span
                                style="color: red;">*</span>)</i>
                        <br>
                        <br>
                        {{ ucwords(strtolower($company->regency->name)) ?? '' }},
                        {{ Carbon\Carbon::parse($medical_record->in_date)->formatLocalized('%d %B %Y') }}
                        <br>
                        Laboratorium Klinik
                        <br>
                        <br>
                        <barcode code={!! route('guest.qr.laboratory', [
                            'type' => Hash::make('laboratory-general-mcu'),
                            'validate' => $laboratory_service->id,
                        ]) !!} size="1.2" type="QR" error="M"
                            class="barcode" disableborder="1" />
                        <br>
                        <br>
                        <b><u>{{ $laboratory_service->user->name ?? '-' }}</u></b>
                        @if ($certificate_number_physician_laboratory)
                            <br>
                            SIP. {{ $certificate_number_physician_laboratory }}
                        @endif
                    </td>
                </tr>
            </table>
            <htmlpagefooter name="FooterMCU">
                <table width="100%" style="font-size: 8px" border="0">

                    <div class="page mcu">
                        <table width="100%">

                            <tr>
                                <td align="left" rowspan="2">
                                    @if ($site_logo != null)
                                        <img src="{{ 'company/' . $site_logo }}" alt=""
                                            style="width:100px; margin-right: 10px;">
                                    @else
                                        <img src="{{ 'images/logo.png' }}" alt=""
                                            style="width:100px; margin-right: 10px;">
                                    @endif
                                    @foreach ($model_certificates as $model_certificate)
                                        @if ($model_certificate->certificate->logo)
                                            <img src="{{ '/storage/certificate/' . $model_certificate->certificate->logo }}"
                                                alt="" style="height:40px;">
                                        @endif
                                    @endforeach
                                </td>
                                <td align="right" style="vertical-align: text-bottom">
                                    <p style="font-size: 17px;">Lembar Hasil</p>
                                    <p style="font-size: 17px;">Pemeriksaan Laboratorium</p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <br>

                        <table width="100%" cellspacing="0">
                            <tr>
                                <td valign="top" width="17%"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black; border-top: 3px solid black;">
                                    No. Reg
                                </td>
                                <td valign="top" width="2%"
                                    style="padding: 4x; font-size: 12px; border-top: 3px solid black;">:</td>
                                <td valign="top" width="30%"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black; border-top: 3px solid black;">
                                    {{ $medical_record->registration_number }}
                                </td>
                                <td valign="top" width="1%"></td>
                                <td valign="top" width="22%"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black; border-top: 3px solid black;">
                                    Jenis Sampel
                                </td>
                                <td valign="top" width="2%"
                                    style="padding: 4x; font-size: 12px; border-top: 3px solid black;">:</td>
                                <td valign="top" width="25%"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black;  border-top: 3px solid black;">
                                    <div class="row">
                                        @if ($laboratory_service->remark != null)
                                            @foreach ($laboratory_service->remark as $sample)
                                                {{ $sample['name'] }},
                                            @endforeach
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black;">
                                    Nama
                                </td>
                                <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                                    {{ $checkup->patient->name ?? '-' }}
                                </td>
                                <td valign="top"></td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black;">
                                    Tgl Pengambilan Sampel
                                </td>
                                <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                                    {{ $laboratory_service->date_sample_start ? Carbon\Carbon::parse($laboratory_service->date_sample_start)->formatLocalized('%d-%m-%Y') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black;"
                                    valign="top">
                                    Tanggal Lahir/Umur
                                </td>
                                <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black;"
                                    valign="top">
                                    {{ $checkup->patient->birthplace ? $checkup->patient->birthplace : '-' }},
                                    {{ Carbon\Carbon::parse($checkup->patient->birthdate)->formatLocalized('%d %B %Y') }}
                                    /
                                    @php
                                        $now = Carbon\Carbon::now();
                                        $b_day = Carbon\Carbon::parse($checkup->patient->birthdate);
                                        $age = $b_day->diffInYears($now);
                                        echo $age . ' Tahun';
                                    @endphp
                                </td>
                                <td></td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black;">
                                    Jam Pengambilan Sampel
                                </td>
                                <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                                    {{ $laboratory_service->date_sample_start ? Carbon\Carbon::parse($laboratory_service->date_sample_start)->formatLocalized('%H:%M') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black;">Jabatan
                                </td>
                                <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                                    {{ $checkup->patient->job ?? '-' }}</td>
                                <td></td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black;">
                                    Dokter
                                </td>
                                <td valign="top" style="padding: 4px; font-size: 12px;">:</td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black;">
                                    {{ $laboratory_service->user ? $laboratory_service->user->name : '-' }}
                                </td>
                            </tr>
                            <tr style="border-bottom: 2px solid black">
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black; border-bottom: 3px solid black;">
                                </td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-bottom: 3px solid black;"></td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black; border-bottom: 3px solid black;">
                                </td>
                                <td></td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-left: 3px solid black; border-bottom: 3px solid black;">
                                    Petugas Pemeriksa
                                </td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-bottom: 3px solid black;">:</td>
                                <td valign="top"
                                    style="padding: 4px; font-size: 12px; border-right: 3px solid black; border-bottom: 3px solid black;">
                                    {{ $laboratory_service->examiner_officer ?? '-' }}
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="1" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" style="font-size: 14px;">Jenis Pemeriksaan</td>
                                <td align="center"
                                    style="font-size: 14px; border-left: 3px solid black; border-top: 3px solid black; border-right: 3px solid black;">
                                    <b>Hasil</b>
                                </td>
                                <td align="center" style="font-size: 14px;">Satuan</td>
                                <td align="center" style="font-size: 14px;">Nilai Rujukan</td>
                                <td align="center" style="font-size: 14px;">Metode</td>
                            </tr>
                            @foreach ($group_selecteds as $group_selected)
                                <tr>
                                    <td style="padding: 5px; font-size: 14px; padding-left: 5px; font-size: 12px;">
                                        <b>{{ $group_selected->group->name }}</b>
                                    </td>
                                    <td align="center"
                                        style="padding: 5px; border-left: 3px solid black; border-right: 3px solid black;">
                                    </td>
                                    <td align="center" style="padding: 5px;"></td>
                                    <td align="center" style="padding: 5px;"></td>
                                    <td align="center" style="padding: 5px;"></td>
                                </tr>
                                @foreach ($group_selected->formSelecteds as $form_selected)
                                    <tr>
                                        <td width="45%" style="padding: 5px; padding-left: 20px; font-size: 12px;">
                                            {{ $form_selected->form->title }}</td>
                                        <td width="5%" align="center"
                                            style="padding: 5px; font-size: 12px; border-left: 3px solid black; border-right: 3px solid black;">
                                            @if ($form_selected->result)
                                                {{ $form_selected->result ?? '-' }}
                                                @if ($form_selected->min != null)
                                                    @if ($form_selected->min >= $form_selected->result)
                                                        <span style="color: red;">*</span>
                                                    @endif
                                                @endif
                                                @if ($form_selected->max != null)
                                                    @if ($form_selected->result >= $form_selected->max)
                                                        <span style="color: red;">*</span>
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td width="10%" align="center" style="padding: 5px; font-size: 12px;">
                                            {{ $form_selected->unit }}</td>
                                        <td width="15%" align="center" style="padding: 5px; font-size: 12px;">
                                            @if ($form_selected->form->type == 'quantitative')
                                                {{ $form_selected->min }} - {{ $form_selected->max }}
                                            @else
                                                {!! $form_selected->reference_value ?? '-' !!}
                                            @endif
                                        </td>
                                        <td width="25%" align="center" style="padding: 5px; font-size: 12px;">
                                            {!! $form_selected->method !!}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                        <br>
                        <table width="100%" cellspacing="0" border="0">
                            <tr>
                                <td width="100%">
                                    <i>NB :</i>
                                    <br>
                                    <i>Jika hasil dibawah/diatas nilai normal bertanda bintang warna merah (<span
                                            style="color: red;">*</span>)</i>
                                    <br>
                                    <br>
                                    {{ ucwords(strtolower($company->regency->name)) ?? '' }},
                                    {{ Carbon\Carbon::parse($medical_record->in_date)->formatLocalized('%d %B %Y') }}
                                    <br>
                                    Laboratorium Klinik
                                    <br>
                                    <br>
                                    <barcode code={!! route('guest.qr.laboratory', [
                                        'type' => Hash::make('laboratory-general-mcu'),
                                        'validate' => $laboratory_service->id,
                                    ]) !!} size="1.2" type="QR"
                                        error="M" class="barcode" disableborder="1" />
                                    <br>
                                    <br>
                                    <b><u>{{ $laboratory_service->user->name ?? '-' }}</u></b>
                                    @if ($certificate_number_physician_laboratory)
                                        <br>
                                        SIP. {{ $certificate_number_physician_laboratory }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <htmlpagefooter name="FooterMCU">
                            <table width="100%" style="font-size: 8px" border="0">
                                <tr>
                                    <td width="40%" class="p-0 m-0" rowspan="3">
                                        @foreach ($model_certificates as $model_certificate)
                                            @if ($model_certificate->certificate->logo)
                                                <img src="{{ '/storage/certificate/' . $model_certificate->certificate->logo }}"
                                                    alt="" style="height:60px;">
                                            @endif
                                        @endforeach
                                    </td>
                                    <td width="60%" class="p-0 m-0" colspan="2" align="right"
                                        valign="bottom">
                                        MCU | {{ $checkup->patient->name }} | {PAGENO} of {nbpg}
                                    </td>
                                </tr>
                            </table>
                        </htmlpagefooter>
                    </div>
    @endif

    {{-- Radiology --}}
    @if ($radiology)
        @forelse ($radiology_examination_selecteds as $radiology_examination_selected)
            <div class="page-break-before radiology">
                <table width="100%">
                    <tr>
                        <td align="left" rowspan="2">
                            @if ($site_logo != null)
                                <img src="{{ 'company/' . $site_logo }}" alt=""
                                    style="width:100px; margin-right: 10px;">
                            @else
                                <img src="{{ 'images/logo.png' }}" alt=""
                                    style="width:100px; margin-right: 10px;">
                            @endif
                            @foreach ($model_certificates as $model_certificate)
                                @if ($model_certificate->certificate->logo)
                                    <img src="{{ '/storage/certificate/' . $model_certificate->certificate->logo }}"
                                        alt="" style="height:60px;">
                                @endif
                            @endforeach
                        </td>
                        <td align="right" style="vertical-align: text-bottom">
                            <p style="font-size: 17px;">Lembar Hasil</p>
                            <p style="font-size: 17px;">Pemeriksaan Radiologi</p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                <table width="100%" border="0" style="margin-top: 40px; margin-bottom: 20px;">
                    <tr>
                        <td width="20%"><b>Nama</b></td>
                        <td width="3%"><b>:</b></td>
                        <td><b>{{ $checkup->patient->name }}</b></td>
                    </tr>
                    <tr>
                        <td><b>Umur/Tgl Lahir</b></td>
                        <td><b>:</b></td>
                        <td>
                            <b>
                                @php
                                    $now = Carbon\Carbon::now();
                                    $b_day = Carbon\Carbon::parse($checkup->patient->birthdate);
                                    $age = $b_day->diffInYears($now);
                                    echo $age . ' Tahun';
                                @endphp
                                /
                                {{ Carbon\Carbon::parse($checkup->patient->birthdate)->formatLocalized('%d %B %Y') }}
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td><b>:</b></td>
                        <td>
                            <b>
                                @if ($checkup->patient->gender == 'male')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </b>
                        </td>
                    </tr>
                </table>
                <br>
                <h3 align="center" style="margin-bottom: 20px">Interpretasi Hasil</h3>
                <br>
                <b>{{ $radiology_examination_selected->radiology_examination->title }}</b>
                {!! $radiology_examination_selected->result !!}
                <b>Kesan :</b>
                <br>
                {!! $radiology_examination_selected->impression !!}
                <table width="100%" border="0" style="padding-top: 20px;">
                    <tr>
                        <td width="60%"></td>
                        <td width="40%" style="vertical-align: text-bottom" align="center">
                            {{ ucwords(strtolower($company->regency->name)) ?? '' }},
                            {{ Carbon\Carbon::parse($medical_record->in_date)->formatLocalized('%d %B %Y') }}
                            <br>
                            <br>
                            <barcode code={!! route('guest.qr.radiology', ['type' => Hash::make('radiology-print'), 'validate' => $radiology->id]) !!} size="1.2" type="QR" error="M"
                                class="barcode" disableborder="1" />
                            <br>
                            <br>
                            <b><u>{{ $radiology->physician->name ?? '-' }}</u></b>
                            @if ($certificate_number_physician_radiology)
                                <br>
                                SIP. {{ $certificate_number_physician_radiology }}
                            @endif
                        </td>
                    </tr>
                </table>
                <htmlpagefooter name="FooterRadiology">
                    <table width="100%" style="font-size: 8px" border="0">
                        <tr>
                            <td width="65%" class="p-0 m-0"style="border-top: 1px solid black">
                                <img src="{{ 'images/location.png' }}" alt="#" style="width: 10px">
                                {{ $company->address }} {{ ucwords(strtolower($company->village->name)) }}
                                {{ ucwords(strtolower($company->district->name)) }}
                                {{ ucwords(strtolower($company->regency->name)) }}
                                {{ ucwords(strtolower($company->province->name)) }}
                                <br>
                                <img src="{{ 'images/phone.png' }}" alt="#" style="width: 10px">
                                {{ $company->contact }}
                                <br>
                                <img src="{{ 'images/email.png' }}" alt="#" style="width: 10px">
                                {{ $company->email }}
                            </td>
                            <td width="35%" class="p-0 m-0" align="right" valign="bottom">
                                <div style="font-size: 6px;">
                                    Printed at {{ Carbon\Carbon::now()->formatLocalized('%d %b %Y') }} by
                                    {{ $user->name }} | {PAGENO} of {nbpg}
                                </div>
                            </td>
                        </tr>
                    </table>
                </htmlpagefooter>
            </div>
        @empty
        @endforelse
    @endif

</body>

</html>
