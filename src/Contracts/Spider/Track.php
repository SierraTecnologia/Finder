<?php
namespace Finder\Contracts\Spider;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

use Finder\Spider\File;
use Finder\Spider\Directory;
use Finder\Spider\Registrator\FileRegistrator;
use Finder\Spider\Metrics\FileMetric;

use Muleta\Helps\DebugHelper;

/**
 * Run all script analysers and outputs their result.
 */
abstract class Track
{
    protected $model = false;
    protected $parent = false;

    protected $subTracks = [];
    protected $informate = [];

    public function __construct($model, $parentTrack = false)
    {
        $this->setModel($model);
        $this->setParent($parentTrack);
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent): void
    {
        $this->parent = $parent;
    }

    public function getModel()
    {
        return $this->model;
    }

    protected function setModel($model): void
    {
        $this->model = $model;
    }


    /**
     * @return void
     */
    public function addSubTrack(Track $track): void
    {
        $this->subTracks[] = $track;
    }
    public function getSubTrack()
    {
        return $this->subTracks;
    }


    /**
     * @return bool
     */
    public function addInformateArray($array): bool
    {
        if (!is_array($array)) {
            return false;
        }

        foreach ($array as $indice => $valor) {
            $this->addInformate($indice, $valor);
        }
        return true;
    }
    /**
     * @param (int|string) $name
     */
    public function addInformate($name, $valor): void
    {
        $this->informate[$name] = $valor;
    }
    public function getInformate($name)
    {
        if (!isset($this->informate[$name]) || empty($this->informate[$name])) {
            return false;
        }

        return $this->informate[$name];
    }

    /**
     * Passa informacao pro pai
     *
     * @return void
     */
    public function saveInformate($array): void
    {
        foreach ($array as $informate) {
            if ($informateInfo = $this->getInformate($informate[0])) {
                $informate[1]($informateInfo);
            }
        }
    }



    /**
     * @return static
     */
    public function exec(): self
    {
        // Carrega oq Precisa
        $this->loadSubTracks();

        // Roda
        $this->run();

        // ROdando os FIlhos
        if (is_array($trackingsChields = $this->getSubTrack())) {
            foreach ($trackingsChields as $trackingsChield) {
                $trackingsChield->exec()->saveInformate(
                    $this->collectInformateFromSubTracks()
                );
            }
        }

        return $this;
    }



    /**
     * @return void
     */
    public function loadSubTracks(): void
    {
        foreach ($this->subTracks() as $relation => $classTrack) {
            $results = $this->model->$relation()->get();
            foreach ($results as $result) {
                $this->addSubTrack(new $classTrack($result));
            }
        }
    }



    /**
     * Reescrever
     *
     * @return array
     *
     * @psalm-return array<empty, empty>
     */
    public function subTracks()
    {
        return [
            
        ];
    }

    /**
     * @return true
     */
    public function run()
    {
        return true;
    }
}