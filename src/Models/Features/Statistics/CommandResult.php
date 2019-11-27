<?php
/**
 * Sistemas de Analise de Crédito e Fraudes
 */

namespace Finder\Models\Features\Statistics;

use Finder\Models\Model;

class CommandResult extends Model
{

    protected $organizationPerspective = true;

    /**
     * The attributes that are mass assignable.
     * 
     * Ex:
     * Table git effort --above 15 {src,lib}/*
     * File | n commits | active days
     *
     * @var array
     */
    protected $fillable = [
        // Comando que Rodou
        'command_execute_id',
        // Por Commit
        'ciclo',
        'description',
        'status',
    ];

    /**
     */
}