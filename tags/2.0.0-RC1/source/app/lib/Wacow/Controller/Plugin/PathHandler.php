<?php
/**
 * Wacow Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Wacow
 * @package    Wacow_Controller
 * @subpackage Wacow_Controller_Plugin
 * @copyright  Copyright (c) 2007-2009 Wabow Information Inc. (http://www.wabow.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * @see Zend_Controller_Plugin_Abstract
 */
require_once 'Zend/Controller/Plugin/Abstract.php';

/**
 * Set fulll path of current module for path translator
 *
 * @category   Wacow
 * @package    Wacow_Controller
 * @subpackage Wacow_Controller_Plugin
 * @copyright  Copyright (c) 2007-2009 Wabow Information Inc. (http://www.wabow.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Wacow_Controller_Plugin_PathHandler extends Zend_Controller_Plugin_Abstract
{
    /**
     * Add Module name traslation to translator.
     *
     * @param Wacow_Controller_Action $actionController
     * @param Zend_Controller_Request_Abstract $request
     */
    public function dispatchLoopStartup()
    {
        $translator = Wacow_Application::getPathTranslator();
        $translator->addPathMapping(':moduleDir', $translator->getRuntimePath(':modulePath') . '/' . $this->_request->getModuleName());
    }

    /**
     * Add include path of models by module.
     *
     */
    public function preDispatch()
    {
        Wacow_Application::getInstance()->addIncludePath(':moduleDir/models');
    }
}