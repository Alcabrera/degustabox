<?php
include_once("modelos/conexion.php");
include_once("modelos/settask.php");

$tasks= obtainAllTasks();
?>

<form method="post">
  <label for="current_task">Set your current task:</label>
  <input type="text" id="current_task" name="current_task">

</form>
<label for="time_elapsed">Time elapsed:</label>
<input type="text" id="time_elapsed" name="time_elapsed" disabled="true">
	<input type="button" value="Start" id="start" onclick="startStop(this)">
  <input type="submit" value="Stop" id="stop" onclick="startStop(this)" disabled="disabled">
<br>

<table>
  <tr>
    <th>Task </th>
    <th>Time </th>
  </tr>
  <?php
foreach ($tasks as $task):
?>
<tr>
  <td><?= $task['task'] ?></td>
  <td name="tiempo"><?= $task['time'] ?></td>
</tr>
<?php
  endforeach;
?>
  <tr>
    <th>Total </th>
    <td id="tiempo_total"></td>
  </tr>
</table>

  <script defer type="text/javascript">


  var start=0;

  var timeout=0;



  function startStop(button)

  {
    if (document.getElementById('current_task').value==""){
        alert("Tasks placeholder can´t be empty");
      }
      else {





    if (document.getElementById('start').disabled==true) {
      clearTimeout(timeout);

  		timeout=0;

      document.getElementById('start').disabled=false;
      document.getElementById("stop").disabled=true;
    }
    else {


  	if(timeout==0)

  	{

  		// empezar el cronometro



  		document.getElementById('start').disabled=true;
      document.getElementById("stop").disabled=false;



  		// Obtenemos el valor actual

  		start=vuelta=new Date().getTime();



  		// iniciamos el proceso

  		counting();

  	}else{

  		// detemer el cronometro





  		clearTimeout(timeout);

  		timeout=0;

  	}

  }
  }
  }


  function counting()

  {

  	// obteneos la fecha actual

  	var actual = new Date().getTime();



  	// obtenemos la diferencia entre la fecha actual y la de inicio

  	var diff=new Date(actual-start);



  	// mostramos la diferencia entre la fecha actual y la inicial

  	var result=LeadingZero(diff.getUTCHours())+":"+LeadingZero(diff.getUTCMinutes())+":"+LeadingZero(diff.getUTCSeconds());

  	document.getElementById('time_elapsed').value = result;



  	// Indicamos que se ejecute esta función nuevamente dentro de 1 segundo

  	timeout=setTimeout("counting()",1000);

  }



  /* Funcion que pone un 0 delante de un valor si es necesario */

  function LeadingZero(Time) {

  	return (Time < 10) ? "0" + Time : + Time;

  }


  </script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
  $(function(){
  $('#stop').click(function(evento) {
    // evento.preventDeafult();
   var task = $('#current_task').val();
   var time = $('#time_elapsed').val();



  $.ajax(
{
  url : "index.php",
  type: "POST",
  data : {task: task, time: time}
})
.done(function(data) {

  if(data != false) {

} alert ("Actualizado");
})
.fail(function(data) {
  alert( "error" );
});
});

var horas = $('td[name^=tiempo]').val();
var total = parseint(horas)+ parseint(horas);



$('#tiempo_total').html= total;



});
  </script>
