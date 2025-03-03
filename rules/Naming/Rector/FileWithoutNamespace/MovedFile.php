<?php

declare(strict_types=1);

namespace Rector\Naming\Rector\FileWithoutNamespace;

use PhpParser\Node\Stmt;
use Rector\FileSystemRector\Contract\FileWithNodesInterface;

final class MovedFile implements FileWithNodesInterface
{
    public function __construct(
        private readonly File $file,
        private readonly string $newFilePath
    ) {
    }

    public function getFile(): File
    {
        return $this->file;
    }

    public function getNewFilePath(): string
    {
        return $this->newFilePath;
    }

    /**
     * @return Stmt[]
     */
    public function getNodes(): array
    {
        return $this->file->getNewStmts();
    }

    public function getFilePath(): string
    {
        $smartFileInfo = $this->file->getSmartFileInfo();
        return $smartFileInfo->getRelativeFilePath();
    }
}
