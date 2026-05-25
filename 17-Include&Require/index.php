<?php

// ============================================================
// FILE INCLUSION — require / include / require_once / include_once
// ============================================================
// All four directives include and evaluate an external PHP file
// The key differences are in error handling and repetition control


// ============================================================
// include
// ============================================================
// Includes the file and executes it
// If the file is NOT found → emits a WARNING and continues execution
// Use when the file is optional and the script can run without it

include 'header.php';
include 'optional_widget.php'; // script keeps running even if not found


// ============================================================
// require
// ============================================================
// Includes the file and executes it
// If the file is NOT found → emits a FATAL ERROR and stops execution
// Use when the file is essential and the script cannot run without it

require 'config.php';
require 'database.php'; // if missing, everything stops here


// ============================================================
// include_once
// ============================================================
// Same behaviour as include, but PHP checks if the file has
// already been included — if so, it is NOT included again
// Prevents duplicate function/class definitions
// If the file is NOT found → WARNING, execution continues

include_once 'functions.php';
include_once 'functions.php'; // ignored — already included


// ============================================================
// require_once
// ============================================================
// Same behaviour as require, but like include_once, it checks
// if the file has already been included and skips it if so
// If the file is NOT found → FATAL ERROR, execution stops
// Most commonly used for critical files like configs and classes

require_once 'file.php';
require_once 'file.php'; // ignored — already included

echo 'Hello from index' . '<br />';


// ============================================================
// COMPARISON TABLE
// ============================================================
//
//  Directive      │ File not found  │ Include twice │ Use case
// ────────────────┼─────────────────┼───────────────┼──────────────────────────
//  include        │ Warning         │ Yes           │ Optional files (templates)
//  require        │ Fatal Error     │ Yes           │ Essential files
//  include_once   │ Warning         │ No            │ Optional, no duplicates
//  require_once   │ Fatal Error     │ No            │ Essential, no duplicates
//
// Rule of thumb:
//   - Use require_once for configs, classes, and autoloaders
//   - Use include / include_once for view templates and partials
//   - Prefer require over include when the file is truly essential
//   - In modern PHP with Composer autoloading, direct includes are rare


// ============================================================
// RETURN VALUE
// ============================================================
// An included file can return a value — useful for config files

// config.php
// <?php return ['db_host' => 'localhost', 'db_name' => 'myapp'];

$config = require 'config.php'; // $config receives the returned array
echo $config['db_host'] . '<br />';


// ============================================================
// PATHS — relative vs absolute
// ============================================================

require_once 'same_folder.php';           // relative to the current file
require_once './same_folder.php';         // explicit current directory
require_once '../parent_folder/file.php'; // one level up
require_once __DIR__ . '/same_folder.php'; // absolute — most reliable

// __DIR__ always resolves to the directory of the current file
// regardless of where the script is called from
// Always prefer __DIR__ over relative paths to avoid path issues
