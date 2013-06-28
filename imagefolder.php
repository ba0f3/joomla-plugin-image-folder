<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.cache
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Image Folder Plugin
 *
 * @package     Joomla.Plugin
 * @subpackage  System.imagefolder
 */
class PlgSystemImageFolder extends JPlugin
{
    /**
     * @param JEventDispatcher $subject
     * @param array $config
     */
    function __construct(&$subject, $config) {
        parent::__construct($subject, $config);
    }

    /**
     * @param JForm $form
     * @param JObject $data
     */
    function onContentPrepareForm($form, $data) {

        JFactory::getLanguage()->load('plg_system_imagefolder', JPATH_SITE . '/plugins/system/imagefolder', null, true);

        JForm::addFormPath(dirname(__FILE__).'/article');
        $form->loadFile('article', false);
    }

}
