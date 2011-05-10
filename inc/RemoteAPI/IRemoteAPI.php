<?php
/**
 * REMOTE API INTERFACE FOR XML, JSON {REST} RPC
 *
 * @version 1.0
 * @author  Jan Zmátlík
 * @date    15th April 2011
 * @link    http://www.dokuwiki.org/devel:ideas:remote_api
 * @license LGPL
 *
 */
 
 interface IRemoteAPI {
 
 /**
  * Checks if the current user is allowed to execute non anonymous methods
  */
  public function checkAuth();
  
 /**
  * Adds a callback, extends parent method
  *
  * add another parameter to define if anonymous access to
  * this method should be granted.
  */
  function addCallback($method, $callback, $args, $help, $public = false);
  
 /**
  * Execute a call, extends parent method
  *
  * Checks for authentication first
  */
  function call($methodname, $args);
  
  /// Kontruktor - tam se zaregistrujou metody a spusti se
  
 /**
  * Return a raw wiki page
  */
  function rawPage($id, $rev = '');
  
 /**
  * Returns the wiki title.
  */
  function getTitle();
  
 /**
  * Appends text to a wiki page.
  */
  function appendPage($id, $text, $params);
 
 /**
  * Return a media file encoded in base64
  *
  * @author Gina Haeussge <osd@foosel.net>
  */
  function getAttachment($id);
  
 /**
  * Return info about a media file
  *
  * @author Gina Haeussge <osd@foosel.net>
  */
  function getAttachmentInfo($id);
  
 /**
  * Return a wiki page rendered to html
  */
  function htmlPage($id, $rev = '');
  
 /**
  * List all pages - we use the indexer list here
  */
  function listPages();
  
 /**
  * List all pages in the given namespace (and below)
  */
  function readNamespace($ns, $opts);
  
 /**
  * List all media files.
  *
  * Available options are 'recursive' for also including the subnamespaces
  * in the listing, and 'pattern' for filtering the returned files against
  * a regular expression matching their name.
  *   
  * @author Gina Haeussge <osd@foosel.net>
  */
  function listAttachments($ns, $options = array());
  
 /**
  * List all pages in the given namespace (and below)
  */
  function search($query);
  
 /**
  * Return a list of backlinks
  */
  function listBackLinks($id);
  
 /**
  * Return some basic data about a page
  */
  function pageInfo($id, $rev = '');
  
 /**
  * Save a wiki page
  *
  * @author Michael Klier <chi@chimeric.de>
  */
  function putPage($id, $text, $params);
  
 /**
  * Uploads a file to the wiki.
  *
  * Michael Klier <chi@chimeric.de>
  */
  function putAttachment($id, $file, $params);
  
 /**
  * Deletes a file from the wiki.
  *
  * @author Gina Haeussge <osd@foosel.net>
  */
  function deleteAttachment($id);
  
 /**
  * Returns the permissions of a given wiki page
  */
  function aclCheck($id);
  
 /**
  * Lists all links contained in a wiki page
  *
  * @author Michael Klier <chi@chimeric.de>
  */
  function listLinks($id);
  
 /**
  * Returns a list of recent changes since give timestamp
  *
  * @author Michael Hamann <michael@content-space.de>
  * @author Michael Klier <chi@chimeric.de>
  */
  function getRecentChanges($timestamp);
  
 /**
  * Returns a list of recent media changes since give timestamp
  *
  * @author Michael Hamann <michael@content-space.de>
  * @author Michael Klier <chi@chimeric.de>
  */
  function getRecentMediaChanges($timestamp);
  
 /**
  * Returns a list of available revisions of a given wiki page
  *
  * @author Michael Klier <chi@chimeric.de>
  */
  function pageVersions($id, $first, $num = null);
  
 /**
  * Locks or unlocks a given batch of pages
  *
  * Give an associative array with two keys: lock and unlock. Both should contain a
  * list of pages to lock or unlock
  *
  * Returns an associative array with the keys locked, lockfail, unlocked and
  * unlockfail, each containing lists of pages.
  */
  function setLocks($set);
  
  /**
   *  Returns actual version of RPC API
   *
   */  
  function getAPIVersion();
  
  /**
   * Authorization user  
   */
  function login($user,$pass);

}

?>