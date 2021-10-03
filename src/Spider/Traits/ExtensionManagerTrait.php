<?php
namespace Finder\Spider\Traits;

use Muleta\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 *
 * @see TriggerableInterface
 */
trait ExtensionManagerTrait
{
    protected $file = false;

    protected function setFile($file): void
    {
        if (is_string($file)) {
            $this->stringPath = true;
        }
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getContents()
    {
        return $this->getFile()->getContents();
    }

    /**
     * Lógica
     *
     * @return true
     */
    protected function run(): bool
    {
        DebugHelper::debug('Run ExtensionManager '.$this->getFile());
        return $this->identificar();
    }
    /**
     * @return true
     */
    protected function identificar(): bool
    {
        if (!isset(static::$identificadores)) {
            return true;
        }

        if (empty(static::$identificadores)) {
            return true;
        }

        foreach (static::$identificadores as $identificador) {
            $identificadorInstance = new $identificador($this);
        }
        return true;
    }
}
