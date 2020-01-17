<?php
namespace Finder\Spider\Abstracts;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

use Finder\Spider\File;
use Finder\Spider\Directory;
use Finder\Spider\Registrator\FileRegistrator;
use Finder\Spider\Metrics\FileMetric;

use Support\Helps\DebugHelper;

/**
 * Run all script analysers and outputs their result.
 */
abstract class Track
{
    protected $target = false;
    protected $parent = false;

    public function __construct($target, $parentTrack = false)
    {
        $this->setTarget($target);
        $this->setParent($parent);
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getTarget()
    {
        return $this->target;
    }

    protected function setTarget($target)
    {
        $this->target = $target;
    }


    /**
     * 
     */
    public function addSubTrack(Track $track)
    {
        $this->subTracks[] = $track;
    }
    public function getSubTrack(Track $track)
    {
        return $this->subTracks;
    }


    /**
     * 
     */
    public function addInformateArray($array)
    {
        foreach ($array as $indice => $valor) {
            $this->addInformate($indice, $valor);
        }
    }
    public function addInformate($name, $valor)
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
     *  Passa informacao pro pai
     */
    public function saveInformate($array)
    {
        foreach ($array as $informate) {
            if ($informateInfo = $this->getInformate($informate[0])) {
                $informate[1]($informateInfo);
            }
        }
    }



    /**
     * 
     */
    public function exec()
    {
        // Carrega oq Precisa
        $this->loadSubTracks();

        // Roda
        $this->run();

        // ROdando os FIlhos
        $trackingsChields = $this->getTrackModel()->tracks()->get();
        foreach ($trackingsChields as $trackingsChield) {
            $trackingsChield->exec()->saveInformate(
                $this->collectInformateFromSubTracks()
            );
        }
    }



    /**
     * 
     */
    public function loadSubTracks()
    {
        foreach ($this->subTracks() as $relation => $classTrack) {
            $results = $this->model->$relation()->get();
            foreach ($results as $result) {
                $this->addSubTrack( new $classTrack($result));
            }
        }
    }



    /**
     * Reescrever
     */


    public function subTracks()
    {
        return [
            
        ];
    }

    public function run()
    {
        return true;
    }
}