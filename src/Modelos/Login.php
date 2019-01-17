<?php
namespace Modelos;
/**
 * [Login description]
 */
class Login
{
    private $error = [];
    /**
     * [__construct description]
     */
    function __construct()
    {
        if (!isset($_SESSION)) session_start();
    }
  	/**
  	 * esta funcion sirve para el logeo ingresando usuario y contraseña y
     * usando para autenticar la cuenta imap del servidor de correo.
  	 * @param  string $usuario  [description]
  	 * @param  string $password [description]
  	 * @return [type]           [description]
  	 */
  	public function ingreso_imap( $usuario = "", $password = "")
  	{
        if( !defined('AUTENTICAR') ) define('AUTENTICAR', true);
        $ARCHIVO_LOG = PATH_ROOT."/_error_logs/log_login.html";
        // compruebo si email ingresado pertenece a personal de CIFASIS
        $qpersona = new Persona();
        if( $personal = $qpersona->buscar_por_email( $usuario ) )
        {
            $persona = $personal->get_Persona();
            if( !AUTENTICAR )
            {
                $_SESSION['login']['user_name'] = $persona['titulo_nombre_apellido'];
                $_SESSION['login']['user_email'] = $persona['mail_institucional'];
                $_SESSION['login']['user_login_session'] = true;
                $_SESSION['login']['user_active'] = $persona['activo'];
                $_SESSION['login']['id_persona'] = $persona['id_persona'];
                $_SESSION['login']['id_foto'] = $persona['id_foto'];
                $_SESSION['login']['id_grupo'] = $persona['id_grupo'];
                $_SESSION['login']['imap'] = true;
                return true;
            }else
            {
                if( $mbox = @imap_open( AUTHHOST, $usuario, $password ) )
                {
                    $_SESSION['login']['user_name'] = $persona['titulo_nombre_apellido'];
                    $_SESSION['login']['user_email'] = $persona['mail_institucional'];
                    $_SESSION['login']['user_login_session'] = true;
                    $_SESSION['login']['user_active'] = $persona['activo'];
                    $_SESSION['login']['id_persona'] = $persona['id_persona'];
                    $_SESSION['login']['id_foto'] = $persona['id_foto'];
                    $_SESSION['login']['id_grupo'] = $persona['id_grupo'];
                    $_SESSION['login']['imap'] = true;
                    //$_SESSION['token'] =
                    return true;
                }else
                {
                    $this->error[] = "Error 2 en el login";
                }
            }
        }else
        {
  			// guardo intentos fallidos de login
  			//writeLog($ARCHIVO_LOG,"ERROR Login",$usuario);
  			//$this->error="ERROR! El mail no pertenece a un miembro del CIFASIS";
  			//return false;
            $this->error[] = "Error en el login";
            //exit;
        }
        return false;
  	}
    /**
     * Gets login session, true or false.
     */
    public function get_LoginSession()
    {
        if( isset($_SESSION['login']['user_login_session']) )
        {
            if( $_SESSION['login']['user_login_session'] ) return true;
        }
        return false;
    }
    /**
     *
     * @param unknown $persona
     */
    public function set_UserSession(Persona $persona)
    {
      	//if ( is_session_started() === FALSE ) session_start();
      	$_SESSION['login']['user_name'] = $persona->get_NombreApellido();
      	$_SESSION['login']['user_email'] = $persona->get_MailInstitucional();
      	$_SESSION['login']['user_active'] = $persona->get_Activo();
      	$_SESSION['login']['user_login_session'] = true;
      	$_SESSION['login']['id_persona'] = $persona->get_IdPersona();
      	$_SESSION['login']['id_foto'] = $persona->get_IdFoto();
      	$_SESSION['login']['id_grupo'] = $persona->get_IdGrupo();
    }
    /**
     * When called, it destroys login session.
     *
     * Logout method
     */
    public function unset_LoginSession()
    {
        if( $this->get_LoginSession() )
        {
            // si esta iniciada la sesion la borro
            unset($_SESSION['login']);
            session_unset();
            session_destroy();
        }
    }
  	/**
  	 * entrega el id del usuario
  	 * @return id_persona|boolean
  	 */
    public function get_UserIdPersonal()
    {
		if( isset($_SESSION['login']['user_login_session']) )
		{
            if( $_SESSION['login']['user_login_session'] ) return $_SESSION['login']['id_persona'];
		}
		return false;
    }
    /**
     *
     * @return id_grupo|boolean
     */
    public function get_UserIdGrupo()
    {
      	if( isset($_SESSION['login']['user_login_session']) )
      	{
      		if( $_SESSION['login']['user_login_session'] ) return $_SESSION['login']['id_grupo'];
      	}
      	return false;
    }
	/**
	 *
	 * @return id_foto|boolean
	 */
    public function get_UserIdFoto()
    {
      	if( isset($_SESSION['login']['user_login_session']) )
      	{
            if( $_SESSION['login']['user_login_session'] ) return $_SESSION['login']['id_foto'];
      	}
      	return false;
    }
    /**
     * entrega el nombre de usuario
     */
    public function get_UserName()
    {
        if( isset($_SESSION['login']['user_login_session']) )
        {
            if( $_SESSION['login']['user_login_session'] ) return utf8_encode($_SESSION['login']['user_name']);
        }
        return false;
    }
  	/**
  	 * entrega el email del usuario logeado
  	 * @return unknown|boolean
  	 */
  	public function get_UserEmail()
  	{
		if( isset($_SESSION['login']['user_login_session']) )
		{
            if( $_SESSION['login']['user_login_session'] ) return $_SESSION['login']['user_email'];
		}
		return false;
  	}
    /**
     * Gets the user activation status if login session is true.
     */
    public function get_UserActive()
    {
        if( $this->get_LoginSession() )
        {
            if( $_SESSION['login']['user_active'] ) return true;
            else return false;
        }
    }
    /**
     *
     * @param unknown $email
     * @return boolean|number
     */
    private function verificar_email($email="")
    {
        if( empty($email) ) return false;
      	$query="
      			SELECT 	COUNT(*) AS cantidad
      			FROM 	`".SESSION_NAME."ed_usuarios`
      			WHERE 	`user_mail`='".$email."'";
      	if( !sql_select($query, $consulta) ) return false;
        $registro = $consulta->fetch(\PDO::FETCH_ASSOC);
        return $registro['cantidad'];
    }
    /**
     * [get_Error description]
     * @return [type] [description]
     */
    public function get_Error()
    {
        return $this->error;
    }
}
?>
