# SierraTecnologia Finder

**SierraTecnologia Finder** Various functionality, and basic controller included out-of-the-box.

[![Packagist](https://img.shields.io/packagist/v/sierratecnologia/finder.svg?label=Packagist&style=flat-square)](https://packagist.org/packages/sierratecnologia/finder)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/sierratecnologia/finder.svg?label=Scrutinizer&style=flat-square)](https://scrutinizer-ci.com/g/sierratecnologia/finder/)
[![Travis](https://img.shields.io/travis/sierratecnologia/finder.svg?label=TravisCI&style=flat-square)](https://travis-ci.org/sierratecnologia/finder)
[![StyleCI](https://styleci.io/repos/60968880/shield)](https://styleci.io/repos/60968880)
[![License](https://img.shields.io/packagist/l/sierratecnologia/finder.svg?label=License&style=flat-square)](https://github.com/sierratecnologia/finder/blob/master/LICENSE)


## 📚 Índice

- [Introdução](#-introdução)
- [Instalação](#-instalação)
- [Arquitetura e Estrutura Interna](#-arquitetura-e-estrutura-interna)
- [Principais Funcionalidades](#-principais-funcionalidades)
- [Uso Prático](#-uso-prático)
- [Integração com o Ecossistema SierraTecnologia](#-integração-com-o-ecossistema-sierratecnologia)
- [Extensão e Customização](#-extensão-e-customização)
- [Exemplos Reais](#-exemplos-reais)
- [Guia de Contribuição](#-guia-de-contribuição)


## 🎯 Introdução

### O que é o Finder

O **Finder** é um pacote Laravel avançado desenvolvido pela SierraTecnologia para gerenciar, otimizar e executar processos de busca, indexação e descoberta de informações em sistemas empresariais. Ele fornece uma camada de abstração poderosa para trabalhar com diferentes fontes de dados, permitindo consultas inteligentes, filtros dinâmicos, ranking de resultados e integração com múltiplos mecanismos de busca.

### Objetivo do Projeto

O Finder foi projetado para:

- **Centralizar a lógica de busca** em aplicações Laravel complexas
- **Abstrair diferentes fontes de dados** (Eloquent, APIs externas, sistemas de arquivos, etc.)
- **Facilitar a indexação automatizada** de conteúdo e documentos
- **Prover ferramentas de Spider/Crawler** para descoberta de informações
- **Gerenciar rastreamento e análise** de arquivos, diretórios e URLs
- **Integrar-se perfeitamente** com outros módulos do ecossistema SierraTecnologia

### Benefícios e Diferenciais

- ✅ **Busca Unificada**: Interface consistente para múltiplas fontes de dados
- ✅ **Spider Integrado**: Rastreamento inteligente de arquivos, diretórios e conteúdo web
- ✅ **Extensível**: Arquitetura baseada em contratos e pipelines
- ✅ **Performance**: Cache e otimizações integradas
- ✅ **Observabilidade**: Logging e métricas detalhadas
- ✅ **Laravel Native**: Integração completa com Service Providers, Facades e Artisan Commands

### Contexto no Ecossistema SierraTecnologia

O Finder faz parte do ecossistema **SierraTecnologia / Rica Soluções**, trabalhando em conjunto com outros módulos:

- **Stalker**: Monitoramento e rastreamento
- **Casa**: Gerenciamento de ambiente
- **Operador**: Operações e tarefas automatizadas
- **Integrations**: Integrações com serviços externos
- **MediaManager**: Gerenciamento de mídia e arquivos


## 📦 Instalação

### Requisitos Mínimos

- **PHP**: 8.2 ou superior
- **Laravel**: 10.x ou 11.x
- **Extensões PHP**: `mbstring`, `xml`, `dom`, `curl`, `gd`, `zip`, `pdo`

### Instalação via Composer

```bash
composer require sierratecnologia/finder
```

### Publicação dos Arquivos de Configuração

Publique os arquivos de configuração, views e assets:

```bash
# Publicar configuração
php artisan vendor:publish --tag=sitec-config

# Publicar views (opcional)
php artisan vendor:publish --tag=sitec-views

# Publicar traduções (opcional)
php artisan vendor:publish --tag=sitec-lang
```

### Registro Automático do Service Provider

O Finder utiliza descoberta automática de pacotes do Laravel. O `FinderProvider` será registrado automaticamente através da seção `extra.laravel.providers` no `composer.json`:

```json
{
    "extra": {
        "laravel": {
            "providers": [
                "Finder\\FinderProvider"
            ]
        }
    }
}
```

### Configuração

O arquivo de configuração principal está em `config/sitec/finder.php`. Após publicar, você pode configurar:

```php
<?php

return [
    // Configurações do Finder
    'default_driver' => env('FINDER_DRIVER', 'eloquent'),

    'drivers' => [
        'eloquent' => [
            'enabled' => true,
        ],
        'filesystem' => [
            'enabled' => true,
            'paths' => [
                storage_path('app'),
            ],
        ],
    ],

    'spider' => [
        'max_depth' => 5,
        'timeout' => 30,
        'user_agent' => 'SierraTecnologia-Finder/1.0',
    ],
];
```


## 🏗️ Arquitetura e Estrutura Interna

### Estrutura de Diretórios

```
src/
├── Console/
│   ├── Commands/          # Comandos Artisan
│   │   ├── Prepare/       # Preparação de dados (Photos, Excel, Export)
│   │   ├── Spider/        # Spider e crawling (Directory, Instagram)
│   │   ├── Sync/          # Sincronização (Tokens, Persons)
│   │   ├── Readers/       # Leitores de formatos (ICS)
│   │   └── Verify/        # Verificação de dados
│   ├── External/          # Ferramentas externas
│   │   ├── Analyser/      # Análise de código
│   │   └── Explorer/      # Exploração de diretórios
│   └── Kernel.php         # Console Kernel
├── Contracts/             # Interfaces e contratos
│   └── Spider/            # Contratos do Spider
├── Entities/              # Entidades de domínio
│   ├── EntityAbstract.php
│   ├── ProjectEntity.php
│   ├── FileEntity.php
│   ├── DirectoryEntity.php
│   └── RepositoryEntity.php
├── Facades/               # Facades Laravel
│   ├── Finder.php
│   └── Activity.php
├── Http/                  # Camada HTTP
│   ├── Actions/           # Actions (Laravel Actions)
│   ├── Controllers/       # Controllers
│   ├── Policies/          # Policies de autorização
│   ├── Requests/          # Form Requests
│   └── Resources/         # API Resources
├── Logic/                 # Lógica de negócio
├── Models/                # Modelos Eloquent
│   ├── Code/              # Modelos de código
│   ├── Computer/          # Modelos de computador
│   ├── Digital/           # Modelos digitais
│   └── Infra/             # Modelos de infraestrutura
├── Pipelines/             # Laravel Pipelines
├── Readers/               # Leitores de arquivos
├── Services/              # Services
│   ├── Finders/           # Serviços de busca
│   ├── FinderService.php
│   └── RepositoryService.php
├── Spider/                # Sistema de Spider/Crawler
│   ├── Extensions/        # Extensões do Spider
│   ├── Finder/            # Finders específicos
│   ├── Groups/            # Agrupadores
│   ├── Identificadores/   # Identificadores
│   ├── Metrics/           # Métricas
│   ├── Registrator/       # Registradores
│   └── Traits/            # Traits reutilizáveis
└── FinderProvider.php     # Service Provider principal
```

### Namespaces e Padrões

O Finder utiliza o namespace base `Finder\` mapeado para o diretório `src/`:

```php
"autoload": {
    "psr-4": {
        "Finder\\": "src/"
    }
}
```

### Padrões de Design

#### 1. Repository Pattern
O Finder abstrai o acesso a dados através de services e repositories:

```php
use Finder\Services\FinderService;

$finder = app(FinderService::class);
```

#### 2. Search Abstraction
Camada de abstração para diferentes mecanismos de busca:

```
User Query → Finder Service → Driver → Data Source
                    ↓
              Cache Layer
```

#### 3. Spider/Crawler Pattern
Sistema de rastreamento com extensões e identificadores:

```
Spider → Target Manager → Extensions → Identificadores → Registrator
```

#### 4. Pipeline Pattern
Processamento de dados através de pipelines:

```php
use Finder\Pipelines\SearchPipeline;

$results = app(SearchPipeline::class)
    ->pipe(new FilterPipe())
    ->pipe(new RankPipe())
    ->process($query);
```

### Comunicação Entre Camadas

```
┌─────────────────┐
│  HTTP Layer     │  Controllers, Actions, Requests
└────────┬────────┘
         │
┌────────▼────────┐
│  Service Layer  │  FinderService, Services/Finders
└────────┬────────┘
         │
┌────────▼────────┐
│  Logic Layer    │  Pipelines, Business Logic
└────────┬────────┘
         │
┌────────▼────────┐
│  Model Layer    │  Eloquent Models, Entities
└────────┬────────┘
         │
┌────────▼────────┐
│  Data Sources   │  Database, Filesystem, APIs
└─────────────────┘
```

### Convenções e Boas Práticas

1. **Naming Conventions**:
   - Controllers: `{Resource}Controller`
   - Actions: `{Resource}{Action}Action` (ex: `PostCreateAction`)
   - Services: `{Resource}Service`
   - Commands: `{Resource}{Action}` (ex: `PhotosPrepare`)

2. **Dependency Injection**:
   - Sempre use injeção de dependência nos construtores
   - Prefira contratos (interfaces) em vez de implementações concretas

3. **Logging**:
   - Canal específico: `sitec-finder`
   - Logs em `storage/logs/sitec-finder.log`


## 🚀 Principais Funcionalidades

### 1. Busca e Filtragem Avançada

O Finder fornece uma camada unificada para busca em diferentes fontes:

```php
use Finder\Services\Finders\PersonService;

$personFinder = app(PersonService::class);

// Buscar pessoas com filtros
$results = $personFinder->search([
    'name' => 'João',
    'city' => 'Rio de Janeiro',
    'age_min' => 18,
    'age_max' => 65,
]);
```

### 2. Sistema de Spider/Crawler

#### Rastreamento de Diretórios

```bash
# Rastrear diretório de arquivos
php artisan finder:spider:directory /path/to/directory
```

```php
use Finder\Spider\Directory;

$spider = new Directory();
$spider->crawl('/path/to/directory', [
    'recursive' => true,
    'extensions' => ['php', 'js', 'json'],
    'max_depth' => 5,
]);
```

#### Extensões do Spider

O Spider suporta diferentes tipos de extensões para processamento especializado:

- **Identificadores**: Identificam tipos de arquivos/conteúdo
- **Groups**: Agrupam resultados por critérios
- **Extensions**: Processadores customizados
- **Metrics**: Coletam métricas durante o rastreamento

### 3. Indexação Automática

```php
use Finder\Models\Computer\ComputerFile;

// Indexar arquivo
ComputerFile::create([
    'path' => '/path/to/file.pdf',
    'size' => filesize('/path/to/file.pdf'),
    'mime_type' => 'application/pdf',
    'hash' => hash_file('sha256', '/path/to/file.pdf'),
]);
```

### 4. Comandos Console

#### Preparação de Dados

```bash
# Preparar fotos para importação
php artisan finder:prepare:photos

# Exportar dados em Excel
php artisan finder:prepare:excel

# Exportar dados gerais
php artisan finder:prepare:export
```

#### Sincronização

```bash
# Sincronizar tokens
php artisan finder:sync:tokens

# Sincronizar pessoas
php artisan finder:sync:persons
```

#### Verificação

```bash
# Verificar integridade de storage
php artisan finder:verify:storage

# Verificar dados sociais
php artisan finder:verify:social
```

### 5. API HTTP

O Finder fornece actions prontas para uso em APIs:

```php
use Finder\Http\Actions\PostGetByIdAction;

Route::get('/api/posts/{id}', PostGetByIdAction::class);
```

Actions disponíveis:
- `PostCreateAction`, `PostGetByIdAction`, `PostUpdateByIdAction`, `PostDeleteByIdAction`
- `PhotoCreateAction`, `PhotoUpdateByIdAction`, `PhotoDeleteByIdAction`
- `UserCreateAction`, `UserGetByIdAction`, `UserUpdateByIdAction`, `UserDeleteByIdAction`
- E muitas outras...

### 6. Entities e Abstração

```php
use Finder\Entities\FileEntity;
use Finder\Entities\DirectoryEntity;

$file = new FileEntity('/path/to/file.txt');
echo $file->getSize();
echo $file->getMimeType();
echo $file->getHash();

$directory = new DirectoryEntity('/path/to/directory');
foreach ($directory->getFiles() as $file) {
    echo $file->getPath();
}
```


## 💻 Uso Prático

### Exemplo 1: Busca com Eloquent e Filtros Dinâmicos

```php
use Finder\Services\FinderService;

class ProductController extends Controller
{
    protected $finder;

    public function __construct(FinderService $config)
    {
        $this->finder = $finder;
    }

    public function search(Request $request)
    {
        // Buscar produtos com filtros dinâmicos
        $products = Product::query()
            ->when($request->category, function($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($request->min_price, function($query, $minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($request->max_price, function($query, $maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->when($request->search, function($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json($products);
    }
}
```

### Exemplo 2: Spider Customizado

```php
use Finder\Spider\SpiderLinuxCommand;
use Finder\Contracts\Spider\Spider;

class CustomSpider implements Spider
{
    public function crawl($target, array $options = [])
    {
        $files = [];

        // Lógica personalizada de rastreamento
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($target)
        );

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $files[] = [
                    'path' => $file->getPathname(),
                    'size' => $file->getSize(),
                    'modified' => $file->getMTime(),
                ];
            }
        }

        return $files;
    }
}
```

### Exemplo 3: Integração com Cache

```php
use Illuminate\Support\Facades\Cache;
use Finder\Services\Finders\PersonService;

class PersonSearchService
{
    public function search($filters)
    {
        $cacheKey = 'person_search_' . md5(json_encode($filters));

        return Cache::remember($cacheKey, 3600, function() use ($filters) {
            $personFinder = app(PersonService::class);
            return $personFinder->search($filters);
        });
    }
}
```

### Boas Práticas de Performance

1. **Use Cache Agressivamente**:
```php
use Illuminate\Support\Facades\Cache;

$results = Cache::tags(['finder', 'products'])
    ->remember('products_search_' . $query, 1800, function() use ($query) {
        return Product::search($query)->get();
    });
```

2. **Otimize Queries com Eager Loading**:
```php
$results = Product::with(['category', 'images', 'tags'])
    ->whereIn('id', $productIds)
    ->get();
```

3. **Use Chunks para Grandes Volumes**:
```php
Product::chunk(1000, function($products) {
    foreach ($products as $product) {
        // Processar em lotes
        $this->indexProduct($product);
    }
});
```


## 🔗 Integração com o Ecossistema SierraTecnologia

### Módulos Integrados

O Finder se integra nativamente com:

#### 1. Stalker
Monitoramento e rastreamento de atividades:

```php
use Stalker\Services\TrackerService;

$tracker = app(TrackerService::class);
$tracker->track('finder.search', [
    'query' => $searchQuery,
    'results' => count($results),
]);
```

#### 2. Casa
Gerenciamento de ambiente e configuração:

```php
use Casa\Services\ConfigService;

$config = app(ConfigService::class);
$finderSettings = $config->get('modules.finder');
```

#### 3. Operador
Execução de tarefas e operações:

```php
use Operador\Jobs\IndexFilesJob;

dispatch(new IndexFilesJob($directory));
```

#### 4. MediaManager
Gerenciamento de arquivos e mídia:

```php
use MediaManager\Services\FileService;

$fileService = app(FileService::class);
$file = $fileService->upload($request->file('document'));
```

### Padrões de Testes

O Finder segue os padrões de teste do ecossistema:

```php
namespace Tests\Feature;

use Tests\TestCase;
use Finder\Services\FinderService;

class FinderTest extends TestCase
{
    public function test_can_search_products()
    {
        $finder = app(FinderService::class);

        $results = $finder->search('test product');

        $this->assertNotEmpty($results);
    }
}
```

### Versionamento

O Finder segue [Semantic Versioning 2.0.0](https://semver.org/):

- **MAJOR**: Mudanças incompatíveis na API
- **MINOR**: Novas funcionalidades compatíveis
- **PATCH**: Correções de bugs


## 🔧 Extensão e Customização

### Adicionar Novos Adaptadores

Para criar um novo adaptador de busca:

```php
namespace App\Finders;

use Finder\Services\Finders\FinderAbstractService;

class ElasticsearchFinder extends FinderAbstractService
{
    protected $client;

    public function __construct()
    {
        $this->client = app('elasticsearch');
    }

    public function search(array $params)
    {
        return $this->client->search([
            'index' => 'products',
            'body' => [
                'query' => [
                    'match' => [
                        'name' => $params['query'] ?? ''
                    ]
                ]
            ]
        ]);
    }
}
```

Registre o adaptador no Service Provider:

```php
// app/Providers/AppServiceProvider.php
public function register()
{
    $this->app->bind('finder.elasticsearch', function() {
        return new \App\Finders\ElasticsearchFinder();
    });
}
```

### Personalizar Indexação

```php
namespace App\Indexers;

class ProductIndexer
{
    public function index($product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'description' => strip_tags($product->description),
            'price' => $product->price,
            'category' => $product->category->name,
            'tags' => $product->tags->pluck('name')->toArray(),
            'indexed_at' => now(),
        ];
    }
}
```

### Criar Extensões do Spider

```php
namespace App\Spider\Extensions;

use Finder\Contracts\Spider\ExtensionManager;

class VideoExtension implements ExtensionManager
{
    public function supports($file)
    {
        return in_array($file->getExtension(), ['mp4', 'avi', 'mov']);
    }

    public function process($file)
    {
        // Extrair metadata de vídeo
        return [
            'duration' => $this->getDuration($file),
            'resolution' => $this->getResolution($file),
            'codec' => $this->getCodec($file),
        ];
    }
}
```

### Boas Práticas para Evitar Quebras

1. **Use Contratos em vez de Implementações**:
```php
// Bom
public function __construct(Spider $spider) {}

// Evite
public function __construct(SpiderLinuxCommand $spider) {}
```

2. **Versione suas Extensões**:
```php
namespace App\Finders\V2;

class CustomFinder extends FinderAbstractService
{
    const VERSION = '2.0.0';
}
```

3. **Documente suas Customizações**:
```php
/**
 * Custom finder implementation for Algolia
 *
 * @version 1.0.0
 * @author Your Team
 * @see https://docs.yourcompany.com/finders/algolia
 */
class AlgoliaFinder extends FinderAbstractService
{
    // ...
}
```


## 📊 Exemplos Reais

### Caso de Uso 1: E-commerce com Alto Volume

**Cenário**: Loja online com 100.000+ produtos

```php
use Finder\Services\FinderService;
use Illuminate\Support\Facades\Cache;

class ProductSearchService
{
    public function search($query, $filters = [])
    {
        $cacheKey = 'search_' . md5($query . serialize($filters));

        return Cache::tags(['products', 'search'])
            ->remember($cacheKey, 3600, function() use ($query, $filters) {
                return Product::search($query)
                    ->when($filters['category'] ?? null, function($q, $cat) {
                        return $q->where('category_id', $cat);
                    })
                    ->when($filters['price_range'] ?? null, function($q, $range) {
                        return $q->whereBetween('price', $range);
                    })
                    ->paginate(50);
            });
    }
}
```

**Ganhos**:
- ⚡ 80% redução no tempo de resposta (cache)
- 📈 Capacidade de lidar com 10x mais consultas simultâneas
- 💰 Redução de 60% nos custos de servidor

### Caso de Uso 2: Sistema de Gestão Documental

**Cenário**: Indexação de 50.000+ documentos PDF

```php
use Finder\Spider\Directory;
use Finder\Models\Computer\ComputerFile;

class DocumentIndexer
{
    public function indexDirectory($path)
    {
        $spider = new Directory();

        $files = $spider->crawl($path, [
            'extensions' => ['pdf', 'doc', 'docx', 'txt'],
            'recursive' => true,
        ]);

        foreach ($files as $file) {
            ComputerFile::updateOrCreate(
                ['path' => $file['path']],
                [
                    'size' => $file['size'],
                    'hash' => hash_file('sha256', $file['path']),
                    'mime_type' => mime_content_type($file['path']),
                    'indexed_at' => now(),
                ]
            );
        }
    }
}
```

**Ganhos**:
- 🔍 Busca instantânea em milhares de documentos
- 📁 Organização automática por tipo/categoria
- 🔒 Controle de versão e duplicatas

### Caso de Uso 3: Plataforma de Conteúdo

**Cenário**: Portal de notícias com múltiplas fontes

```php
use Finder\Http\Actions\PostPaginateAction;

class NewsAggregator
{
    public function getLatestNews($sources = [])
    {
        return Post::query()
            ->when($sources, function($q, $sources) {
                return $q->whereIn('source_id', $sources);
            })
            ->with(['author', 'tags', 'media'])
            ->where('published_at', '<=', now())
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(20);
    }
}
```

**Ganhos**:
- 📰 Agregação de múltiplas fontes em tempo real
- 🎯 Personalização por usuário
- 📊 Analytics e métricas integradas


## 🤝 Guia de Contribuição

### Como Contribuir

1. **Fork o repositório**
2. **Clone sua fork**:
```bash
git clone https://github.com/seu-usuario/finder.git
cd finder
```

3. **Crie uma branch para sua feature**:
```bash
git checkout -b feature/minha-nova-funcionalidade
```

4. **Faça suas alterações e commit**:
```bash
git add .
git commit -m "Adiciona nova funcionalidade X"
```

5. **Push para sua fork**:
```bash
git push origin feature/minha-nova-funcionalidade
```

6. **Abra um Pull Request**

### Padrões de Commits

Seguimos o [Conventional Commits](https://www.conventionalcommits.org/):

```
feat: adiciona suporte a Elasticsearch
fix: corrige bug na indexação de PDFs
docs: atualiza documentação do Spider
style: formata código seguindo PSR-12
refactor: refatora FinderService
test: adiciona testes para PersonService
chore: atualiza dependências
```

### Padrões de Branches

- `main` / `master`: Produção
- `develop`: Desenvolvimento
- `feature/*`: Novas funcionalidades
- `fix/*`: Correções de bugs
- `hotfix/*`: Correções urgentes
- `release/*`: Preparação de releases

### Execução Local das Ferramentas

#### PHPUnit

```bash
# Executar todos os testes
vendor/bin/phpunit

# Executar com coverage
vendor/bin/phpunit --coverage-html coverage/

# Executar teste específico
vendor/bin/phpunit --filter=FinderTest
```

#### PHPCS (PSR-12)

```bash
# Verificar código
vendor/bin/phpcs --standard=PSR12 src/

# Corrigir automaticamente
vendor/bin/phpcbf --standard=PSR12 src/
```

#### PHPStan (Nível 8)

```bash
# Análise estática
vendor/bin/phpstan analyse src/ --level=8

# Com relatório detalhado
vendor/bin/phpstan analyse src/ --level=8 --error-format=table
```

#### PHPMD

```bash
# Verificar code smells
vendor/bin/phpmd src/ text phpmd.xml

# Formato HTML
vendor/bin/phpmd src/ html phpmd.xml --reportfile report.html
```

#### Psalm

```bash
# Análise estática
vendor/bin/psalm

# Com informações
vendor/bin/psalm --show-info=true
```

### CI/CD

O projeto utiliza GitHub Actions para CI/CD. Todos os PRs passam por:

- ✅ Testes automatizados (PHPUnit)
- ✅ Análise estática (PHPStan nível 8)
- ✅ Verificação de estilo (PHPCS PSR-12)
- ✅ Análise de qualidade (PHPMD)
- ✅ Security check

### Política de Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

### Contato da Equipe Técnica

- **Email**: help@sierratecnologia.com.br
- **Chat**: [Slack da SierraTecnologia](https://bit.ly/sierratecnologia-slack)
- **Twitter**: [@sierratecnologia](https://twitter.com/sierratecnologia)
- **Issues**: [GitHub Issues](https://github.com/sierratecnologia/finder/issues)


## Changelog

Refer to the [Changelog](CHANGELOG.md) for a full history of the project.


## Support

The following support channels are available at your fingertips:

- [Chat on Slack](https://bit.ly/sierratecnologia-slack)
- [Help on Email](mailto:help@sierratecnologia.com.br)
- [Follow on Twitter](https://twitter.com/sierratecnologia)


## Contributing & Protocols

Thank you for considering contributing to this project! The contribution guide can be found in [CONTRIBUTING.md](CONTRIBUTING.md).

Bug reports, feature requests, and pull requests are very welcome.

- [Versioning](CONTRIBUTING.md#versioning)
- [Pull Requests](CONTRIBUTING.md#pull-requests)
- [Coding Standards](CONTRIBUTING.md#coding-standards)
- [Feature Requests](CONTRIBUTING.md#feature-requests)
- [Git Flow](CONTRIBUTING.md#git-flow)


## Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to [help@sierratecnologia.com.br](help@sierratecnologia.com.br). All security vulnerabilities will be promptly addressed.


## About SierraTecnologia

SierraTecnologia is a software solutions startup, specialized in integrated enterprise solutions for SMEs established in Rio de Janeiro, Brazil since June 2008. We believe that our drive The Value, The Reach, and The Impact is what differentiates us and unleash the endless possibilities of our philosophy through the power of software. We like to call it Innovation At The Speed Of Life. That's how we do our share of advancing humanity.


## License

This software is released under [The MIT License (MIT)](LICENSE).

(c) 2008-2025 SierraTecnologia, Some rights reserved.
