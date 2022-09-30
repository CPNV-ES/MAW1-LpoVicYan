<?php
/**
 * Title: db
 * Author: Luís Pedro Pinheiro
 * Version: 1.0 from 29 Septembre 2022
 */
class db
{

    protected $connection;
    protected $query;
    protected $show_errors  = true;
    protected $query_closed = true;
    public $query_count     = 0;

    protected $db_name;

    public function __construct( $dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = '', $charset = 'utf8' )
    {
        $this->connection = new mysqli( $dbhost, $dbuser, $dbpass, $dbname );
        $this->db_name    = $dbname;

        if ( $this->connection->connect_error )
        {
            $this->error( 'Failed to connect to MySQL - ' . $this->connection->connect_error );
        }

        $this->connection->set_charset( $charset );
    }

    public function query( $query )
    {
        print_r( $query );

        if ( !$this->query_closed )
        {
            $this->query->close();
        }

        if ( $this->query = $this->connection->prepare( $query ) )
        {

            if ( func_num_args() > 1 )
            {
                $x        = func_get_args();
                $args     = array_slice( $x, 1 );
                $types    = '';
                $args_ref = array();

                foreach ( $args as $k => &$arg )
                {

                    if ( is_array( $args[$k] ) )
                    {

                        foreach ( $args[$k] as $j => &$a )
                        {
                            $types .= $this->_gettype( $args[$k][$j] );
                            $args_ref[] = &$a;
                        }

                    }
                    else
                    {
                        $types .= $this->_gettype( $args[$k] );
                        $args_ref[] = &$arg;
                    }

                }

                array_unshift( $args_ref, $types );
                call_user_func_array( array( $this->query, 'bind_param' ), $args_ref );
            }

            $this->query->execute();

            if ( $this->query->errno )
            {
                $this->error( 'Unable to process MySQL query (check your params) - ' . $this->query->error );
            }

            $this->query_closed = false;
            $this->query_count++;
        }
        else
        {
            $this->error( 'Unable to prepare MySQL statement (check your syntax) - ' . $this->connection->error );
        }

        return $this;
    }

    public function fetchAll( $callback = null )
    {
        $params = array();
        $row    = array();
        $meta   = $this->query->result_metadata();

        while ( $field = $meta->fetch_field() )
        {
            $params[] = &$row[$field->name];
        }

        call_user_func_array( array( $this->query, 'bind_result' ), $params );
        $result = array();

        while ( $this->query->fetch() )
        {
            $r = array();

            foreach ( $row as $key => $val )
            {
                $r[$key] = $val;
            }

            if ( $callback != null && is_callable( $callback ) )
            {
                $value = call_user_func( $callback, $r );

                if ( $value == 'break' )
                {
                    break;
                }

            }
            else
            {
                $result[] = $r;
            }

        }

        $this->query->close();
        $this->query_closed = true;
        return $result;
    }

    public function fetchArray()
    {
        $params = array();
        $row    = array();
        $meta   = $this->query->result_metadata();

        while ( $field = $meta->fetch_field() )
        {
            $params[] = &$row[$field->name];
        }

        call_user_func_array( array( $this->query, 'bind_result' ), $params );
        $result = array();

        while ( $this->query->fetch() )
        {

            foreach ( $row as $key => $val )
            {
                $result[$key] = $val;
            }

        }

        $this->query->close();
        $this->query_closed = true;
        return $result;
    }

    public function close()
    {
        return $this->connection->close();
    }

    public function numRows()
    {
        $this->query->store_result();
        return $this->query->num_rows;
    }

    public function affectedRows()
    {
        return $this->query->affected_rows;
    }

    public function lastInsertID()
    {
        return $this->connection->insert_id;
    }

    public function error( $error )
    {

        if ( $this->show_errors )
        {
            exit( $error );
        }

    }

    private function _gettype( $var )
    {

        if ( is_string( $var ) )
        {
            return 's';
        }

        if ( is_float( $var ) )
        {
            return 'd';
        }

        if ( is_int( $var ) )
        {
            return 'i';
        }

        return 'b';
    }

    public function insert( $table, $data )
    {

        if ( empty( $table ) && empty( $data ) )
        {
            $this->error( 'Required Database name and value' );
        }
        else
        {

            if ( !is_array( $data ) )
            {
                $this->error( 'name and values must be array ' );
            }
            else
            {
                $names      = null;
                $value_ques = null;
                $values     = array();
                $position   = 1;

                foreach ( $data as $name => $value )
                {
                    $values[$position] = $value;
                    $names .= ( sizeof( $data ) == $position ) ? "`{$name}` " : "`{$name}`, ";
                    $value_ques .= ( sizeof( $data ) == $position ) ? "? " : "?, ";
                    $position = $position + 1;
                }

                $params = array_merge( array( "INSERT INTO `{$this->db_name}`.`{$table}` ( {$names} ) VALUES( {$value_ques} );" ), $values );
                return call_user_func_array( array( $this, "query" ), $params );
            }

        }

    }

    public function update( string $tbl, array $data, string $cond )
    {

        if ( !is_array( $data ) || empty( $tbl ) || empty( $cond ) || empty( $data ) )
        {
            $this->error( "errno: 429 data corrupted" );
        }

        $sql     = null;
        $postion = 0;
        $values  = array();

        foreach ( $data as $colom => $row )
        {
            $postion = $postion + 1;
            $sql .= ( $postion == count( $data ) ) ? " `{$tbl}`.`{$colom}` = ? " : "`{$tbl}`.`{$colom}` = ?, ";
            $values[] = $row;
        }

        $con_values = array();
        $p2         = 0;

        foreach ( func_get_args() as $v )
        {

            if ( $p2 > 2 )
            {
                $con_values[] = $v;
            }

            $p2 = $p2 + 1;
        }

        $params = array_merge( array( "UPDATE `{$tbl}` SET {$sql}{$cond}" ), array_merge( $values, $con_values ) );
        return call_user_func_array( array( $this, "query" ), $params );
    }

    public function delete( $table, $data )
    {

        if ( empty( $data ) )
        {
            $this->error( "ERROR DELETE RECORD FROM DATABASE WHICH ONE DELETE ?" );
        }
        else
        {
            $this->query( "DELETE FROM `{$this->db_name}`.`{$table}` WHERE `{$data['name']}` = ?;", $data['value'] );
// check is deleted or not
            $data = $this->query( "SELECT * FROM `{$this->db_name}`.`{$table}` WHERE `{$data['name']}` = ?;", $data['value'] )->fetchAll();
            return empty( $data ) ? true : false;
        }

    }

}
