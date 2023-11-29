<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Jadwal
 *
 * @property int $id
 * @property int $hari_id
 * @property int $kelas_id
 * @property int $mapel_id
 * @property int $guru_id
 * @property string $jam_mulai
 * @property string $jam_selesai
 * @property int $ruang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Guru $guru
 * @property-read \App\Hari $hari
 * @property-read \App\Kelas $kelas
 * @property-read \App\Mapel $mapel
 * @property-read \App\Ruang $ruang
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal newQuery()
 * @method static \Illuminate\Database\Query\Builder|Jadwal onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereHariId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereJamMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereJamSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereRuangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Jadwal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Jadwal withoutTrashed()
 * @mixin \Eloquent
 */
class Jadwal extends Model
{
  use SoftDeletes;

  protected $fillable = ['hari_id', 'kelas_id', 'mapel_id', 'guru_id', 'jam_mulai', 'jam_selesai', 'ruang_id'];

  public function hari()
  {
    return $this->belongsTo('App\Hari')->withDefault();
  }

  public function kelas()
  {
    return $this->belongsTo('App\Kelas')->withDefault();
  }

  public function mapel()
  {
    return $this->belongsTo('App\Mapel')->withDefault();
  }

  public function guru()
  {
    return $this->belongsTo('App\Guru')->withDefault();
  }

  public function ruang()
  {
    return $this->belongsTo('App\Ruang')->withDefault();
  }

  public function rapot($id)
  {
    $kelas = Kelas::where('id', $id)->first();
    return $kelas;
  }

  public function pengajar($id)
  {
    $guru = Guru::where('id', $id)->first();
    return $guru;
  }

  public function ulangan($id)
  {
    $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
    $nilai = Ulangan::where('siswa_id', $siswa->id)->where('mapel_id', $id)->first();
    return $nilai;
  }

  public function nilai($id)
  {
    $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
    $nilai = Rapot::where('siswa_id', $siswa->id)->where('mapel_id', $id)->first();
    return $nilai;
  }

  public function kkm($id)
  {
    $kkm = Nilai::where('guru_id', $id)->first();
    return $kkm['kkm'];
  }

  public function absen($id)
  {
    $absen = Absen::where('tanggal', date('Y-m-d'))->where('guru_id', $id)->first();
    if ($absen && $absen['kehadiran_id']) {
      $ket = Kehadiran::where('id', $absen['kehadiran_id'])->first();
      return $ket['color'];
    } else {
      return false;
    }
  }

  public function cekUlangan($id)
  {
    $data = json_decode($id, true);
    $ulangan = Ulangan::where('siswa_id', $data['siswa'])->where('mapel_id', $data['mapel'])->first();
    return $ulangan;
  }

  public function cekRapot($id)
  {
    $data = json_decode($id, true);
    $rapot = Rapot::where('siswa_id', $data['siswa'])->where('mapel_id', $data['mapel'])->first();
    return $rapot;
  }

  protected $table = 'jadwal';
}
