<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Kehadiran
 *
 * @property int $id
 * @property string $ket
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Kehadiran extends Model
{
    protected $fillable = ['ket', 'color'];

    protected $table = 'kehadiran';
}
