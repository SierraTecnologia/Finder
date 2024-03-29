<?php

namespace Finder\Models\Code;

use Finder\Models\Reference;
use Pedreiro\Models\Base;

class Field extends Base
{
    protected $organizationPerspective = false;

    protected $table = 'code_fields';
    
    public $incrementing = false;
    protected $casts = [
        'code' => 'string',
    ];
    protected $primaryKey = 'code';
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
    ];
    
    public $formFields = [
        ['name' => 'name', 'label' => 'Nome', 'type' => 'text'],
        ['name' => 'code', 'label' => 'Código', 'type' => 'text'],
        // ['name' => 'body', 'label' => 'Enter your content here', 'type' => 'textarea'],
        // ['name' => 'publish_on', 'label' => 'Publish Date', 'type' => 'date'],
        // ['name' => 'published', 'label' => 'Published', 'type' => 'checkbox'],
        // ['name' => 'category_id', 'label' => 'Category', 'type' => 'select', 'relationship' => 'category'],
        // ['name' => 'tags', 'label' => 'Tags', 'type' => 'select_multiple', 'relationship' => 'tags'],
    ];

    public $indexFields = [
        'code',
        'name',
        // 'category_id',
        // 'published'
    ];

    public $validationRules = [
        'name'       => 'required|max:255',
        'code'        => 'required|max:100',
        // 'body'        => 'required',
        // 'publish_on'  => 'date',
        // 'published'   => 'boolean',
        // 'category_id' => 'required|int',
    ];

    public $validationMessages = [
        'name.required' => "O nome é obrigatório"
    ];

    public $validationAttributes = [
        'name' => 'Nome do Campo'
    ];
    /**
     * 63 => JiraRestApi\Field\Field^ {#472
     * +id: "customfield_10033"
     * +name: "Porque essa funcionalidade deve ser desenvolvida ?"
     * +description: null
     * +type: null
     * +custom: true
     * +orderable: true
     * +navigable: true
     * +searchable: true
     * +searcherKey: null
     * +clauseNames: array:2 [
     *   0 => "cf[10033]"
     *   1 => "Porque essa funcionalidade deve ser desenvolvida ?"
     * ]
     * +schema: {#792
     *   +"type": "string"
     *   +"custom": "com.atlassian.jira.plugin.system.customfieldtypes:textarea"
     *   +"customId": 10033
     * }
     * +"key": "customfield_10033"
     * }
     */
    public static function registerFieldForProject($field, $projectUrl = false)
    {
        $field =  self::firstOrCreate(
            [
                'name' => $field->name,
                'code' => $field->key
            ]
        );

        if ($projectUrl) {
            if (!$reference = Reference::where(
                [
                'code' => $projectUrl
                ]
            )->first()
            ) {
                $reference = Reference::create(
                    [
                    'code' => $projectUrl,
                    'name' => $projectUrl,
                    ]
                );
            }
            if (!$field->references()->where('reference_id', $reference->id)->first()) {
                $field->references()->save(
                    $reference,
                    [
                        'identify' => $field->id,
                    ]
                );
            }
        }
        return $field;

        // foreach($comments as $comment) {
        //     var_dump($comment);
        //     Coment::firstOrCreate([
        //         'name' => $comment->name
        //     ]);
        // }
    }
    
    public function references()
    {
        return $this->morphToMany(Reference::class, 'referenceable');
    }
}
