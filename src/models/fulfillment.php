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
}
