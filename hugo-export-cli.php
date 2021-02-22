<?php
/*
 * Run the exporter from the command line and spit the zipfile to STDOUT.
 *
 * Usage:
 *
 *     $ php hugo-export-cli.php > my-hugo-files.zip
 * 
 * Usage: (With configured tmp folder if the avaiable space in system /tmp is insufficent for migration)
 * 
 *     $ php hugo-export-cli.php /mnt/tmp-folder
 *
 * Must be run in the wordpress-to-hugo-exporter/ directory.
 *
 */

include_once "../../../wp-load.php";
include_once "../../../wp-admin/includes/file.php";
require_once "hugo-export.php";

$je = new Hugo_Export();

// Removed temp folder argument.

// First argument changed to a year, or 0 for all years.
// If specified, exports only posts from that year.
if( isset($argv[1]) )
{
    $je->setExportYear(intval($argv[1]));
}

// Second argument is a blog ID value, or -1 for the default.
// If specified, can export from multisite blogs.
if( isset($argv[2]) )
{
    $je->setExportBlog(intval($argv[2]));
}

$je->export();
