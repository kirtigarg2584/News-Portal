 <select multiple="multiple" id='lstBox2' name="lit[]" >
<?php
include("opendb.php");



        $list1=mysql_query("select metal from result WHERE metal='a_b:c_d' AND sno='110' AND result_text='testing resultqwqed' AND status='1'");
            $group = array();
			while($row_list1=mysql_fetch_array($list1)){
			
			// $group_1 = $row_list1['metal'];
			 
			foreach ($row_list1 as $grouparray)
      {

$group = explode(":",$grouparray);

 //$group = array_merge($group, $path);
      }
	  }
	  //var_dump($group);
	$arrlength = count($group);
	
	 for($x=0;$x<$arrlength;$x++)
  {
 //echo 'Piece ' . $x . ' - ' . $group[$x] . '<br />';


                ?>
                


    <option value="<?php  echo $group[$x]; ?>">
                                         <?php echo $group[$x]; ?>
                    </option>
					
                <?php
                
				 }
				 //}
			
                ?>  
				
				</select>