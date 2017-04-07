<?php
require '../config.php';
include('../database/tweets-by-country.php');
$tweetsByCountries = getTweetsByCountries($manager);
include '../common/header.php';
?>

<h2>Répartition par langue des tweets concernants <?php echo $params['subject'] ?></h2>
<div style="margin-left: 100px;width:500px; height:500px">
    <canvas id="byCountry" width="400" height="400"></canvas>
    <div class="clearfix"></div>
</div>

<?php
include '../common/footer.php';
?>

<script>
    var tweetsByCountry = <?php echo json_encode($tweetsByCountries) ?>;
</script>
<script src="../js/tweets-by-country.js" charset="UTF-8"></script>


