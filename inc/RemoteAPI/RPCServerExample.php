<?php
/**
 * EXAMPLE FOR RPC SERVER
 *
 * @version 1.0
 * @author  Jan Zmátlík
 * @date    15th April 2011
 * @link    http://www.dokuwiki.org/devel:ideas:remote_api
 * @license LGPL
 *
 *
 *  
 * You need to create instance of specific server.
 *  
 * $server = new dokuwiki_jsonrpc_server();
 * $server = new dokuwiki_xmlrpc_server(); 
 * 
 * After that you take that instance and put in RPCServer constructor.  
 * 
 * $rpcServer = new RPCServer( $server );
 * 
 * Now you can working with RPC server as XML/JSON server.
 * 
 * Or you can use RPCFactoryServer. This class implements Singleton and Factory method pattern.
 * If you want to create instance of RPC server, calls method getInstance with parameter:
 * RPCFactoryServer::$XMLRPC or RPCFactoryServer::$JSONRPC
 * 
 * For example XMLRPC server. 
 * $rpcServer = RPCFactoryServer::getInstance( RPCFactoryServer::$XMLRPC );
 *  
 */

?>