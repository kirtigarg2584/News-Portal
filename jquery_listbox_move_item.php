<?php

?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function() {
    $('#btnRight').click(function(e) {
        var selectedOpts = $('#lstBox1 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });

    $('#btnLeft').click(function(e) {
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
});
</script>
<style type="text/css">
body
{
    padding:10px;
    font-family:verdana;
    font-size:8pt;
}

select
{
    font-family:verdana;
    font-size:8pt;
    width : 150px;
    height:100px;
}
input
{
    text-align: center;
    v-align: middle;
}
</style>
</head>
<body>
<table style='width:370px;'>
    <tr>
        <td style='width:160px;'>
            <b>Group 1:</b><br/>
           <select multiple="multiple" id='lstBox1'>
              <option value="ajax">Ajax</option>
              <option value="jquery">jQuery</option>
              <option value="javascript">JavaScript</option>
              <option value="mootool">MooTools</option>
              <option value="prototype">Prototype</option>
              <option value="dojo">Dojo</option>
        </select>
    </td>
    <td style='width:50px;text-align:center;vertical-align:middle;'>
        <input type='button' id='btnRight' value ='  >  '/>
        <br/><input type='button' id='btnLeft' value ='  <  '/>
    </td>
    <td style='width:160px;'>
        <b>Group 2: </b><br/>
        <select multiple="multiple" id='lstBox2'>
          <option value="asp">ASP.NET</option>
          <option value="c#">C#</option>
          <option value="vb">VB.NET</option>
          <option value="java">Java</option>
          <option value="php">PHP</option>
          <option value="python">Python</option>  
        </select>
    </td>
</tr>
</table>
</body>
</html>