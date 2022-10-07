<?php
/**
 * Title: index
 * Author: Menoud Yann & Montavon Victorien
 * Version: 1.0 from 09th September 2022
 */
/**
 * If $bag['handler] is receive
 * create question en manage it before posting it 
 */
if ($bag['handler']) {
    $bag['data'] = [];
    $bag['data'] = ['createQuestion'] = Question::save(new);
    $bag['data'] = ['loadQuestion'] = Question::loadById($id);
    $bag['data'] = ['displayQuestions'] = Question::getAll("fields");
    $bag['view'] = 'view/exercices/create_question';

}

?>