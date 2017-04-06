<?php

function getTweetsOnTime($manager) {

    $cmd = new MongoDB\Driver\Command([
        // build the 'aggregate' command
        'aggregate' => 'tweets', // specify the collection name
        'pipeline' => [
            ['$project' => [
                'tweeted_at_month' => ['$month'=>'$created_at'],
                'tweeted_at_day' => ['$dayOfMonth'=>'$created_at']
                //'label' => ['$dateToString'=>['format'=>'%m-%Y', 'date'=>'$created_at']]
            ]],
            ['$group' => [
                '_id' => ['tweeted_at_month'=>'$tweeted_at_month','tweeted_at_day'=>'$tweeted_at_day'],
                'count' => ['$sum' => 1]
            ]],
        ],
    ]);

    $cursor = $manager->executeCommand('db', $cmd); // retrieve the results

    foreach ($cursor as $document) {
        $results = $document->result;
    }

    return $results;

}

//{  }

/*

db.tweets.aggregate(
  [
    { $project : {
		tweeted_at_month : { $month : "$created_at" },
		tweeted_at_year : { $year : "$created_at" },
        label : { $dateToString: { format: '%m-%Y', date: "$created_at" } }
    } } ,
    { $group : {
		_id : {tweeted_at_month : "$tweeted_at_month", tweeted_at_year : "$tweeted_at_year" } ,
		count : { $sum : 1 }
    } }
  ]
)

*/


