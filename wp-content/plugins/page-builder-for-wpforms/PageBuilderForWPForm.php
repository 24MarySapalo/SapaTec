<?php

/**
 * Plugin Name: Page Builder for WPForms
 * Plugin URI: http://smartforms.rednao.com/getit
 * Description: Create pages using your wpform entries
 * Author: RedNao
 * Author URI: http://rednao.com
 * Version: 2.12
 * Text Domain: PDF Importer WPForm
 * Domain Path: /languages/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
 * Slug: page-builder-for-wpform
 */

use rnpagebuilder\core\Integration\Adapters\WPForm\Loader\WPFormSubLoader;

require_once dirname(__FILE__).'/AutoLoad.php';
require_once dirname(__FILE__).'/core/api/Api.php';
new WPFormSubLoader('rnpagebuilder','rednaopdfimpwpform',42,2,__FILE__,
    array(
        'ItemId'=>16,
        'Author'=>'Edgar Rojas',
        'UpdateURL'=>'https://pagebuilder.rednao.com',
        'FileGroup'=>'PageBuilderForWPForms'
    ));


