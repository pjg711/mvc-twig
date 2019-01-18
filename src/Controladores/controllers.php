<?php
namespace MVCWeb\Controladores;

class Controladores
{
    public $idioma = "";
    public $plantilla;
    public $params = [];
	public $error = [];
    /**
     * [__construct description]
     */
    function __construct()
    {
        global $twig;
        $_SESSION['idioma'] = (!isset($_SESSION['idioma'])) ? trim(strtolower(IDIOMA_POR_DEFECTO)) : trim(strtolower($_SESSION['idioma']));
        if( isset($_SERVER['REQUEST_URI']) )
        {
            $_SESSION['path_now'] = $_SERVER['REQUEST_URI'];
        }
        include_once 'twig.php';
        include_once 'load.php';
        $this->params = $params;
    }
    /**
     * [login description]
     * @return [type] [description]
     */
    public function login()
    {
        $this->plantilla = "login.html.twig";
        $this->render();
    }
    /**
     * [logout description]
     * @return [type] [description]
     */
    public function logout()
    {
        $this->plantilla = "logout.html.twig";
        $this->render();
    }
    /**
     * [render description]
     * @return [type] [description]
     */
    public function render()
    {
        global $twig;
        $template = $twig->loadTemplate($this->plantilla);
        echo $template->render($this->params);
    }
}
?>
