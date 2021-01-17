@extends('layouts.admin-lte.print')

@section('content')
<div class="container-fluid ">
    <div class="row justify-content-center py-5 DivIdToPrint">
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
                        {{-- @for ($i = 0; $i < 1; $i++) --}}
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
                        {{-- @endfor --}}
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
        </div>
    </div>
    <div class="pagebreak"></div>
    <div class="row justify-content-center py-5 DivIdToPrint">
        <div class="col">
            <div class="row py-2">
                <div class="col px-4">
                    <table class="table table-hover display nowrap text-center table-bordered" style="width:100%;">
                        @php
                        @endphp
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;">No</th>
                                <th style="vertical-align: middle;">Kegiata Ekstrakurikuler</th>
                                <th style="vertical-align: middle;">Nilai</th>
                                <th style="vertical-align: middle;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataEkskul as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->ekskul->name }}</td>
                                <td>{{ $data->nilai }}</td>
                                <td>{{ $data->keterangan }}</td>
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
                        @endphp
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;">No</th>
                                <th style="vertical-align: middle;">Nilai Sikap dan Kepribadian</th>
                                <th style="vertical-align: middle;">Nilai</th>
                                <th style="vertical-align: middle;">Keterangan Absensi</th>
                                <th style="vertical-align: middle;">Jumlah Hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Akhlak</td>
                                <td>{{ !empty($dataSikap) ? $dataSikap->akhlak : '' }}</td>
                                <td>Sakit</td>
                                <td>{{ !empty($dataKehadiran) ? $dataKehadiran->sakit : '-' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kerajinan</td>
                                <td>{{ !empty($dataSikap) ? $dataSikap->kerajinan : '' }}</td>
                                <td>Izin</td>
                                <td>{{ !empty($dataKehadiran) ? $dataKehadiran->izin : '-' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kedisiplinan</td>
                                <td>{{ !empty($dataSikap) ? $dataSikap->kedisiplinan : '' }}</td>
                                <td>Tanpa Keterangan</td>
                                <td>{{ !empty($dataKehadiran) ? $dataKehadiran->tanpa_keterangan : '-' }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kebersihan dan Kerapihan</td>
                                <td>{{ !empty($dataSikap) ? $dataSikap->kebersihan_dan_kerapihan : '' }}</td>
                                <td>Jumlah</td>
                                @php
                                    $jumlah = 0;
                                    if(!empty($dataKehadiran)){
                                        $jumlah = int($dataKehadiran->sakit) + int($dataKehadiran->izin) + int($dataKehadiran->tanpa_keterangan);   
                                    } 
                                @endphp
                                <td>{{ $jumlah }}</td>
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
                                <th style="vertical-align: middle;">Pesan Wali Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">{{ !empty($dataSikap) ? $dataSikap->keterangan : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            @php
                $now = \Carbon\Carbon::now();
            @endphp
            {{-- ( ...................................... ) --}}
            <div class="row py-3">
                <div class="col">
                    
                    <div class="row py-2 text-center">
                        <div class="col">Mengetahui</div>
                        <div class="col">Tangerang, {{ $now->day . ' ' . $now->monthName . ' ' . $now->year }}</div>
                    </div>
                    @php
                     $walikelas = \App\WaliKelas::where('kelas_id', $nilai->kelas_id)->first();   
                    @endphp
                    <div class="row py-2 text-center">
                        <div class="col">Orang Tua / Wali</div>
                        <div class="col">Wali Kelas</div>
                    </div>
                    <div class="row py-2 text-center">
                        <div class="col">
                            <br><br><br>
                        </div>
                        <div class="col">
                            @if (!empty($walikelas))
                            <img src="{{url('/img/'. $walikelas->ttd)}}" alt="..."  style="height:80px;">
                            @endif
                        </div>
                    </div>
                    <div class="row py-2 text-center">
                        <div class="col"><b><u>{{ $nilai->siswa->nama_orang_tua }}</u></b></div>
                        <div class="col"><b><u>
                            {{ !empty($walikelas) ? $walikelas->nama : '......................................' }}
                        </u></b></div>
                    </div>
                    <div class="row text-center">
                        <div class="col"></div>
                        <div class="col">NIP : {{ !empty($walikelas) ? $walikelas->nip : '......................................' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection