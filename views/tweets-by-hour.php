<?php
require '../config.php';
include '../common/header.php';
include('../database/tweets-by-hours.php');
$tweetsByHour      = getTweetsByHours($manager);
?>

<h2>Popularité de <?php echo $params['subject']; ?> dans le temps (Par heure)</h2>
<div style="width: 700px; height: 700px; position: absolute;">
    <canvas id="tweetsByHour" width="400" height="400"></canvas>
</div>

<?php
include '../common/footer.php';
?>
<script>
    var tweetsByHour = <?php echo json_encode($tweetsByHour) ?>;
</script>
<script src="../js/tweets-by-hour.js" charset="UTF-8"></script>
