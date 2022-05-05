<?php

namespace Maxbarsukov\L7xl7\FileLoader;

use DirectoryIterator;

class FileLoader
{
    private ?array $_fileExtensions;

    public function __construct(array $fileExtensions = null)
    {
        if (null !== $fileExtensions) {
            foreach ($fileExtensions as &$fileExtension) {
                if ('.' === $fileExtension[0]) {
                    $fileExtension = substr($fileExtension, 1);
                }
            }
        }

        $this->_fileExtensions = $fileExtensions;
    }

    public function load($filename): array
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
        if (null === $this->_fileExtensions) {
            return true;
        }

        return \in_array(pathinfo($path, \PATHINFO_EXTENSION), $this->_fileExtensions);
    }
}
