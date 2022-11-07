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
    var_dump ($bag['post_exercise']);
    $question = new Question($bag['post_question']['label'],$bag['post_question']['value_kind'], 1, $exercise_id);
    


    // $bag['data']['createQuestion'] = Question::save();
    // $bag['data']['loadQuestion'] = Question::loadById($id);
    // $bag['data']['displayQuestions'] = Question::getAll("fields");
    // $bag['view'] = 'view/exercices/create_question';

}
