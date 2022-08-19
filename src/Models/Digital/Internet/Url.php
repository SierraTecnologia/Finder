<?php

/**
 * This file is part of Gitonomy.
 *
 * (c) Alexandre Salomé <alexandre.salome@gmail.com>
 * (c) Julien DIDIER <genzo.wm@gmail.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Finder\Models\Digital\Internet;

use Muleta\Traits\Models\ComplexRelationamentTrait;
use Pedreiro\Models\Base;

class Url extends Base
{
    protected $organizationPerspective = true;

    protected $table = 'bot_internet_urls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'infra_domain_id',
    ];
    public $formFields = [
        [
            'name' => 'url',
            'label' => 'url',
            'type' => 'text'
        ],
        [
            'name' => 'infra_domain_id',
            'label' => 'Issue',
            'type' => 'select',
            'relationship' => 'issue'
        ],
    ];

    public $indexFields = [
        'url',
        'infra_domain_id'
    ];

    public $validationRules = [
        'url'       => 'required',
        'infra_domain_id' => 'required|int',
    ];

    public $validationMessages = [
        'url.required' => "Url é obrigatório."
    ];

    public $validationAttributes = [
        'url' => 'url'
    ];

    public function linksFrom(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Finder\Models\Digital\Internet\UrlLink', 'from_bot_internet_url_id', 'id');
    }

    public function linksTo(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Finder\Models\Digital\Internet\UrlLink', 'to_bot_internet_url_id', 'id');
    }

    public function domain(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Finder\Models\Infra\Domain', 'infra_domain_id', 'id');
    }
}
