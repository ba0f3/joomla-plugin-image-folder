<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.imagefolder
 *
 * @copyright   Copyright (C) 2013 Bruce Doan. All rights reserved.
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
     * @return boolean
     */
    function onContentPrepareForm($form, $data) {
        $app = JFactory::getApplication();
        $option = $app->input->get('option');
        $view = $app->input->get('view');
        $layout = $app->input->get('layout');

        if($option == 'com_content' && $view == 'article' && $layout == 'edit') {
            JFactory::getLanguage()->load('plg_system_imagefolder', JPATH_SITE . '/plugins/system/imagefolder', null, true);

            JForm::addFormPath(dirname(__FILE__).'/article');
            $form->loadFile('article', false);
        }
    }

    /**
     * @param string $context
     * @param JTableContent $article
     * @param boolean $isNew
     * @return boolean
     */
    function onContentBeforeSave($context, $article, $isNew) {
        $app = JFactory::getApplication();
        $option = $app->input->get('option');
        $view = $app->input->get('view');
        $layout = $app->input->get('layout');

        if($option == 'com_content' && $view == 'article' && $layout == 'edit') {
            $imagefolder = $_POST['jform']['images']['imagefolder'];
            $images = json_decode($article->images);
            $images->imagefolder = $imagefolder;

            $article->images = json_encode($images);
        }
    }
}
