<?php

namespace Finder\Pipelines\Finder;

use Operador\Contracts\Stage as StageBase;
use Fabrica\Models\Code\Commit;
use Illuminate\Support\Collection;
use Fabrica\Helps\Git\GitRepo;

class Repository extends StageBase
{
    public function __invoke($payload)
    {
        $this->info('Analisando Repository: '.$payload->getTargetPath());
        
        $p = new GitRepo($payload->getTargetPath());

        // (new Collection($p->listBranches()))->map(function ($branch) use ($p) {
        //     if (!$commit = Commit::
        //     $payload->commits
        // });

        (new Collection($p->getRevisions()))->map(function ($revision) use ($p, $payload) {
            // \Log::info($revision);
            if (!$commit = Commit::where('code', $revision['sha1'])->first()) {
                $commit = Commit::create([
                    'code' => $revision['sha1'],
                    'date' => $revision['date'],
                    'author' => $revision['author'],
                    'message' => $revision['message'],
                ]);
            }
            // dd($payload);
            $payload->commits()->attach($commit);
        });

        return $payload;
    }
}