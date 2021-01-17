@extends('layouts.admin-lte.print')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
          {{-- <br><br><br> --}}
          <center>
              <div class="row">
                {{-- <div>
                    <img src="{{url('/img/logo_kop.png')}}" alt="..."  style="position:absolute;z-index:1; left:-30px; height:600px;">
                </div> --}}
                  <div class="col">
                      <h3>YAYASAN PENDIDIKAN AL HUSNA TANGERANG</h3>
                      <h3><b>MADRASAH TSANAWIYAH AL HUSNA TANGERANG</b></h3>
                      <h4><b>TERAKREDITASI “B”</b></h4>
                      <h5>Badan Akreditasi Nasional Sekolah/Madrasah(BAN-S/M)</h5>
                      <h5>Jl. A. Damyati No. 43-45 Kel. Sukarasa Kec. Tangerang Kota Tangerang – Banten</h5>
                      <h5>Email : mtsalhusnatangerang13@gmail.com No.Rec. 0120-01-009108-53-8</h5>
                  </div>
              </div>
          </center>
          <hr style="border: 2px solid black;">
          <center>
              <div class="row">
                  <div class="col">
                      <h3><b>Laporan penilaian hasil belajar siswa semester II (genap)</b></h3>
                      <h3><b>Tahun pelajaran 2019/2020</b></h3>
                  </div>
              </div>
          </center>
          <div class="row py-2">
            <div class="col px-4">
                <table class="table table-hover display nowrap text-center table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Lengkap</td>
                            <td>L/P</td>
                            <td>NIS</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $nilai->siswa->nama }}</td>
                            <td>{{ $nilai->siswa->jenis_kelamin }}</td>
                            <td>{{ $nilai->kelas->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
          <div class="row py-2">
            <div class="col px-4">
                <table class="table table-hover display nowrap text-center table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">No</th>
                            <th rowspan="2" style="vertical-align: middle;">Mata Pelajaran</th>
                            <th rowspan="2" style="vertical-align: middle;">KKM</th>
                            <th colspan="4" rowspan="1" style="vertical-align: middle;">Nilai</th>
                            <th rowspan="2" style="vertical-align: middle;">Deskripsi Kemajuan Belajar</th>
                        </tr>
                        <tr>
                            <th colspan="3">Angka</th>
                            <th>Huruf</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataNilai as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->mapel->name }}</td>
                            <td>{{ $data->kkm }}</td>
                            <td colspan="3">{{ $data->mean() }}</td>
                            <td>{{ $data->terbilang() }}</td>
                            <td>{{ $data->deskripsi() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
          <div class="row py-2">
            <div class="col px-4">
                <table class="table table-hover display nowrap text-center table-bordered" style="width:100%;">
                    @php
                    $format = new \NumberFormatter("id", \NumberFormatter::SPELLOUT); 
                    $sumTugas = $dataNilai->sum('tugas');
                    $sumUts = $dataNilai->sum('uts');
                    $sumUas = $dataNilai->sum('uas');
                    $sumNilai = round(($sumTugas + $sumUas + $sumUts) / 3);
                    $meanNilai = round($sumNilai / $dataNilai->count());
                    @endphp
                    <tbody>
                        <tr>
                            <td style="font-weight: bold">Jumlah</td>
                            <td style="font-weight: bold">{{ $sumNilai }}</td>
                            <td colspan="3">
                                {{ ucwords($format->format($sumNilai)) }}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Rata-Rata</td>
                            <td style="font-weight: bold">{{ $meanNilai }}</td>
                            <td colspan="3">
                                {{ ucwords($format->format($meanNilai)) }}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Peringkat Ke</td>
                            <td style="font-weight: bold">20</td>
                            <td>dari</td>
                            <td style="font-weight: bold">40</td>
                            <td>Siswa</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
          <div class="row py-2">
            <div class="col px-4">
                <table class="table table-hover display nowrap text-center table-bordered" style="width:100%;">
                    @php
                    @endphp
                    <thead>
                        <tr>
                            <th style="vertical-align: middle;">Nama</th>
                            <th style="vertical-align: middle;">Nilai</th>
                            <th style="vertical-align: middle;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataEkskul as $data)
                        <tr>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection