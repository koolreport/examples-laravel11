<?php

require_once "MyReport.php";
$report = new MyReport;
$report->run();
?>
<?php
if (isset($_POST['command'])) {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
    exit;
}
?>

<?php
if (isset($_GET)) {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
}
?>


<html>

<head>
    <title>
        Combo Bar-Line Chart
    </title>
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
</head>

<body>
    <br>
    <button id="randomizeData" class="btn">Randomize Data</button>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#randomizeData').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    // url:"run.php",
                    data: {
                        command: 'randomizeData',
                    },
                    success: function(response) {
                        $('#report_render').html(response);
                    }
                })
            })
        })
    </script>
    <div>
        <div id='report_render'>
        </div>
    </div>
</body>

</html>