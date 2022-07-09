@extends('layouts/app')
@section('content')

<!-- <form action="" method="POST">
<div>
    <label>Date:</label>
    <input type="text" name="datepicker" id="datepicker">
</div>

<input type="submit" name="submit" id="submit" value="Add Date">


</form> -->
<!-- <script type="text/javascript">
$( function() {
    $( "#datepicker" ).datepicker({ 
    	dateFormat: 'dd/mm/yy',
    	 minDate: new Date(2022,0,1),
    	    showButtonPanel: true,
    	    changeMonth: true,
    	      changeYear: true,
    	       showOn: "button",
            yearRange: '2022:2024'
    	// maxDate: '+15d'
    });
  });
  </script> -->



<!-- <br><br> -->
  <form action="" method="POST">
<div>
    <label>Start Date:</label>
    <input type="text" name="datepicker" id="dt1">
   
</div>
 
<div id="enddatediv">
    <label>End Date:</label>
    <input type="text" name="datepicker" id="dt2">
   
</div>

<div class="col-md-3">
    <p class="bg-info" id='result'> Result will be displayed here.. <br></p>
</div>


</form>
 
<script type="text/javascript">
    $(document).ready(function () {
     var days = '';
       $('#enddatediv').hide();
       $("#result").hide();
      $("#dt1").datepicker({
        dateFormat: "dd-M-yy", 
        onSelect: function () {
             $('#enddatediv').show();
            var dt2 = $('#dt2');
            var startDate = $(this).datepicker('getDate');
            dt2.datepicker('option', 'minDate', startDate);
        }
    });
    $('#dt2').datepicker({
        dateFormat: "dd-M-yy",
      onSelect: function () {  

        $(this).change();
        },
    })
    .on("change", function() {
    var std = $('#dt1').datepicker('getDate');
    var etd = $('#dt2').datepicker('getDate');
    var diff = new Date(etd - std);
    var days = diff/1000/60/60/24;
    $("#result").show();
    $("#result").html("Difference in days "+days+"");
  });

});

</script>



@endsection