<?php
require '../config.php';
include '../common/header.php';
?>

<h2>Les utilisateurs parlant le plus de <?php echo $params['subject'] ?></h2>
<div style="margin-left: 100px;width:500px; height:500px">
    <canvas id="topTweeters" width="400" height="400"></canvas>
    <div class="clearfix"></div>
</div>

<?php
include '../common/footer.php';
?>

<script src="../js/top-twitters.js" charset="UTF-8"></script>