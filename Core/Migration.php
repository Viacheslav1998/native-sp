<?php

namespace Core;

use PDO;
use PDOException;
use Exception;
class Migration 
{
    protected $pdo;
    protected $migrationDir;
    
    public function __construct(PDO $pdo)
    {     
        $this->pdo = $pdo;
        $this->migrationDir = realpath(__DIR__ . '/../database/migrations') . '/';
    }

    /**
     * CREATE TABLE MIGRATIONS
     */
    public function createMigrationsTable()
    {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS migrations (
                id INT AUTO_INCREMENT PRIMARY KEY,
                filename VARCHAR(255) NOT NULL,
                applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }

    /**
     * GET ALL APPLIED MIGRATIONS
     */
    public function getAppliedMigrations()
    {
        $stmt = $this->pdo->query("SELECT filename FROM migrations");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * execute sql and save history in db
     */
    public function applyMigration($filename)
    {
        $filePath = $this->migrationDir . $filename;

        try {
            if (!file_exists($filePath)) {
              throw new \RuntimeException("Migration file not found: $filePath");
            }

            $sql = file_get_contents($filePath);

            $this->pdo->exec($sql);

            $stmt = $this->pdo->prepare("INSERT INTO migrations (filename) VALUES (:filename)");
            $stmt->execute(['filename' => $filename]);

        } catch (\Throwable $e) {
          $this->logError($e, "applying migration $filename");
          return false;
        }

        return true;
    }


   

    /**
     * Command stack is executed
     * Database management
     */
    public function run()
    {
        // create tables if not exists
        $this->createMigrationsTable();

        // get apllied migrations
        $applied = $this->getAppliedMigrations();

        // get all files migrations sql
        $files = glob($this->migrationDir . '*.sql');

        // migration overshoot
        foreach($files as $file) {
            $filename = basename($file);

            // if migration has been done, skip
            if(in_array($filename, $applied)) {
              continue;
            }

            // echo "Applying migration: $filename\n";
            if(!$this->applyMigration($filename)) {
                break;
            }
        }
    }

    /** 
     * generation logs/errors
     */
    protected function logError(\Throwable $e, string $context = '')
    {
        $timestamp = date('Y-m-d H:i:s');
        $message = "[$timestamp] ❌ ERROR ";

        if($context) {
          $message .= "during $context";
        }

        $message .= ":\n" . $e->getMessage() . "\n";

        if($e instanceof PDOException && $e->errorInfo) {
          $message .= "SQLSTATE: " . $e->errorInfo[0] . "\n";
          $message .= "Driver Error Code: " . $e->errorInfo[1] . "\n";
          $message .= "Driver Error Message: " . $e->errorInfo[2] . "\n";
        }
        
        $message .= "in " . $e->getFile() . ':' . $e->getLine() . "\n";
        $message .= "Stack trace:\n" . $e->getTraceAsString() . "\n";
        
        error_log($message); 
    }


}