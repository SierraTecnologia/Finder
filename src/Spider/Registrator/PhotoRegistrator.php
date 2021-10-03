<?php
namespace Finder\Spider\Registrator;

use Finder\Contracts\Spider\TargetManager;

use Stalker\Models\File;
use Stalker\Models\Imagen;
use Finder\Models\Digital\Internet\ComputerFile;
use Telefonica\Models\Actors\Person;

/**
 * Run all script analysers and outputs their result.
 */
class PhotoRegistrator extends FileRegistrator
{
    protected $photo = false;

    public function __construct($target, $parent = false)
    {
        parent::__construct($target, $parent);
    }

    public function havePerson($code): void
    {


        $photo = $this->returnPhoto();

        $person = Person::returnOrCreateByCode($code);
        $photo->persons()->save($person);
    }

    private function returnPhoto()
    {
        if ($this->photo) {
            return $this->photo;
        }

        $md5 = md5($this->getTarget()->getContents());

        if ($this->photo = Imagen::where('location', $md5)->first()) {
            return $this->photo;
        }
        
        $array = [
            'file_id' => $this->returnFile()->id,
            'location' => $md5,
            'name' => $this->getTarget()->getFilename()
        ];

        return $this->photo = Imagen::create($array);
    }
}