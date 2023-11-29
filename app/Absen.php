<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Absen
 *
 * @property int $id
 * @property string $tanggal
 * @property int $guru_id
 * @property int $kehadiran_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Guru $guru
 * @property-read \App\Kehadiran $kehadiran
 * @method static \Illuminate\Database\Eloquent\Builder|Absen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereKehadiranId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Absen extends Model
{
    protected $fillable = ['guru_id', 'tanggal', 'kehadiran_id'];

    public function guru()
    {
        return $this->belongsTo('App\Guru')->withDefault();
    }

    public function kehadiran()
    {
        return $this->belongsTo('App\Kehadiran')->withDefault();
    }

    protected $table = 'absensi_guru';
}
