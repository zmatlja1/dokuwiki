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
  public function addCallback($method, $callback, $args, $help, $public = false);
  
 /**
  * Execute a call, extends parent method
  *
  * Checks for authentication first
  */
  public function call($methodname, $args);
  
 /**
  * Return a raw wiki page
  */
  public function rawPage($id, $rev = '');
  
 /**
  * Returns the wiki title.
  */
  public function getTitle();
  
 /**
  * Appends text to a wiki page.
  */
  public function appendPage($id, $text, $params);
 
 /**
  * Return a media file encoded in base64
  *
  * @author Gina Haeussge <osd@foosel.net>
  */
  public function getAttachment($id);
  
 /**
  * Return info about a media file
  *
  * @author Gina Haeussge <osd@foosel.net>
  */
  public function getAttachmentInfo($id);
  
 /**
  * Return a wiki page rendered to html
  */
  public function htmlPage($id, $rev = '');
  
 /**
  * List all pages - we use the indexer list here
  */
  public function listPages();
  
 /**
  * List all pages in the given namespace (and below)
  */
  public function readNamespace($ns, $opts);
  
 /**
  * List all media files.
  *
  * Available options are 'recursive' for also including the subnamespaces
  * in the listing, and 'pattern' for filtering the returned files against
  * a regular expression matching their name.
  *   
  * @author Gina Haeussge <osd@foosel.net>
  */
  public function listAttachments($ns, $options = array());
  
 /**
  * List all pages in the given namespace (and below)
  */
  public function search($query);
  
 /**
  * Return a list of backlinks
  */
  public function listBackLinks($id);
  
 /**
  * Return some basic data about a page
  */
  public function pageInfo($id, $rev = '');
  
 /**
  * Save a wiki page
  *
  * @author Michael Klier <chi@chimeric.de>
  */
  public function putPage($id, $text, $params);
  
 /**
  * Uploads a file to the wiki.
  *
  * Michael Klier <chi@chimeric.de>
  */
  public function putAttachment($id, $file, $params);
  
 /**
  * Deletes a file from the wiki.
  *
  * @author Gina Haeussge <osd@foosel.net>
  */
  public function deleteAttachment($id);
  
 /**
  * Returns the permissions of a given wiki page
  */
  public function aclCheck($id);
  
 /**
  * Lists all links contained in a wiki page
  *
  * @author Michael Klier <chi@chimeric.de>
  */
  public function listLinks($id);
  
 /**
  * Returns a list of recent changes since give timestamp
  *
  * @author Michael Hamann <michael@content-space.de>
  * @author Michael Klier <chi@chimeric.de>
  */
  public function getRecentChanges($timestamp);
  
 /**
  * Returns a list of recent media changes since give timestamp
  *
  * @author Michael Hamann <michael@content-space.de>
  * @author Michael Klier <chi@chimeric.de>
  */
  public function getRecentMediaChanges($timestamp);
  
 /**
  * Returns a list of available revisions of a given wiki page
  *
  * @author Michael Klier <chi@chimeric.de>
  */
  public function pageVersions($id, $first, $num = null);
  
 /**
  * Locks or unlocks a given batch of pages
  *
  * Give an associative array with two keys: lock and unlock. Both should contain a
  * list of pages to lock or unlock
  *
  * Returns an associative array with the keys locked, lockfail, unlocked and
  * unlockfail, each containing lists of pages.
  */
  public function setLocks($set);
  
  /**
   *  Returns actual version of RPC API
   *
   */  
  public function getAPIVersion();
  
  /**
   * Authorization user  
   */
  public function login($user,$pass);

}

?>