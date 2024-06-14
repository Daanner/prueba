<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Garaje
 *
 * @property $id
 * @property $precio
 * @property $vehiculos_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Vehiculo $vehiculo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Garaje extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['precio', 'vehiculos_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo(\App\Models\Vehiculo::class, 'vehiculos_id', 'id');
    }
    

}
