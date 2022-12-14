<?php

class Fulfillment
{

    protected $id;
    protected $modification_date;
    protected $exercise_id;

    public function __construct($id, $modification_date, $exercise_id)
    {
        $this->id = $id;
        $this->modification_date = $modification_date;
        $this->exercise_id = $exercise_id;
    }

    /**
     * Get a fulfillment
     */
    static function getAFulfillment($id)
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM fulfillments WHERE id = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $fulfillment = $stmt->fetch();
        $fulfillmentAsObject = new Fulfillment($fulfillment['id'], $fulfillment['modification_date'],$fulfillment['exercise_id']);
        return $fulfillmentAsObject;
    }
    
    /**
     * Get all fulfillments by exercise_id
     */
    static function getAllFulfillmentsByExerciseId($exercise_id)
    {
        $fulfillmentsAsObjects = [];
        $pdo = getConnector();
        $query = 'SELECT * FROM fulfillments WHERE exercise_id = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$exercise_id]);
        $fulfillments = $stmt->fetchAll();

        foreach ($fulfillments as $fulfillment) {
            $fulfillmentAsObject = new Fulfillment($fulfillment['id'], $fulfillment['modification_date'],$fulfillment['exercise_id']);
            array_push($fulfillmentsAsObjects, $fulfillmentAsObject);
        }
        return $fulfillmentsAsObjects;
    }

    static function getAFulfillmentByExercise($exercise_id)
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM fulfillments WHERE exercise_id = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$exercise_id]);
        $fulfillment = $stmt->fetch();
        $fulfillmentAsObject = new Fulfillment($fulfillment['id'], $fulfillment['modification_date'],$fulfillment['exercise_id']);
        return $fulfillmentAsObject;
    }

    public static function getAFulfillmentsByExercise( $exercise_id )
    {
        // returns an array with all the questions
        $fulfillmentsAsObjects = [];
        $pdo                = getConnector();
        $query              = 'SELECT * FROM fulfillments WHERE exercise_id=?';
        $stmt               = $pdo->prepare( $query );
        $stmt->execute( [$exercise_id] );
        $fulfillments = $stmt->fetchAll();

        foreach ( $fulfillments as $fulfillment )
        {
            $fulfillmentsAsObject = new Fulfillment($fulfillment['id'], $fulfillment['modification_date'],$fulfillment['exercise_id']);
            array_push( $fulfillmentsAsObjects, $fulfillmentsAsObject );
        }

        return $fulfillmentsAsObjects;
    }

    /**
     * Create a fulfillment
     */
    function create()
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM fulfillments WHERE id = ?';
        $stmt  = $pdo->prepare($query);
        $stmt->execute([$this->id]);

        if ($stmt->fetch() == null) {
            $query = 'INSERT INTO fulfillments (modification_date, exercise_id) VALUES ( ? , ? )';
            $stmt  = $pdo->prepare($query);
            $stmt->execute([$this->modification_date, $this->exercise_id]);
            return $pdo->lastInsertId();
        }
    }

    public static function deleteByExerciseId($exercise_id)
    {
        $pdo = getConnector();
        $query = 'DELETE FROM fulfillments WHERE exercise_id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$exercise_id]);
    }

    public function delete()
    {
        $pdo = getConnector();
        $query = 'DELETE FROM fulfillments WHERE id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->id]);
    }

    public function getId() 
    {
        return $this->id;
    }

    public function getModificationDate() 
    {
        return $this->modification_date;
    }
}