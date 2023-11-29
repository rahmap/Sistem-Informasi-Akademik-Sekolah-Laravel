<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ulangan
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string|null $ulha_1
 * @property string|null $ulha_2
 * @property string|null $uts
 * @property string|null $ulha_3
 * @property string|null $uas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUts($value)
 * @mixin \Eloquent
 */
class Ulangan extends Model
{
    protected $fillable = ['siswa_id', 'kelas_id', 'guru_id', 'mapel_id', 'ulha_1', 'ulha_2', 'uts', 'ulha_3', 'uas'];

    protected $table = 'ulangan';
}
