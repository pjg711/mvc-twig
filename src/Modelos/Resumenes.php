<?php
namespace MVCWeb\Modelos;

use MVCWeb\Modelos\Resumen;
/**
 * [Resumenes description]
 */
class Resumenes
{
    private $idioma = "";

    private $error = "";
    private $resumenes = [];

    private $id_persona = "";
    private $id_grupo = "";
    private $id_resumen = "";
    private $componente = "";
    private $area = "";
    private $cantidad = 0;
    private $contiene = false;

    private $query_generada = "";
    /**
     * [get_Error description]
     * @return [type] [description]
     */
    public function get_Error()
    {
        return $this->error;
    }
    /**
     * [get_Resumenes description]
     * @return [type] [description]
     */
    public function get_Resumenes()
    {
        return $this->resumenes;
    }
    /**
     * [get_Cantidad description]
     * @return [type] [description]
     */
    public function get_Cantidad()
    {
        return $this->cantidad;
    }
    /**
     * [get_Contiene description]
     * @return [type] [description]
     */
    public function get_Contiene()
    {
        return $this->contiene;
    }
    /**
     * [get_Query description]
     * @return [type] [description]
     */
    public function get_Query()
    {
        return $this->query_generada;
    }
    /**
     * [__construct description]
     * @param string  $idioma       [description]
     * @param string  $id_persona   [description]
     * @param string  $id_grupo     [description]
     * @param string  $id_resumen   [description]
     * @param string  $componente   [description]
     * @param string  $area         [description]
     * @param string  $campo        [description]
     * @param string  $valor        [description]
     * @param string  $orden        [description]
     * @param string  $limite       [description]
     * @param boolean $solo_activos [description]
     */
    function __construct(
        $idioma = "",
        $id_resumen = "",
        $id_persona = "",
        $id_grupo = "",
        $componente = "",
        $area = "",
        $campo = "",
        $valor = "",
        $orden = "",
        $limite = "",
        $buscar_aproximado = false,
        $solo_activos = true,
        $agrupar = false,
        $campos_aproximados = "" )
    {
        //echo "__construct componente--->{$componente}<br>";
        $this->idioma =  ( $idioma == "" ) ? trim( strtolower( IDIOMA_POR_DEFECTO ) ) : trim( strtolower( $idioma ) );
        $this->id_resumen = $id_resumen;
        $this->id_persona = $id_persona;
        $this->id_grupo = $id_grupo;
        $this->componente = $componente;
        $this->area = $area;
        $this->contiene = false;
        //
        if( $agrupar )
        {
            $query = "SELECT JSON_EXTRACT(`resumen_es`, '$.{$campo}') AS {$campo}, COUNT(*) AS num_count FROM `".SESSION_NAME."resumenes` WHERE `area`='{$area}' AND `componente`='{$componente}' GROUP BY {$campo}";
            $this->query_generada = $query;
            if( sql_select( $query, $consulta ) )
            {
                $this->cantidad = $consulta->rowCount();
                if( $this->cantidad > 0 ) $this->contiene = true;
                while( $row = $consulta->fetch(\PDO::FETCH_ASSOC) )
                {
                    $this->resumenes[] = $row[$campo];
                }
                return true;
            }
        }else
        {
            //echo "componente en __construct---->{$componente}<br>";
            //var_dump( $valor );
            $query = $this->genero_sql( $componente, $campo, $valor, $orden, $limite, $buscar_aproximado, $campos_aproximados, $solo_activos );
            $this->query_generada = $query;
            if( sql_select( $query, $consulta ) )
            {
                $this->cantidad = $consulta->rowCount();
                if( $this->cantidad > 0 ) $this->contiene = true;
                while( $row = $consulta->fetch(\PDO::FETCH_OBJ) )
                {
                    $this->resumenes[] = new Resumen( $row );
                }
                return true;
            }
        }
        return false;
    }
    /**
     * [genero_sql description]
     * @param  string  $campo             [description]
     * @param  string  $valor             [description]
     * @param  string  $orden             [description]
     * @param  string  $limite            [description]
     * @param  boolean $buscar_aproximado [description]
     * @param  boolean $solo_activos      [description]
     * @param  boolean $agrupar           [description]
     * @return [type]                     [description]
     */
    private function genero_sql(
        $componente = "",
        $campo = "",
        $valor = "",
        $orden = "",
        $limite = "",
        $buscar_aproximado = false,
        $campos_aproximados = "",   // string con los campos a buscar
        $solo_activos = true )
    {
        $cadena_select = [];
        $nueva_cadena_select = "";
        $cadena_select[] = "resumenes.`id_resumen` AS `id_resumen`";
        $cadena_select[] = "resumenes.`id_persona` AS `id_persona`";
        $cadena_select[] = "resumenes.`id_grupo` AS `id_grupo`, resumenes.`activo` AS `activo`";
        $cadena_select[] = "resumenes.`area` AS `area`, resumenes.`componente` AS `componente`";
        $cadena_select[] = "`resumen_{$this->idioma}` AS `resumen`";
        $cadena_select[] = "personal.`nombre` AS `nombre`, personal.`apellido` AS `apellido`";
        if( $campo != "" AND $campos_aproximados == "" )
        {
            $cadena_select[] = "JSON_EXTRACT(resumen_{$this->idioma}, '$.{$campo}') AS {$campo}";
        }
        if( $campo != "" AND is_array( $campos_aproximados ) )
        {
            foreach( $campos_aproximados as $tqcampo )
            {
                if( $tqcampo != "" )
                {
                    $cadena_select[] = "JSON_EXTRACT(resumen_{$this->idioma}, '$.{$tqcampo}') AS {$tqcampo}";
                }
            }
        }
        if( $orden == ORDENAR_POR_FECHAALTA_ASC OR ORDENAR_POR_FECHAALTA_DESC )
        {
            $cadena_select[] = "JSON_EXTRACT(resumen_{$this->idioma}, '$.fecha_alta') AS fecha_alta";
        }
        if( $orden == ORDENAR_POR_ORDEN_ASC OR $orden == ORDENAR_POR_ORDEN_DESC )
        {
            $cadena_select[] = "JSON_EXTRACT(resumen_{$this->idioma}, '$.orden') AS orden";
        }
        if( $orden == ORDENAR_POR_APELLIDO_ASC OR $orden == ORDENAR_POR_APELLIDO_DESC )
        {
            $cadena_select[] = "JSON_EXTRACT(resumen_{$this->idioma}, '$.apellido') AS apellido";
        }
        $nueva_cadena_select = implode(" , ", $cadena_select);
        //
        $cadena_from = [];
        $nueva_cadena_from = "";
        $cadena_from[] = "`".SESSION_NAME."resumenes` resumenes";
        $cadena_from[] = "`".SESSION_NAME."personal` personal";
        $nueva_cadena_from = implode(" , ", $cadena_from);
        //
        $cadena_where = [];
        $cadena_where2 = [];
        $cadena_where3 = [];
        $nueva_cadena_where = "";
        $nueva_cadena_where2 = "";
        $nueva_cadena_where3 = "";
        $cadena_where[] = "resumenes.`id_persona`=personal.`id_persona`";
        if( $solo_activos )
        {
            $cadena_where[] = "resumenes.`activo`=1";
        }
        if( $campo != "" )
        {
            if( $valor == "" )
            {
            }else
            {
                if( is_array( $valor ) )
                {
                    if( $buscar_aproximado )
                    {
                        // buscar aproximados
                        if( $componente != "" )
                        {
                            $cadena_where[] = "resumenes.`componente`='{$componente}'";
                        }
                        // buscar_aproximado para la busqueda usando LIKE
                        if( is_array( $campos_aproximados ) )
                        {
                            foreach( $campos_aproximados as $key_campo => $tqcampo )
                            {
                                if( $tqcampo != "" and is_string( $valor ) )
                                {
                                    $cadena_where2[] = "JSON_EXTRACT(resumenes.`resumen_{$this->idioma}`, '$.{$tqcampo}') LIKE '%{$valor}%'";
                                }elseif( is_array( $valor ) )
                                {
                                    $cadena_where3a = [];
                                    foreach( $valor as $valor1 )
                                    {
                                        $cadena_where3a[] = "JSON_EXTRACT(resumenes.`resumen_{$this->idioma}`, '$.{$tqcampo}') LIKE '%{$valor1}%'";
                                    }
                                    $cadena_where3[] = "(".implode(" AND ", $cadena_where3a).")";
                                }
                            }
                        }
                    }else
                    {
                        // no buscar aproximados
                        $cadena_where[] = "JSON_EXTRACT(resumenes.`resumen_{$this->idioma}`, '$.{$campo}') LIKE '%{$valor}%'";
                    }
                }
                if( is_string( $valor ) OR is_numeric( $valor ) )
                {
                    $cadena_where[] = "JSON_EXTRACT(resumenes.`resumen_{$this->idioma}`, '$.{$campo}') = '{$valor}'";
                }
            }
        }
        if( $this->id_resumen != "" ) $cadena_where[] = "resumenes.`id_resumen`={$this->id_resumen}";
        if( $this->id_persona != "" ) $cadena_where[] = "resumenes.`id_persona`={$this->id_persona}";
        if( $this->id_grupo != "" ) $cadena_where[] = "resumenes.`id_grupo`={$this->id_grupo}";
        if( $this->componente != "" AND $campos_aproximados == "" ) $cadena_where[] = "resumenes.`componente`='{$this->componente}'";
        if( $this->area != "" ) $cadena_where[] = "resumenes.`area`='{$this->area}'";
        if( count( $cadena_where ) > 0 )
        {
            $nueva_cadena_where = implode(" AND ", $cadena_where);
        }
        if( count( $cadena_where2 ) > 0 )
        {
            $nueva_cadena_where2 = implode(" OR ", $cadena_where2);
        }
        if( count( $cadena_where3 ) > 0 )
        {
            //$nueva_cadena_where3 = implode(" AND ", $cadena_where3);
            $nueva_cadena_where3 = implode(" OR ", $cadena_where3);
        }
        //
        $cadena_order = [];
        $nueva_cadena_order = "";
        if( $orden == ORDENAR_POR_ID )
        {
            $cadena_order[] = "resumenes.`id_resumen` DESC";
        }elseif( $orden == ORDENAR_POR_ORDER )
        {
            $cadena_order[] = "resumenes.`orden` ASC";
        }elseif( $orden == ORDENAR_POR_FECHAALTA_ASC )
        {
            $cadena_order[] = "fecha_alta ASC";
        }elseif( $orden == ORDENAR_POR_FECHAALTA_DESC )
        {
            $cadena_order[] = "fecha_alta DESC";
        }elseif( $orden == ORDENAR_POR_ORDEN_ASC )
        {
            $cadena_order[] = "orden ASC";
        }elseif( $orden == ORDENAR_POR_ORDEN_DESC )
        {
            $cadena_order[] = "orden DESC";
        }elseif( $orden == ORDENAR_POR_APELLIDO_ASC )
        {
            $cadena_order[] = "apellido ASC";
        }elseif( $orden == ORDENAR_POR_APELLIDO_DESC )
        {
            $cadena_order[] = "apellido DESC";
        }else
        {
            $cadena_order[] = $orden;
        }
        $nueva_cadena_order = implode(" AND ", $cadena_order);
        //
        $query = "  SELECT {$nueva_cadena_select}";
        $query .= " FROM {$nueva_cadena_from}";
        $query .= " WHERE {$nueva_cadena_where}";
        if( $nueva_cadena_where2 != "" ) $query .= " AND ({$nueva_cadena_where2})";
        if( $nueva_cadena_where3 != "" ) $query .= " AND ({$nueva_cadena_where3})";
        if( $nueva_cadena_order != "" ) $query .= " ORDER BY {$nueva_cadena_order}";
        if( $limite != "" ) $query .= " LIMIT {$limite}";
        return $query;
    }
}
/**
 * [Componentes description]
 */
class Componentes
{
    private $componentes = [];
    /**
     * [get_Componentes description]
     * @return [type] [description]
     */
    public function get_Componentes()
    {
        return $this->componentes;
    }
    /**
     * [__construct description]
     */
    function __construct()
    {
        $query = "SELECT `componente` FROM `".SESSION_NAME."resumenes` GROUP BY `componente`";
        if( !sql_select( $query, $consulta ) ) return false;
        while( $row = $consulta->fetch(\PDO::FETCH_ASSOC) )
        {
            $this->componentes[] = $row['componente'];
        }
    }
}
/**
 * [Areas description]
 */
class Areas
{
    private $areas = [];

    public function get_Areas()
    {
        return $this->areas;
    }

    function __construct()
    {
        $query = "SELECT `area` FROM `".SESSION_NAME."resumenes` GROUP BY `area`";
        if( !sql_select($query, $consulta) ) return false;
        while($row = $consulta->fetch(\PDO::FETCH_ASSOC) )
        {
            $this->areas[] = $row['area'];
        }
    }
}
?>
