<?php

namespace Finder\Models\Components\Productions;

/**
 * Tipos de Produções
 */
use Finder\Models\Model;

class SceneLocal extends Model
{

    protected $table = 'production_scene_locals';



    
    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function slaves()
    {
        return $this->morphedByMany('Finder\Models\Identity\Slave', 'skillable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany('Finder\Models\User', 'skillable');
    }
}