<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Mapel
 *
 * @property int $id
 * @property string $nama_mapel
 * @property int $paket_id
 * @property string $kelompok
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Paket $paket
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newQuery()
 * @method static \Illuminate\Database\Query\Builder|Mapel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereKelompok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereNamaMapel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel wherePaketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Mapel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Mapel withoutTrashed()
 * @mixin \Eloquent
 */
class Mapel extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'nama_mapel', 'paket_id', 'kelompok'];

    public function paket()
    {
        return $this->belongsTo('App\Paket')->withDefault();
    }

    public function sikap($id)
    {
        $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        $nilai = Sikap::where('siswa_id', $siswa->id)->where('mapel_id', $id)->first();
        return $nilai;
    }

    public function cekSikap($id)
    {
        $data = json_decode($id, true);
        $sikap = Sikap::where('siswa_id', $data['siswa'])->where('mapel_id', $data['mapel'])->first();
        return $sikap;
    }

    protected $table = 'mapel';
}
