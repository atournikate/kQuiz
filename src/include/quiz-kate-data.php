<?php

function q_data() {
    return array(
        'introduction' => q_introductionData(),
        'questions' => q_questionData(),
        'report' => q_reportData()
    );
}

function q_introductionData() {
    return array(
        'title' => "Random Animal Quiz",
        'description' => "Go for it ...",
        'imageURL' => "/images/axle.jpg",
        'nextAction' => 'question.php',
        'questionID' => 'q0'
    );
}

function q_questionData() {
    return array(
        'q0' => q_q0(),
        'q1' => q_q1(),
        'q2' => q_q2(),
        'q3' => q_q3(),
        'q4' => q_q4(),
        'q5' => q_q5(),
        'q6' => q_q6(),
        'q7' => q_q7(),
        'q8' => q_q8(),
        'q9' => q_q9()
    );
}

function q_q0() {
    return array(
        'text' => "Why do dolphins play with pufferfish?",
        'answers' => array(
            array("They like to play with their food", 0),
            array("They like the sensory experience of the spikes", 0),
            array("They like to get high", 1),
            array("They like to torment smaller creatures", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q1'
    );
}

function q_q1() {
    return array(
        'text' => "What is a chevrotain?",
        'answers' => array(
            array("A small frog in the Amazon rainforest", 0),
            array("A small shrimp with an extra set of eyes", 0),
            array("A small goat with batlike ears", 0),
            array("A small deer with fangs", 1)
        ),
        
        'nextAction' => 'question.php',
        'questionID' => 'q2'
    );
}

function q_q2() {
    return array(
        'text' => "What is the joint above a horse's hoof called?",
        'answers' => array(
            array("Knuckle", 0),
            array("Fetlock", 1),
            array("Wrist", 0),
            array("Haunch", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q3'
    );
}

function q_q3() {
    return array(
        'text' => "What does 'crepuscular' mean?",
        'answers' => array(
            array("'Twilight,' as in active at dawn and dusk", 1),
            array("'Armored,' as in having a carapace", 0),
            array("'Creeping,' as in moving low to the ground", 0),
            array("'Shell,' as in eating only mollusc and soft-shelled creatures", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q4'
    );
}

function q_q4() {
    return array(
        'text' => "What are Igel called in English?",
        'answers' => array(
            array("Hedgemouse", 0),
            array("Spikebunny", 0),
            array("Hedgehog", 1),
            array("Pinpig", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q5'
    );
}

function q_q5() {
    return array(
        'text' => "What is the difference between a rabbit and a hare?",
        'answers' => array(
            array("None, they are completely the same", 0),
            array("Rabbits are more likely to be found in urban areas", 0),
            array("Rabbits are bigger and battle each other", 0),
            array("Hares are bigger and less social than rabbits", 1)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q6'
    );
}

function q_q6() {
    return array(
        'text' => "Why do adult cats meow?",
        'answers' => array(
            array("They meow specifically to communicate with humans", 1),
            array("They want to sing the song of their people", 0),
            array("They want to warn each other of danger", 0),
            array("They meow because they want to find other cats", 0)
            
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q7'
    );
}

function q_q7() {
    return array(
        'text' => "What sound does a giraffe make?",
        'answers' => array(
            array("A subaural hum only other giraffes can hear", 0),
            array("None, because giraffes have no vocal chords", 1),
            array("A mixture between humming and whining", 0),
            array("A coughing call often mistaken for a lion hacking up a bone", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q8'
    );
}

function q_q8() {
    return array(
        'text' => "How long can a crocodile live?",
        'answers' => array(
            array("30 years", 0),
            array("100 years", 1),
            array("50 years", 0),
            array("80 years", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q9'
    );
}

function q_q9() {
    return array(
        'text' => "In 'Finding Nemo,' why was Nemo a 'boy?'",
        'answers' => array(
            array("Because of the patriarchy", 0),
            array("Because Disney needed a male protagonist", 0),
            array("Because clownfish are all born male", 1),
            array("Because clownfish are non-gendered and it may as well have been male", 0)
        ),
        'nextAction' => 'report.php'
    );
}


function q_reportData() {
    return array(
        'title' => "Wow!",
        'imageURL' => "/images/arapaima.jpg",
        'feedback_00' => "Oh... just wow. That was really bad...",
        'feedback_10' => "That was a rotten performance!",
        'feedback_20' => "That was a terrible performance!",
        'feedback_30' => "That was a dismal performance!",
        'feedback_40' => "That was a sad performance!",
        'feedback_50' => "That was a mediocre performance!",
        'feedback_60' => "That was a decent performance!",
        'feedback_70' => "That was a very good performance!",
        'feedback_80' => "That was a fantastic performance!",
        'feedback_90' => "That was a awesome performance!",
        'feedback_100' => "That was a flawless performance!",
    );
}

