<?php

class Fulfillment
{

    protected $id;
    protected $answer_id;

    public function __construct($id, $answer_id)
    {
        $this->id = $id;
        $this->title = $answer_id;
    }

    /**
     * Get a fulfillment
     */
    static function getAFulfillment( $id )
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM fulfillments WHERE id = ?';
        $stmt = $pdo->prepare( $query );
        $stmt->execute( [$id] );
        $fulfillment = $stmt->fetch();
        $fulfillmentAsObject = new Fulfillment( $fulfillment['id'], $fulfillment['answer_id'] );
        return $fulfillmentAsObject;
    }
}
