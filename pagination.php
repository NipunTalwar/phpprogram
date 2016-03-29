<html>
   
   <head>
      

       <title> Paging Using PHP </title>
   

   </head>
   
   <body>
      
      <?php
         
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = 'webf123';
         
         $rec_limit = 5;
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('attendance');
         
         /* Get total number of records */
         $sql = "SELECT count(*) FROM empleave";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_array($retval, MYSQL_NUM );
         echo $rec_count = $row[0];
         
         print_r($_GET);
         if(isset($_GET{'page_'} ) ) {
            $page = $_GET{'page_'} + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT * ". 
            "FROM empleave ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         echo "<table>";
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
           echo "<tr class='tablecontentlef'>";
       


       echo "<td>".$row["id"]."</td>";
       echo "<td>".$row["empname"]."</td>";
      
       echo "<td>" .$row["leavetype"]."</td>";
       echo "<td>" .$row["selectfrom"]."</td>";
       echo "<td>" .$row["selectto"]."</td>";
       echo "<td>" .$row["hourtaken"]."</td>";
       echo "<td>" .$row["reason"]."</td>";
       echo "</tr>";
         
         }
         
         

         echo "</table>";
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         

         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
         } 
         
         mysql_close($conn);
      ?>
      
   </body>
</html>




