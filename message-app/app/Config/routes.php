<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/registration-success-page', array('controller' => 'users', 'action' => 'registrationSuccessPage'));

	/** API Routes */

	// Route for getting messages
	Router::connect('/api/messages/:userId/:page', array('controller' => 'messages', 'action' => 'apiGetMessages'), array('pass' => array('userId', 'page')));

	// Route for getting message details
	Router::connect('/api/messages/details/:toUserId/:page', array('controller' => 'messages', 'action' => 'apiGetMessageDetails'), array('pass' => array('toUserId', 'page')));

	// Route for getting message details
	Router::connect('/api/messages-search-count/:toUserId/:search', array('controller' => 'messages', 'action' => 'apiSearchMessageGetCount'), array('pass' => array('toUserId', 'search')));

	// Route for sending a new message
	Router::connect('/api/messages/send', array('controller' => 'messages', 'action' => 'apiSendMessage'));

	// Route for marking a message as read
	Router::connect('/api/messages/mark_read/:id', array('controller' => 'messages', 'action' => 'apiMarkAsRead'), array('pass' => array('id'), 'id' => '[0-9]+'));

	// Route for deleting a message
	Router::connect('/api/message-delete/:id/:userId', array('controller' => 'messages', 'action' => 'apiDeleteMessage'), array('pass' => array('id', 'userId'), 'id' => '[0-9]+'));
	
	// Route for deleting a message
	Router::connect('/api/messages-delete-conversation/:toUserId', array('controller' => 'messages', 'action' => 'apiDeleteConversation'), array('pass' => array('toUserId'), 'toUserId' => '[0-9]+'));
	
	// Route for contacts search
	Router::connect('/api/search-contacts', array('controller' => 'messages', 'action' => 'apiSearchContacts'));

	// You can define other routes for your API actions as needed.

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
