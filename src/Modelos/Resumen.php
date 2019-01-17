<?php
namespace MVCWeb\Modelos;
/**
 * [Resumen description]
 */
class Resumen
{
    private $idioma;
    private $error = "";
    private $id_resumen = 0;
    private $resumen = "";
    private $id_persona = 0;
    private $id_grupo = 0;
    private $activo = 0;
    private $id_idioma = 0;
    private $area = "";
    private $componente = "";
    private $orden = 0;
    private $componente_nuevo = "";
    //
    private $json = [];
    private $es_json = false;
    private $config = "";
    private $nombre = "";
    private $apellido = "";
    private $grupo = "";
    /**
     * [__construct description]
     * @param string  $resumen     [description]
     * @param boolean $activar_log [description]
     */
    function __construct( $resumen = "", $activar_log = false )
    {
        //$this->idioma = ( $idioma == "" ) ? trim( strtolower( IDIOMA_POR_DEFECTO ) ) : $idioma;
        if( $resumen != "" )
        {
            if( isset( $resumen->idioma ) ) $this->idioma = $resumen->idioma;
            if( isset( $resumen->id_resumen ) ) $this->id_resumen = $resumen->id_resumen;
            if( isset( $resumen->id_persona ) ) $this->id_persona = $resumen->id_persona;
            if( isset( $resumen->id_grupo ) ) $this->id_grupo = $resumen->id_grupo;
            if( isset( $resumen->activo ) ) $this->activo = $resumen->activo;
            if( isset( $resumen->id_idioma ) ) $this->id_idioma = $resumen->id_idioma;
            if( isset( $resumen->area ) ) $this->area = $resumen->area;
            if( isset( $resumen->componente ) ) $this->componente = $resumen->componente;
            if( isset( $resumen->orden ) ) $this->orden = $resumen->orden;
            if( isset( $resumen->json ) ) $this->json = $resumen->json;
            if( isset( $resumen->resumen ) )
            {
                $this->resumen = $resumen->resumen;
                // lo convierto en matriz
                $qresumen = json_decode( $resumen->resumen, true );
                if( is_array( $qresumen ) )
                {
                    if( isset( $qresumen[0] ) )
                    {
                        $this->json = $qresumen[0];
                    }else
                    {
                        $this->json = $qresumen;
                    }
                }
                $this->es_json = true;
            }
            if( isset( $resumen->config ) ) $this->config = $resumen->config;
            if( isset( $resumen->nombre ) ) $this->nombre = $resumen->nombre;
            if( isset( $resumen->apellido ) ) $this->apellido = $resumen->apellido;
            if( isset( $resumen->grupo ) ) $this->grupo = $resumen->grupo;
            if( isset( $resumen->componente_nuevo ) ) $this->componente_nuevo = $resumen->componente_nuevo;
            return true;
        }
    }
    /**
     * [get_Id description]
     * @return [type] [description]
     */
    public function get_Id()
    {
        return $this->id_resumen;
    }
    /**
     * [get_IdIdioma description]
     * @return [type] [description]
     */
    public function get_IdIdioma()
    {
        return $this->id_idioma;
    }
    /**
     * [get_Idioma description]
     * @return [type] [description]
     */
    public function get_Idioma()
    {
        return $this->idioma;
    }
    /**
     * [get_IdPersona description]
     * @return [type] [description]
     */
    public function get_IdPersona()
    {
        return $this->id_persona;
    }
    /**
     * [get_IdGrupo description]
     * @return [type] [description]
     */
    public function get_IdGrupo()
    {
        return $this->id_grupo;
    }
    /**
     * [get_Activo description]
     * @return [type] [description]
     */
    public function get_Activo()
    {
        return $this->activo;
    }
    /**
     * [get_Area description]
     * @return [type] [description]
     */
    public function get_Area()
    {
        return $this->area;
    }
    /**
     * [get_Componente description]
     * @return [type] [description]
     */
    public function get_Componente()
    {
        return $this->componente;
    }
    /**
     * [get_Orden description]
     * @return [type] [description]
     */
    public function get_Orden()
    {
        $this->orden = $valor;
    }
    /**
     * [get_Resumen description]
     * @return [type] [description]
     */
    public function get_Resumen()
    {
        return $this->resumen;
    }
    /**
     * [get_Json description]
     * @return [type] [description]
     */
    public function get_Json()
    {
        return $this->json;
    }
    /**
     * [get_EsJson description]
     * @return [type] [description]
     */
    public function get_EsJson()
    {
        return $this->es_json;
    }
    /**
     * [get_Config description]
     * @return [type] [description]
     */
    public function get_Config()
    {
        return $this->config;
    }
    /**
     * [get_Nombre description]
     * @return [type] [description]
     */
    public function get_Nombre()
    {
        return $this->nombre;
    }
    /**
     * [get_Apellido description]
     * @return [type] [description]
     */
    public function get_Apellido()
    {
        return $this->apellido;
    }
    /**
     * [get_Grupo description]
     * @return [type] [description]
     */
    public function get_Grupo()
    {
        return $this->grupo;
    }
    /**
     * [consultar description]
     * @param  string $id_resumen [description]
     * @param  string $id_persona [description]
     * @param  string $id_grupo   [description]
     * @param  string $area       [description]
     * @param  string $componente [description]
     * @return [type]             [description]
     */
    public function consultar( $id_resumen = "", $id_persona = "", $id_grupo = "", $area = "", $componente = "" )
    {
        $query = $this->genero_sql( $id_resumen, $id_persona, $id_grupo, $area, $componente );
        echo "query consultar resumen-->{$query}<br>";
        if( !sql_select($query, $consulta) ) return false;
        if( $row = $consulta->fetch(\PDO::FETCH_ASSOC) )
        {
            //var_dump( $row );
            //echo "<br><br>";
            if( isset( $row['id_resumen'] ) ) $this->id_resumen = $row['id_resumen'];
            if( isset( $row['resumen'] ) ) $this->resumen = $row['resumen'];
            if( isset( $row['id_persona'] ) ) $this->id_persona = $row['id_persona'];
            if( isset( $row['id_grupo'] ) ) $this->id_grupo = $row['id_grupo'];
            if( isset( $row['activo'] ) ) $this->activo = $row['activo'];
            if( isset( $row['area'] ) ) $this->area = $row['area'];
            if( isset( $row['componente'] ) ) $this->componente = $row['componente'];
            if( isset( $row['orden'] ) ) $this->orden = $row['orden'];
            if( isset( $row['nombre'] ) ) $this->nombre = $row['nombre'];
            if( isset( $row['apellido'] ) ) $this->apellido = $row['apellido'];
            if( isset( $row['grupo'] ) ) $this->grupo = $row['grupo'];
            return true;
        }
        return false;
    }
    /**
     * [genero_sql description]
     * @param  string $id_resumen [description]
     * @param  string $id_persona [description]
     * @param  string $id_grupo   [description]
     * @param  string $area       [description]
     * @param  string $componente [description]
     * @return [type]             [description]
     */
    private function genero_sql( $id_resumen = "", $id_persona = "", $id_grupo = "", $area = "", $componente = "" )
    {
        $cadena_select = [];
        $cadena_select[] = "resumenes.`id_resumen` AS `id_resumen`";
        $cadena_select[] = "resumenes.`id_persona` AS `id_persona`";
        $cadena_select[] = "resumenes.`id_grupo` AS `id_grupo`";
        $cadena_select[] = "resumenes.`activo` AS `activo`";
        $cadena_select[] = "resumenes.`area` AS `area`";
        $cadena_select[] = "resumenes.`componente` AS `componente`";
        $cadena_select[] = "`resumen_{$this->idioma}` AS `resumen`";
        $cadena_select[] = "personal.`nombre` AS `nombre`, personal.`apellido` AS `apellido`";
        //$cadena_select[] = "grupos.`grupo_{$this->idioma}` AS `grupo`";
        $cadena_from = [];
        $cadena_from[] = "`".SESSION_NAME."resumenes` resumenes";
        $cadena_from[] = "`".SESSION_NAME."personal` personal";
        //$cadena_from[] = "`".SESSION_NAME."grupos` grupos";
        $cadena_where = [];
        $cadena_where[] = "resumenes.`id_persona`=personal.`id_persona`";
        //$cadena_where[] = "resumenes.`id_grupo`=grupos.`id_grupo`";
        if( $id_resumen != "" ) $cadena_where[] = "`id_resumen`={$id_resumen}";
        if( $id_persona != "" ) $cadena_where[] = "`id_persona`={$id_persona}";
        //if( $id_grupo != "" ) $cadena_where[] = "`id_grupo`={$id_grupo}";
        if( $area != "" ) $cadena_where[] = "`area`='{$area}'";
        if( $componente != "" ) $cadena_where[] = "`componente`='{$componente}'";
        $cadena_order[] = "resumenes.`orden` ASC";
        //$cadena_order[] = "resumenes.`id_resumen` ASC";
        $nueva_cadena_select = implode(" , ", $cadena_select);
        $nueva_cadena_from = implode(" , ", $cadena_from);
        $nueva_cadena_order = implode(" AND ", $cadena_order);
        $query = "SELECT {$nueva_cadena_select} FROM {$nueva_cadena_from}";
        if( $cadena_where != "" )
        {
            $nueva_cadena_where = implode(" AND ", $cadena_where);
            $query .= " WHERE {$nueva_cadena_where}";
        }
        return $query;
    }
    /**
     * [buscar description]
     * @param  string $id_resumen [description]
     * @return [type]             [description]
     */
    /*
    public function buscar( $id_resumen = "" )
    {
        if( $id_resumen == "" ) return false;
        $cadena_select = [];
        $cadena_select[] = "resumenes.`id_resumen` AS `id_resumen`, resumenes.`id_persona` AS `id_persona`";
        $cadena_select[] = "resumenes.`id_grupo` AS `id_grupo`, resumenes.`activo` AS `activo`";
        $cadena_select[] = "resumenes.`area` AS `area`, resumenes.`componente` AS `componente`";
        $cadena_select[] = "`resumen_es` AS `resumen_es`";
        $cadena_select[] = "`resumen_in` AS `resumen_in`";
        $cadena_select[] = "`resumen_fr` AS `resumen_fr`";
        $cadena_select[] = "personal.`nombre` AS `nombre`, personal.`apellido` AS `apellido`";
        //$cadena_select[] = "grupos.`grupo_{$this->idioma}` AS `grupo`";
        $nueva_cadena_select = "";
        $nueva_cadena_select = implode(" , ", $cadena_select);
        //
        $cadena_from = [];
        $cadena_from[] = "`".SESSION_NAME."resumenes` resumenes";
        $cadena_from[] = "`".SESSION_NAME."personal` personal";
        $nueva_cadena_from = "";
        $nueva_cadena_from = implode(" , ", $cadena_from);
        //
        $cadena_where = [];
        $cadena_where[] = "resumenes.`id_persona`=personal.`id_persona`";
        if( $id_resumen != "" ) $cadena_where[] = "resumenes.`id_resumen`={$id_resumen}";
        $nueva_cadena_where = "";
        $nueva_cadena_where = implode(" AND ", $cadena_where);
        //
        $query = "  SELECT {$nueva_cadena_select}";
        $query .= " FROM {$nueva_cadena_from}";
        $query .= " WHERE {$nueva_cadena_where}";
        return $query;
    }
    */
}
?>
