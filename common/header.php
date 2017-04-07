<!doctype html>
<html lang="fr">
<head>
    <title></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    if ($mostOldTweet != null) {
                        $mostOld = $mostOldTweet->created_at->toDateTime()->format('d/m/Y H:i:s');
                    } else {
                        $mostOld = "inconnu";
                    }

                    if ($mostRecentTweet != null) {
                        $mostRecent = $mostRecentTweet->created_at->toDateTime()->format('d/m/Y H:i:s');
                    } else {
                        $mostRecent = "inconnu";
                    }
                    $period = "<small>(Du ".$mostOld." au ".$mostRecent.")</small>";
                ?>
                <?php
                    $subjectCounts =  $params['subject'].' ('.$countTweets.' tweets)';
                ?>
                <a class="navbar-brand" href="index.html">D4JS with Twitter & Mongo DB - <?php echo $subjectCounts .
                    $period ?></a>
            </div>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="../views/hashtags-cloud.php">Nuage des hashtags associés</a>
                        <a href="../views/most-retweeted.php">Le plus retweeté</a>
                        <a href="../views/tweets-by-country.php">Tweets par pays</a>
                        <a href="../views/tweets-by-day.php">Tweets par jour</a>
                        <a href="../views/tweets-by-hour.php">Tweets par heure</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

