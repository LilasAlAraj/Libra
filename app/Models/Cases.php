<?php

namespace App\Models;

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cases extends Model
{
    use HasFactory;
    use SoftDeletes;

    private static $index = 'cases_index';
    public static function destroyIndex()
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setBasicAuthentication('Lilas', '123456789')
            ->build();
        $params = [
            'index' => Cases::$index, // اسم الفهرس الذي ترغب في حذفه
        ];

        $response = $client->indices()->delete($params);
        return $response;

    }
    public static function createIndex()
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setBasicAuthentication('Lilas', '123456789')
            ->build();

        $params = [
            'index' => Cases::$index,
            'body' => [
                'settings' => [
                    'analysis' => [
                        'analyzer' => [
                            'my_analyzer' => [
                                'type' => 'custom',
                                'tokenizer' => 'standard',
                                'filter' => ['lowercase', 'arabic_normalization', 'arabic_stop', 'arabic_stemmer'],
                            ],
                        ],
                        'filter' => [
                            'arabic_normalization' => [
                                'type' => 'arabic_normalization',
                            ],
                            'arabic_stop' => [
                                'type' => 'stop',
                                'stopwords' => '_arabic_',
                            ],
                            'arabic_stemmer' => [
                                'type' => 'stemmer',
                                'language' => 'arabic',
                            ],

                        ],
                    ],
                ],
                'mappings' => [
                    'properties' => [
                        'facts' => [
                            'type' => 'text',
                            'analyzer' => 'my_analyzer', // استخدام التحليل المناسب هنا
                        ],
                        'claim' => [
                            'type' => 'text',
                            'analyzer' => 'my_analyzer', // استخدام التحليل المناسب هنا
                        ],
                        'title' => [
                            'type' => 'text',
                            'analyzer' => 'my_analyzer', // استخدام التحليل المناسب هنا
                        ],
                        'decisions' => [
                            'type' => 'nested',
                            'properties' => [
                                'id' => [
                                    'type' => 'text', // تعديل النوع إلى keyword
                                    'analyzer' => 'my_analyzer', // استخدام التحليل المناسب هنا

                                ],
                                'description' => [
                                    'type' => 'text',
                                    'analyzer' => 'my_analyzer', // استخدام التحليل المناسب هنا
                                ],

                            ],
                        ],

                    ],
                ],
            ],
        ];

        $response = $client->indices()->create($params);
    }
    public static function indexAll()
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setBasicAuthentication('Lilas', '123456789')
            ->build();
        $cases = Cases::all();
        foreach ($cases as $case) {

            $params = [
                'index' => Cases::$index,
                'id' => $case->id,
                'body' => [
                    'id' => $case->id,
                    'title' => $case->title,
                    'claim' => $case->claim,
                    'facts' => $case->facts,
                    // 'decisions.id' => $case->decisions->pluck('id'),
                    'decisions' => $case->decisions->pluck('description','id'),
                    // أضف المزيد من الحقول اللازمة
                ],
            ];

            $client->index($params);
        }
    }
    public function index()
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setBasicAuthentication('Lilas', '123456789')
            ->build();

        $params = [
            'index' => Cases::$index,
            'id' => $this->id,
            'body' => [
                'claim' => $this->claim,
                'facts' => $this->facts,
                'title' => $this->title,
                'id' => $this->id,
                'decisions' => $this->decisions->pluck('description'),

                // أضف المزيد من الحقول اللازمة
            ],
        ];

        $client->index($params);
    }

    public function updateIndex()
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setBasicAuthentication('Lilas', '123456789')
            ->build();

        $params = [
            'index' => Cases::$index,
            'id' => $this->id,
            'body' => [
                'doc' => [
                    'claim' => $this->claim,
                    'facts' => $this->facts,

                ],
            ],
        ];

        $response = $client->update($params);
    }

    public function deleteIndex()
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setBasicAuthentication('Lilas', '123456789')
            ->build();
        // حذف وثيقة محددة من الفهرس
        $params = [
            'index' => Cases::$index,
            'id' => $this->id,
        ];

        return $client->delete($params);
    }
    public static function search($query)
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setBasicAuthentication('Lilas', '123456789')
            ->build();
      
        
    $params = [
        'index' => Cases::$index,
        'body' => [
            'query' => [
                'bool' => [
                    'should' => [
                        ['match' => ['claim' => $query]],
                        ['match' => ['facts' => $query]],
                        ['match' => ['title' => $query]],
                        ['nested' => [
                            'path' => 'decisions',
                            'query' => [
                                'match' => ['decisions.description' => $query]
                            ]
                        ]]
                    ]
                ]
            ],
            
            'sort' => [
                ['_score' => 'desc']
            ],
            
        ]
    ];
        $response = $client->search($params);

        $hits = $response['hits']['hits'];

        $results = [];

        // foreach ($hits as $hit) {
        //     $results[]['result'] = $hit['_source'];
        // }

        // return $results;

        foreach ($hits as $hit) {
            $source = $hit['_source'];
            $score = $hit['_score'];
    
            // قم بتقييم النتيجة بناءً على الدرجة التوافق (score)
            $evaluation = $score; // يمكنك تعديل هذا الجزء حسب احتياجاتك وقواعد التقييم الخاصة بك
    
            // أضف النتيجة والتقييم إلى القائمة النهائية
            $results[] = [
                'result' => $source,
                'evaluation' => $evaluation,
            ];
        }
    
        // قم بترتيب النتائج بناءً على التقييم (بحسب الدرجة التوافق)
        usort($results, function ($a, $b) {
            return $b['evaluation'] <=> $a['evaluation']; // ترتيب تنازلي للتقييم
        });
    
         return $results;
    }
    
    protected $fillable = [
        'title',
        'court_id',
        'case_room',
        'Status',
        'Value_Status',
        'facts',
        'claim',

    ];
    public function attachments(): HasMany
    {
        return $this->hasMany(Case_attachment::class, 'case_id');
    }
    public function tasks()
    {

        return $this->belongsToMany(tasks::class, 'case_of_task');
    }
    public function sessions(): HasMany
    {
        return $this->hasMany(Sessions::class, 'case_id');
    }
    public function decisions()
    {
        return $this->hasMany(Decision::class, 'case_id');
    }public function clients_case()
    {
        return $this->hasMany(Client_of_Cases::class, 'case_id');
    }public function lawyers_case()
    {
        return $this->hasMany(Lawyer_of_Cases::class, 'case_id');
    }
    public function enemy_lawyers()
    {
        return $this->belongsToMany(Enemy_Lawyers::class, 'enemy_lawyer_of_cases', 'case_id', 'enemy_lawyer_id');
    }
    public function enemy_clients(): BelongsToMany
    {
        return $this->belongsToMany(Enemy_Clients::class, 'enemy_client_of_cases', 'case_id', 'enemy_client_id');
    }

    public function lawyers()
    {
        return $this->belongsToMany(User::class, 'lawyer_of_case', 'case_id', 'user_id');
    }

    public function clients()
    {
        return $this->belongsToMany(User::class, 'client_of_case', 'case_id', 'user_id');
    }
    public function baseNumbers(): HasMany
    {
        return $this->hasMany(BaseNumber::class, 'case_id');
    }

    public function court()
    {
        return $this->belongsTo(Courts::class, 'court_id');
    }
}
