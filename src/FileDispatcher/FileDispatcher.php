<?php

namespace Maxbarsukov\L7xl7\FileDispatcher;

use DirectoryIterator;

class FileDispatcher
{
    private ?string $_fileExtension;

    public function __construct(string $fileExtension = null)
    {
        if (null !== $fileExtension && '.' == $fileExtension[0]) {
            $fileExtension = substr($fileExtension, 1);
        }
        $this->_fileExtension = $fileExtension;
    }

    public function dispatch($filename): array
    {
        // Without file extension check
        if (is_file($filename)) {
            return [realpath($filename)];
        }

        return $this->listFolderFiles($filename);
    }

    public function listFolderFiles($dir, $file_paths = []): array
    {
        foreach (new DirectoryIterator($dir) as $fileInfo) {
            if (!$fileInfo->isDot()) {
                if ($fileInfo->isDir()) {
                    $file_paths = $this->listFolderFiles(
                        $fileInfo->getPathname(), $file_paths
                    );
                } else {
                    $path = $fileInfo->getRealPath();
                    if ($this->_checkExtension($path)) {
                        $file_paths[] = $path;
                    }
                }
            }
        }

        return $file_paths;
    }

    private function _checkExtension($path): bool
    {
        if (null === $this->_fileExtension) {
            return true;
        }

        return pathinfo($path, \PATHINFO_EXTENSION) == $this->_fileExtension;
    }
}
