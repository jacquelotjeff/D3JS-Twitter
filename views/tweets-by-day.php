
<?php
require '../config.php';
include('../database/tweets-by-day.php');
$tweetsOnTime      = getTweetsOnTime($manager);
include '../common/header.php';
?>

<h2>Popularité de <?php echo $params['subject']; ?> dans le temps (Par jour)</h2>
<div style="width: 700px; height: 700px; position: absolute;">
    <canvas id="tweetsOnTime" width="400" height="400"></canvas>
    <div class="clearfix"></div>
</<div>

<?php
include '../common/footer.php';
?>
<script>
    var tweetsOnTime = <?php echo json_encode($tweetsOnTime) ?>;
</script>
<script src="../js/tweets-on-time.js" charset="UTF-8"></script>