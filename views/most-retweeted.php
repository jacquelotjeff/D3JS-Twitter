<?php
require '../config.php';
include '../common/header.php';
include('../database/most-retweeted.php');
$mostRetweeted     = getMostRetweeted($manager);
?>

<h2>Le plus retweeté</h2>
<div style="margin-left: 100px;width:500px; height:500px">
    <canvas id="mostRetweeted" width="400" height="400"></canvas>
    <div style="box-shadow:0px 1px 5px -1px #000; height:auto; width:500px; margin:100px;">
        <?php $date = $mostRetweeted[0]->created_at; ?>
        <p style="padding:10px;float:left"><?php echo date("d/m/Y", intval($date->toDateTime()->format('Uu')) /
                1000000); ?></p>
        <p style="padding:10px;float:right">Retweeté <span style="font-size:16px;"><?php echo
                $mostRetweeted[0]->retweet_count; ?></span> fois</p>
        <p style="padding:10px;clear:both"><?php echo $mostRetweeted[0]->text; ?></p>
    </div>
</div>
<?php
include '../common/footer.php';
?>
<script>
     var mostRetweeted = "<?php echo json_encode($mostRetweeted); ?>";
</script>
<script src="../js/most-retweeted.js" charset="UTF-8"></script>
