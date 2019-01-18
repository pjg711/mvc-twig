<?php
namespace MVCWeb\Modelos;
/**
 * [Pagina description]
 */
class Pagina
{
	private $folder_css = "";
	private $folder_img = "";
	private $folder_js = "";
	private $folder_template = "";
	//private $folder_view = "";
	//private $folder_style = "";
	//
	private $nombre = "";
	private $plantilla = "";
	private $tipo_plantilla = "";
	private $disenio = "";
	private $version = 0;
	private $titulo = "";
    private $idioma = "";
    private $footer = "";
	private $preloader = false;
	//
	private $slider = [];
	private $posicion_titulo = [];
	private $posicion_texto = [];
	private $menus = [];
	//
	private $logo_principal = "";
	private $imagen_header = "";
	//
	private $nro_novedades_mostrar = 0;
	/**
	 * [get_Nombre description]
	 * @return [type] [description]
	 */
	public function get_Nombre()
	{
		return $this->nombre;
	}
	/**
	 * [get_Version description]
	 * @return [type] [description]
	 */
	public function get_Version()
	{
		return $this->version;
	}
	/**
	 * [get_Plantilla description]
	 * @return [type] [description]
	 */
	public function get_Plantilla()
	{
		return $this->plantilla;
	}
	/**
	 * [set_Plantilla description]
	 * @param [type] $valor [description]
	 */
	public function set_Plantilla( $valor )
	{
		$this->plantilla = $valor;
	}
	/**
	 * [get_TipoPlantilla description]
	 * @return [type] [description]
	 */
	public function get_TipoPlantilla()
	{
		return $this->tipo_plantilla;
	}
	/**
	 * [get_Disenio description]
	 * @return [type] [description]
	 */
	public function get_Disenio()
	{
		return $this->disenio;
	}
	/**
	 * [get_Titulo description]
	 * @return [type] [description]
	 */
	public function get_Titulo()
	{
		return $this->titulo;
	}
	/**
	 * [get_Footer description]
	 * @return [type] [description]
	 */
	public function get_Footer()
	{
		return $this->footer;
	}
	/**
	 * [get_Preloader description]
	 * @return [type] [description]
	 */
	public function get_Preloader()
	{
		return $this->preloader;
	}
	/**
	 * [get_LogoPrincipal description]
	 * @return [type] [description]
	 */
	public function get_LogoPrincipal()
	{
		return $this->logo_principal;
	}
	/**
	 * [get_ImagenHeader description]
	 * @return [type] [description]
	 */
	public function get_ImagenHeader()
	{
		return $this->imagen_header;
	}
	/**
	 * [get_Slider description]
	 * @return [type] [description]
	 */
	public function get_Slider()
	{
		return $this->slider;
	}
	/**
	 * [get_PosicionTitulo description]
	 * @return [type] [description]
	 */
	public function get_PosicionTitulo()
	{
		return $this->posicion_titulo;
	}
	/**
	 * [get_PosicionTexto description]
	 * @return [type] [description]
	 */
	public function get_PosicionTexto()
	{
		return $this->posicion_texto;
	}
	/**
	 * [get_Menus description]
	 * @return [type] [description]
	 */
	public function get_Menus()
	{
		return $this->menus;
	}
	/**
	 * [get_FolderCSS description]
	 * @return [type] [description]
	 */
	public function get_FolderCSS()
	{
		return $this->folder_css;
	}
	/**
	 * [get_FolderJS description]
	 * @return [type] [description]
	 */
	public function get_FolderJS()
	{
		return $this->folder_js;
	}
	/**
	 * [get_FolderIMG description]
	 * @return [type] [description]
	 */
	public function get_FolderIMG()
	{
		return $this->folder_img;
	}
	/**
	 * [get_FolderTemplate description]
	 * @return [type] [description]
	 */
	public function get_FolderTemplate()
	{
		return $this->folder_template;
	}
	/**
	 * [get_NroNovedadesMostrar description]
	 * @return [type] [description]
	 */
	public function get_NroNovedadesMostrar()
	{
		return $this->nro_novedades_mostrar;
	}
    /**
     * [__construct description]
     * @param string $ambito [description]
     * @param string $idioma [description]
     */
    function __construct( $ambito = "", $idioma = "" )
    {
		$this->idioma = strtolower( $idioma );
		$ConfigFile = PATH_ROOT."/".FOLDER_VIEW."/".FOLDER_STYLE."/config.php";
		if( file_exists( $ConfigFile ) )
		{
			unset( $PLANTILLA );
			global $PLANTILLA;
			$PLANTILLA = new \stdClass();
			include $ConfigFile;
			if( isset( $PLANTILLA->version ) ) $this->version = $PLANTILLA->version;
			if( isset( $PLANTILLA->nombre ) ) $this->nombre = $PLANTILLA->nombre;
			if( isset( $PLANTILLA->tipo ) ) $this->tipo_plantilla = $PLANTILLA->tipo;
			if( isset( $PLANTILLA->disenio ) ) $this->disenio = $PLANTILLA->disenio;
			if( isset( $PLANTILLA->menus ) ) $this->menus = $PLANTILLA->menus;
			if( isset( $PLANTILLA->preloader ) ) $this->preloader = $PLANTILLA->preloader;
			//
			if( isset( $PLANTILLA->slider ) ) $this->slider = $PLANTILLA->slider;
			if( isset( $PLANTILLA->nro_novedades_mostrar ) ) $this->nro_novedades_mostrar = $PLANTILLA->nro_novedades_mostrar;
			//
			if( isset( $PLANTILLA->logo_principal ) ) $this->logo_principal = $PLANTILLA->logo_principal;
			if( isset( $PLANTILLA->imagen_header ) ) $this->imagen_header = $PLANTILLA->imagen_header;
			//
			if( isset( $PLANTILLA->css ) ) $this->folder_css = $PLANTILLA->css;
			if( isset( $PLANTILLA->js ) ) $this->folder_js = $PLANTILLA->js;
			if( isset( $PLANTILLA->img ) ) $this->folder_img = $PLANTILLA->img;
			if( isset( $PLANTILLA->template ) ) $this->folder_template = $PLANTILLA->template;
		}
    }
	/**
	 * [listado_archivos description]
	 * @param  [type] $path       [description]
	 * @param  array  $html_array [description]
	 * @return [type]             [description]
	 */
	public function listado_archivos( $path, $html_array = [] )
	{
	    $dh = opendir($path);
	    while ( false !== ($file = readdir($dh)) )
	    {
	        if ($file == '.' || $file == '..') continue;
	        $file = realpath($path . '/' .basename($file));
	        $info = pathinfo($file);
	        if (isset($info['extension']) && $info['extension'] == 'html')
			{
	            $html_array[] = $file;
	        } elseif ( $file!='.' && $file!='..' && is_dir($file))
			{
	            $html_array = $this->listado_archivos($file, $html_array);
	        }
	    }
	    closedir($dh);
	    return $html_array;
	}
}
?>
