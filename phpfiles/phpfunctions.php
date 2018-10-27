<?php
function tablecreation($query,$columnnames,$columndatanames){
	echo"
            <thead>
                <tr>";
                    Foreach($columnnames as $columnname){
                        echo"<th>". $columnname ."</th>";
                    }	
             		echo"</tr>
            </thead>
            <tbody>";
				$sql = $query;
                while($result = mysqli_fetch_assoc($sql)){
                    echo'<tr>';
                    Foreach($columndatanames as $columndata){
                        if($result[$columndata] == '!!! STUDENT DOES NOT MEET REQUIREMENTS !!!'){
                            echo'<td><a href=../phpfiles/deletecheckout.php?id='.$result['ID'].' onclick=\'return confirm_alert(this);\'> '.$result[$columndata].' </a></td>';
                        }
                        elseif($columndata != 'equiplock'){
                            echo'<td>'.$result[$columndata].'</td>';
                        }else{
                            echo'<td><a href=../phpfiles/equiplocking.php?id='.$result['barcode'].' onclick=\'return confirm_alert(this);\'> '.$result[$columndata].' </a></td>';
                        }
                    }
                    echo'</tr>';
                }
            echo"</tbody>";
}

function normaltablecreation($query,$columnnames,$columndatanames){
	echo"
          <thead>
           <tr>";
            Foreach($columnnames as $columnname){
             echo"<th>". $columnname ."</th>";
            }	
           echo"</tr>
          </thead>
          <tbody>";
            $sql = $query;
            while($result = mysqli_fetch_assoc($sql)){
                echo'<tr>';
                Foreach($columndatanames as $columndata){
                        if($result[$columndata] == '!!! STUDENT DOES NOT MEET REQUIREMENTS !!!'){
                            echo'<td><a href=../phpfiles/deletecheckout.php?id='.$result['ID'].' onclick=\'return confirm_alert(this);\'> '.$result[$columndata].' </a></td>';
                        }
                        elseif($columndata != 'equiplock'){
                            echo'<td>'.$result[$columndata].'</td>';
                        }else{
                            echo'<td>'.$result[$columndata].'</td>';
                        }
                }
                echo'</tr>';
            }
     echo"</tbody>";
}


          
      