/**
 * @since 1.5.0
 */
class DispatcherCore
{
    /**
     * List of available front controllers types
     */
    const FC_FRONT = 1;
    const FC_ADMIN = 2;
    const FC_MODULE = 3;

    /**
     * @var Dispatcher
     */
    public static $instance = null;
    /**
     * Need to be instancied from getInstance() method
     */
    protected function __construct()
    {
	}
    public function useDefaultController()
    {
	}
    public function dispatch()
    {
	}
    /**
     * Set request uri and iso lang
     */
    protected function setRequestUri()
    {
	}
    /**
     * Load default routes group by languages
     */
    protected function loadRoutes($id_shop = null)
    {
	}
    /**
     *
     * @param string $route_id Name of the route (need to be uniq, a second route with same name will override the first)
     * @param string $rule Url rule
     * @param string $controller Controller to call if request uri match the rule
     * @param int $id_lang
     * @param int $id_shop
     */
    public function addRoute($route_id, $rule, $controller, $id_lang = null, array $keywords = array(), array $params = array(), $id_shop = null)
    {
	}
    /**
     * Check if a route exists
     *
     * @param string $route_id
     * @param int $id_lang
     * @param int $id_shop
     * @return bool
     */
    public function hasRoute($route_id, $id_lang = null, $id_shop = null)
    {
	}
    /**
     * Check if a keyword is written in a route rule
     *
     * @param string $route_id
     * @param int $id_lang
     * @param string $keyword
     * @param int $id_shop
     * @return bool
     */
    public function hasKeyword($route_id, $id_lang, $keyword, $id_shop = null)
    {
	}
    /**
     * Check if a route rule contain all required keywords of default route definition
     *
     * @param string $route_id
     * @param string $rule Rule to verify
     * @param array $errors List of missing keywords
     */
    public function validateRoute($route_id, $rule, &$errors = array())
    {
	}
    /**
     * Create an url from
     *
     * @param string $route_id Name the route
     * @param int $id_lang
     * @param array $params
     * @param bool $use_routes If false, don't use to create this url
     * @param string $anchor Optional anchor to add at the end of this url
     */
    public function createUrl($route_id, $id_lang = null, array $params = array(), $force_routes = false, $anchor = '', $id_shop = null)
    {
	}
    /**
     * Retrieve the controller from url or request uri if routes are activated
     *
     * @return string
     */
    public function getController($id_shop = null)
    {
	}
    /**
     * Get list of all available FO controllers
     *
     * @var mixed $dirs
     * @return array
     */
    public static function getControllers($dirs)
    {
	}
    /**
     * Get list of available controllers from the specified dir
     *
     * @param string $dir Directory to scan (recursively)
     * @return array
     */
    public static function getControllersInDirectory($dir)
    {
	}
}
