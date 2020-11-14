<?php
// APP__CORE_CLASS
// creates url && loads controller
// url format:: /controller/method/params
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            // print_r($this->getUrl());
            $url = $this->getUrl();
            // look in controllers for controller--first-value
            // *as if in index.php since this Core class is directed to index.php
            if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // checks to see Posts.php if it exists and sets as currentController
                $this->currentController = ucwords($url[0]);
                // unset the 0 index
                unset($url[0]);
            }
            // require controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            // instantiate controller
            $this->currentController = new $this->currentController;
            // check for second part of the url
            if (isset($url[1])) {
                // check to see if method exists in controller
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    // unset 1 index
                    unset($url[1]);
                }
            }
            // get params
            $this->params = $url ? array_values($url) : [];
            // call a cb with [params]
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl() {
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                // sanitize as a url with 'filter_var'
                // so it dosen't hae chars that the url should !have
                $url = filter_var($url, FILTER_SANITIZE_URL); 
                $url = explode('/', $url);
                return $url;
            }
        }
    }
?>