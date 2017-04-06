            </div>
        </div>
    </div>
    <script>
        var tweetsByCountry = <?php echo json_encode($tweetsByCountries) ?>;
        var tweetsOnTime = <?php echo json_encode($tweetsOnTime) ?>;
        var tweetsByHour = <?php echo json_encode($tweetsByHour) ?>;
        var hashtags = <?php echo json_encode($hashtags); ?>;
        var mostRetweeted = <?php echo json_encode($mostRetweeted); ?>;
        var subject = "<?php echo $params['subject']; ?>";
    </script>
    <script src="js/utils/colors.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="js/tagcloud.js"></script>
    <script src="js/tweets-on-time.js" charset="UTF-8"></script>
    <script src="js/tweets-by-hour.js" charset="UTF-8"></script>
    <script src="js/hastags-cloud.js" charset="UTF-8"></script>
    <script src="js/most-retweeted.js" charset="UTF-8"></script>
    <script src="js/tagcloud.js" charset="UTF-8"></script>
    <script src="js/tweets-by-country.js" charset="UTF-8"></script>
</body>
</html>