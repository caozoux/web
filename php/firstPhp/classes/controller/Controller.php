<?php

abstract class ControllerCore
{
    /**
     * Initialize the page
     */
    public function init()
    {
	}

    /**
     * Do the page treatment: process input, process AJAX, etc.
     */
    abstract public function postProcess();

    /**
     * Displays page view
     */
    abstract public function display();

    /**
     * Sets default media list for this controller
     */
    abstract public function setMedia();
    /**
     * returns a new instance of this controller
     *
     * @param string $class_name
     * @param bool $auth
     * @param bool $ssl
     * @return Controller
     */
    public static function getController($class_name, $auth = false, $ssl = false)
    {
        return new $class_name($auth, $ssl);
    }
    public function __construct()
    {
	}
    /**
     * Starts the controller process (this method should not be overridden!)
     */
    public function run()
    {
    }
    /**
     * Sets page header display
     *
     * @param bool $display
     */
    public function displayHeader($display = true)
    {
    }
    /**
     * Sets page header javascript display
     *
     * @param bool $display
     */
    public function displayHeaderJavaScript($display = true)
    {
    }
    /**
     * Sets page header display
     *
     * @param bool $display
     */
    public function displayFooter($display = true)
    {
    }
    /**
     * Sets template file for page content output
     *
     * @param string $template
     */
    public function setTemplate($template)
    {
    }
    /**
     * Assigns Smarty variables for the page header
     */
    abstract public function initHeader();

    /**
     * Assigns Smarty variables for the page main content
     */
    abstract public function initContent();

    /**
     * Assigns Smarty variables when access is forbidden
     */
    abstract public function initCursedPage();

    /**
     * Assigns Smarty variables for the page footer
     */
    abstract public function initFooter();

    /**
     * Redirects to $this->redirect_after after the process if there is no error
     */
    abstract protected function redirect();

    /**
     * Set $this->redirect_after that will be used by redirect() after the process
     */
    public function setRedirectAfter($url)
    {
	}

    /**
     * Adds a new stylesheet(s) to the page header.
     *
     * @param string|array $css_uri Path to CSS file, or list of css files like this : array(array(uri => media_type), ...)
     * @param string $css_media_type
     * @param int|null $offset
     * @param bool $check_path
     * @return true
     */
    public function addCSS($css_uri, $css_media_type = 'all', $offset = null, $check_path = true)
    {
    }

    /**
     * Removes CSS stylesheet(s) from the queued stylesheet list
     *
     * @param string|array $css_uri Path to CSS file or an array like: array(array(uri => media_type), ...)
     * @param string $css_media_type
     * @param bool $check_path
     */
    public function removeCSS($css_uri, $css_media_type = 'all', $check_path = true)
    {
    }
    /**
     * Adds a new JavaScript file(s) to the page header.
     *
     * @param string|array $js_uri Path to JS file or an array like: array(uri, ...)
     * @param bool $check_path
     * @return void
     */
    public function addJS($js_uri, $check_path = true)
    {
	}
    /**
     * Removes JS file(s) from the queued JS file list
     *
     * @param string|array $js_uri Path to JS file or an array like: array(uri, ...)
     * @param bool $check_path
     */
    public function removeJS($js_uri, $check_path = true)
    {
	}
    /**
     * Adds jQuery library file to queued JS file list
     *
     * @param string|null $version jQuery library version
     * @param string|null $folder jQuery file folder
     * @param bool $minifier If set tot true, a minified version will be included.
     */
    public function addJquery($version = null, $folder = null, $minifier = true)
    {
    }
    /**
     * Adds jQuery UI component(s) to queued JS file list
     *
     * @param string|array $component
     * @param string $theme
     * @param bool $check_dependencies
     */
    public function addJqueryUI($component, $theme = 'base', $check_dependencies = true)
    {
    }

    /**
     * Adds jQuery plugin(s) to queued JS file list
     *
     * @param string|array $name
     * @param string null $folder
     * @param bool $css
     */
    public function addJqueryPlugin($name, $folder = null, $css = true)
    {
    }

    /**
     * Checks if the controller has been called from XmlHttpRequest (AJAX)
     *
     * @since 1.5
     * @return bool
     */
    public function isXmlHttpRequest()
    {
    }


    /**
     * Renders controller templates and generates page content
     *
     * @param array|string $content Template file(s) to be rendered
     * @throws Exception
     * @throws SmartyException
     */
    protected function smartyOutputContent($content)
    {
    }

    /**
     * Checks if a template is cached
     *
     * @param string $template
     * @param string|null $cache_id Cache item ID
     * @param string|null $compile_id
     * @return bool
     */
    protected function isCached($template, $cache_id = null, $compile_id = null)
    {
    }

    /**
     * Custom error handler
     *
     * @param string $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @return bool
     */
    public static function myErrorHandler($errno, $errstr, $errfile, $errline)
    {
    }

    /**
     * Dies and echoes output value
     *
     * @param string|null $value
     * @param string|null $controller
     * @param string|null $method
     */
    protected function ajaxDie($value = null, $controller = null, $method = null)
    {
    }
}
