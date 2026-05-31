<?php

// ============================================================
// FILE SYSTEM IN PHP
// ============================================================


// ============================================================
// CHECKING FILES & DIRECTORIES
// ============================================================

$file = 'example.txt';
$dir  = 'example_dir';

var_dump(file_exists($file));    // true if file or directory exists
var_dump(is_file($file));        // true only for files
var_dump(is_dir($dir));          // true only for directories
var_dump(is_readable($file));    // true if readable
var_dump(is_writable($file));    // true if writable
var_dump(is_executable($file));  // true if executable
echo '<br />';


// ============================================================
// FILE METADATA
// ============================================================

if (file_exists($file)) {
    echo filesize($file)             . '<br />'; // size in bytes
    echo filetype($file)             . '<br />'; // file, dir, link, etc.
    echo date('d/m/Y H:i:s', filemtime($file)) . '<br />'; // last modified
    echo date('d/m/Y H:i:s', fileatime($file)) . '<br />'; // last accessed
    echo date('d/m/Y H:i:s', filectime($file)) . '<br />'; // last changed (metadata)
    echo realpath($file)             . '<br />'; // absolute path
    echo basename($file)             . '<br />'; // filename with extension
    echo pathinfo($file, PATHINFO_FILENAME)  . '<br />'; // filename without extension
    echo pathinfo($file, PATHINFO_EXTENSION) . '<br />'; // extension only
    echo pathinfo($file, PATHINFO_DIRNAME)   . '<br />'; // directory path
    echo '<br />';

    // Full pathinfo array
    echo '<pre>';
    print_r(pathinfo($file));
    echo '</pre>';
}


// ============================================================
// READING FILES
// ============================================================

// file_get_contents() — reads entire file into a string
$content = file_get_contents($file);
echo $content . '<br />';

// file() — reads file into an array (one element per line)
$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
echo '<pre>';
print_r($lines);
echo '</pre>';

// Reading with fopen() — more control, useful for large files
$handle = fopen($file, 'r'); // r = read only

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        echo $line . '<br />'; // read line by line
    }
    fclose($handle); // always close the handle
}

// fread() — read a specific number of bytes
$handle = fopen($file, 'r');
if ($handle) {
    $content = fread($handle, filesize($file)); // read entire file
    echo $content . '<br />';
    fclose($handle);
}


// ============================================================
// WRITING FILES
// ============================================================

// file_put_contents() — write string to file (creates if not exists)
file_put_contents($file, 'Hello World');               // overwrites
file_put_contents($file, PHP_EOL . 'New line', FILE_APPEND); // appends

// fopen() modes:
//   r  → read only, pointer at start
//   r+ → read & write, pointer at start
//   w  → write only, truncates file, creates if not exists
//   w+ → read & write, truncates file, creates if not exists
//   a  → write only, pointer at end (append), creates if not exists
//   a+ → read & write, pointer at end (append), creates if not exists
//   x  → write only, fails if file already exists
//   x+ → read & write, fails if file already exists

$handle = fopen($file, 'a'); // open for appending

if ($handle) {
    fwrite($handle, PHP_EOL . 'Appended line');
    fclose($handle);
}


// ============================================================
// COPYING, MOVING & DELETING FILES
// ============================================================

copy($file, 'example_copy.txt');        // copy file
rename($file, 'example_renamed.txt');   // move or rename
unlink('example_renamed.txt');          // delete file


// ============================================================
// CREATING & REMOVING DIRECTORIES
// ============================================================

mkdir($dir);                        // create directory
mkdir('nested/dir/path', 0755, true); // create nested directories recursively

rmdir($dir);                        // remove directory (must be empty)

// Remove non-empty directory recursively
function deleteDirectory(string $path): void
{
    if (!is_dir($path)) {
        return;
    }

    $items = scandir($path);

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $fullPath = $path . DIRECTORY_SEPARATOR . $item;

        is_dir($fullPath)
            ? deleteDirectory($fullPath) // recurse into subdirectories
            : unlink($fullPath);         // delete file
    }

    rmdir($path); // remove now-empty directory
}


// ============================================================
// LISTING DIRECTORY CONTENTS
// ============================================================

// scandir() — returns array of files and directories
$items = scandir(__DIR__);

echo '<pre>';
print_r($items);
echo '</pre>';

// Filter out . and ..
$items = array_filter(
    scandir(__DIR__),
    fn($item) => $item !== '.' && $item !== '..'
);

echo '<pre>';
print_r($items);
echo '</pre>';

// opendir() / readdir() — iterate manually
$handle = opendir(__DIR__);

if ($handle) {
    while (($item = readdir($handle)) !== false) {
        if ($item === '.' || $item === '..') continue;
        echo $item . '<br />';
    }
    closedir($handle);
}

// glob() — find files matching a pattern
$phpFiles = glob(__DIR__ . '/*.php');

echo '<pre>';
print_r($phpFiles);
echo '</pre>';


// ============================================================
// FILE LOCKING
// ============================================================
// Prevents race conditions when multiple processes write to the same file

$handle = fopen($file, 'a');

if ($handle) {
    if (flock($handle, LOCK_EX)) {       // acquire exclusive lock
        fwrite($handle, 'Safe write' . PHP_EOL);
        flock($handle, LOCK_UN);          // release lock
    }
    fclose($handle);
}


// ============================================================
// USEFUL CONSTANTS
// ============================================================

echo __FILE__      . '<br />'; // absolute path of the current file
echo __DIR__       . '<br />'; // directory of the current file
echo PHP_EOL       . '<br />'; // OS-appropriate line ending (\n or \r\n)
echo DIRECTORY_SEPARATOR . '<br />'; // / on Unix, \ on Windows

