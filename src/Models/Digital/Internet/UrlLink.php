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

use Pedreiro\Models\Base;

class UrlLink extends Base
{
    protected $organizationPerspective = true;

    protected $table = 'bot_internet_url_links';     

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_bot_internet_url_id',
        'to_bot_internet_url_id',
    ];

    public function from(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Finder\Models\Digital\Internet\Url', 'from_bot_internet_url_id', 'id');
    }

    public function to(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Finder\Models\Digital\Internet\Url', 'to_bot_internet_url_id', 'id');
    }
}
