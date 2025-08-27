<?php
namespace App\Services;

class DatabaseBackup
{
    protected string $backupFile;
    protected string $flagFile;

    public function __construct()
    {
        $this->backupFile = __DIR__ . '/../db_backup.sql';
        $this->flagFile = __DIR__ . '/../.backup_done';
    }

    public function backup(): void
    {
        $firstRun = !file_exists($this->flagFile);

        if ($firstRun || $this->needsBackup()) {
          $this->doBackup();
          file_put_contents($this->flagFile, date('Y-m-d H:i:s'));
          echo "Backup completed! \n";
        } else {
          echo "Backup";
        }
    }

    protected function needsBackup(): bool
    {
        $last = file_get_contents($this->flagFile);
        return (time() - strtotime($last)) > 3600;
    }

    protected function doBackup(): void
    {
        $dbUser = 'root';
        $dbPass = '1914';
        $dbName = 'hastle';

        exec("mysqldump -u {$dbUser} -p{$dbPass} {$dbName} > {$this->backupFile}");
    }
}