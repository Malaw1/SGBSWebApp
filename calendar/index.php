<?php
if(isset($_POST['submit'])){
    echo $_POST['date'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>

<body>
<div class="container">
    <form action="" class="form-horizontal"  role="form" method="POST">
        <fieldset>
            <legend>Prendre RV</legend>
            
			<div class="form-group">
                <label for="dtp_input2" class="col-md-2 control-label">Date </label>
                    <input class="form-control" size="16" type="text" value="" readonly name="date">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
			<div class="form-group">
                <label for="dtp_input3" class="col-md-2 control-label">Heure</label>
                <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii" name="hour">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
				
            </div>
            <input type="submit" id="dtp_input3" value="Envoyer" name="submit" /><br/>
        </fieldset>
    </form>
</div>

<script type="text/javascript" src="bootstrap/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>

</body>
</html>
