<?php

require_once './core/Conexao.php';

class VeiculoModel
 {
    //1 - pesquisar todos

    public function selectAll()
 {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare( 'SELECT * FROM veiculos ORDER BY id' );
            $stmt->execute();

            return $stmt->fetchAll( PDO::FETCH_OBJ );
        } catch ( \PDOException $e ) {
            throw new \Exception( ExceptionPdo::translateError( $e->getMessage() ) );
        } catch ( \PDOException $e ) {
            throw new \Exception( $e->getMessage() );
        }

    }

    //find by ID

    public function selectId( $id )
 {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare( 'SELECT * FROM veiculos WHERE id = ?' );
            $stmt->execute( [ $id ] );
            return $stmt->fetch( PDO::FETCH_OBJ );
        } catch ( \PDOException $e ) {
            throw new \Exception( ExceptionPdo::translateError( $e->getMessage() ) );
        } catch ( \PDOException $e ) {
            throw new \Exception( $e->getMessage() );
        }
    }

    public function selectModelo( $modelo )
 {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare( 'SELECT * FROM veiculos where modelo = ?' );
            $stmt->execute( [ $modelo ] );

            return $stmt->fetchAll( PDO::FETCH_OBJ );
        } catch ( \PDOException $e ) {
            throw new \Exception( ExceptionPdo::translateError( $e->getMessage() ) );
        } catch ( \PDOException $e ) {
            throw new \Exception( $e->getMessage() );
        }

    }

    public function selectMarca( $marca )
 {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare( 'SELECT * FROM veiculos where marca = ?' );
            $stmt->execute( [ $marca ] );

            return $stmt->fetchAll( PDO::FETCH_OBJ );
        } catch ( \PDOException $e ) {
            throw new \Exception( ExceptionPdo::translateError( $e->getMessage() ) );
        } catch ( \PDOException $e ) {
            throw new \Exception( $e->getMessage() );
        }

    }

    public function selectPlaca( $placa )
 {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare( 'SELECT * FROM veiculos where placa = ?' );
            $stmt->execute( [ $placa ] );

            return $stmt->fetchAll( PDO::FETCH_OBJ );
        } catch ( \PDOException $e ) {
            throw new \Exception( ExceptionPdo::translateError( $e->getMessage() ) );
        } catch ( \PDOException $e ) {
            throw new \Exception( $e->getMessage() );
        }

    }

    //insert

    public function insert( array $dados )
 {
        try {
            $pdo = Conexao::getInstance();
            $sqlInsert = 'INSERT INTO veiculos(modelo, marca, placa)';
            $sqlInsert .= 'VALUES (?,?,?)';
            $stmt = $pdo->prepare( $sqlInsert );
            $stmt->execute( [ $dados[ 'modelo' ], $dados[ 'marca' ], $dados[ 'placa' ] ] );

            return ( $stmt->rowCount() > 0 );
        } catch ( \PDOException $e ) {
            throw new \Exception( ExceptionPdo::translateError( $e->getMessage() ) );
        } catch ( \PDOException $e ) {
            throw new \Exception( $e->getMessage() );
        }

    }
    //edit

    public function edit( array $dados )
 {
        try {
            $pdo = Conexao::getInstance();
            $sqlUpdate = 'UPDATE veiculos SET modelo= ?, marca = ?, placa = ?, sku = ?';
            $sqlUpdate .= ' WHERE id = ?';
            $stmt = $pdo->prepare( $sqlUpdate );
            $stmt->execute( [

                $dados[ 'modelo' ],
                $dados[ 'marca' ],
                $dados[ 'placa' ],
                $dados[ 'id' ], // o que esta entre '' é o que vem da api, e precisa estar com o mesmo nome de la
            ] );

            return ( $stmt->rowCount() > 0 );

        } catch ( \PDOException $e ) {
            throw new \Exception( ExceptionPdo::translateError( $e->getMessage() ) );
        } catch ( \PDOException $e ) {
            throw new \Exception( $e->getMessage() );
        }

    }

    //delete

    public function delete( $id )
 {

        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare( 'DELETE FROM veiculos where id = ?' );
            $stmt->execute( [ $id ] );
            return ( $stmt->rowCount() > 0 );
        } catch ( \PDOException $e ) {
            throw new \Exception( ExceptionPdo::translateError( $e->getMessage() ) );
        } catch ( \PDOException $e ) {
            throw new \Exception( $e->getMessage() );
        }

    }

}