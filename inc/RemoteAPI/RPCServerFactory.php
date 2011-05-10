<?php
/**
 * SINGLETON FACTORY METHOD FOR CREATION INSTANCE OF SPECIFIC RPC SERVER
 *
 * @version 1.0
 * @author  Jan Zmátlík
 * @date    15th April 2011
 * @link    http://www.dokuwiki.org/devel:ideas:remote_api
 * @license LGPL
 *
 */
 
class RPCFactoryServer {
  
 /**
  * Type is used for XML RPC API    
  */
  public static $XMLRPC = 0;
  
 /**
  * Type is used for JSON RPC API    
  */
  public static $JSONRPC = 1;

 /**
  *  Instance of current class RPCFactoryServer
  **/
  private static $instance = null;
  
 /**
  *  Instance of specific server which implements IRemoteAPI
  **/
  private static $server = null;
  
 /**
  *  Private constructor for Singleton pattern
  **/  
  private function __construct() { }
  
  /**
   * Get instance of specific RPC server, defined in $type
   * You can use RPCFactoryServer types
   * RPCFactoryServer::$XMLRPC or RPCFactoryServer::$JSONRPC
   *     
   */
  public static function getInstance($type)
  {
    switch($type)
    {
      case self::$XMLRPC:
        self::$server = new dokuwiki_xmlrpc_server();
        break;
      case self::$JSONRPC:
        self::$server = new dokuwiki_jsonrpc_server();
        break;
      default: 
        return "Error.";
    }
    
    if(self::$instance == null)
      $instance = new RPCFactoryServer( self::$server );
  } 
}

?>