<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IF_iperf</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap.css">
    <script src="librerias/jquery-3.6.3.min.js"></script>
    <script src="librerias/plotly-2.17.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-success">
                    <div class="panel panel-heading">Test grafico</div>
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="grafico-lin"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#grafico-lin').load('lineal.php');
    })
</script>