<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    /**
     * Mass assignable Attributes
     *
     * @var string[]
     */
    protected $fillable=[
      'name',
    ];

    /**
     * Hidden from Serialisation
     *
     * @var array<int, string>
     */
    protected $hidden=[

    ];

    /**
     * Attributes for type casting
     *
     * @return array<string, string>
     */
    protected function casts():array
    {
        return [

        ];
    }

    // TODO: Region has countries

}
