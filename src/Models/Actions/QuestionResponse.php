<?php

namespace Finder\Models\Actions;

use SiObjects\Manipule\Builders\QuestionReponseBuilder;
use Finder\Contants\Tables;
use Finder\Features\Photos\Entities\QuestionReponseEntity;
use Illuminate\Database\Eloquent\Collection;
use Finder\Models\Model;

/**
 * Class QuestionReponse.
 *
 * @property int id
 * @property string value
 * @property Collection responses
 * @package Finder\Models
 */
class QuestionReponse extends Model
{
    /**
     * @inheritdoc
     */
    public $timestamps = false;

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'question_id',
        'user_id',
    ];

    /**
     * @inheritdoc
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function (self $question) {
            $question->responses()->detach();
        });
    }

    /**
     * @inheritdoc
     */
    public function newEloquentBuilder($query): QuestionReponseBuilder
    {
        return new QuestionReponseBuilder($query);
    }

    /**
     * @inheritdoc
     */
    public function newQuery(): QuestionReponseBuilder
    {
        return parent::newQuery();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function responses()
    {
        return $this->belongsToMany(Post::class, Tables::TABLE_POSTS_TAGS);
    }

    /**
     * Setter for the 'value' attribute.
     *
     * @param string $value
     * @return $this
     */
    public function setValueAttribute(string $value)
    {
        $this->attributes['value'] = trim(str_replace(' ', '_', strtolower($value)));

        return $this;
    }

    /**
     * @return QuestionReponseEntity
     */
    public function toEntity(): QuestionReponseEntity
    {
        return new QuestionReponseEntity([
            'id' => $this->id,
            'value' => $this->value,
        ]);
    }
}
