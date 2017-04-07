<?php
    require '../config.php';
    include('../database/hashtags.php');
    $hashtags          = getHashtags($manager);

    include '../common/header.php';
?>
    <h2>Sujets entourant <?php echo $params['subject'] ?></h2>
    <div style="margin-left: 100px;width:500px; height:500px">
        <canvas id="tagCloud" width="400" height="400"></canvas>
    </div>
<?php
    include '../common/footer.php';
?>
<script>
    var hashtags = <?php echo json_encode($hashtags); ?>;
</script>
<script src="../js/tagcloud.js" charset="UTF-8"></script>
<script src="../js/hastags-cloud.js" charset="UTF-8"></script>
