<?php if (isset($_GET['adminDash'])) : ?>
<?php include('adminDashServ.php') ?>
<h2 class="formHeading">Applicant Status</h2>


    <div class="wbg">
        <table>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Application No</th>
                <th>Department</th>
                <th>Year</th>
                <th>HSC %</th>
                <th>AIEEE</th>
                <th>CET</th>
                <th>Status</th>
                <th>Action</th>
            </tr> 
            <?php
                while ($display_table = mysqli_fetch_array($student_table)) {
            echo "<tr>";
            echo "<td>".$display_table['id']."</td>";
            echo "<td>".$display_table['firstName']." ".$display_table['middleName']." ".$display_table['lastName']. "</td>";
            echo "<td>".$display_table['appl_no']."</td>";
            echo "<td>".$display_table['department']."</td>";
            echo "<td>".$display_table['admissionYr']."</td>";
            $hsc_total=($display_table['math']+$display_table['chem']+$display_table['phy']);
            $hsc_per= number_format(($hsc_total/300)* 100, 2);
            echo "<td>".$hsc_per."</td>";
            echo "<td>".$display_table['aie']."</td>";
            echo "<td>".$display_table['cet']."</td>";
            if($display_table['status'] == 'Submitted'){
                echo "<td> Submitted </td>";
            }
            elseif($display_table['status'] == 'Invited'){
                echo "<td> Awaiting <br> response </td>";
            }
            elseif($display_table['status'] == 'Accepted'){
                echo "<td> Accepted </td>";
            }
            elseif($display_table['status'] == 'Rejected'){
                echo "<td> Rejected </td>";
            }
            else{
                echo "<td> Enrolled </td>";
            }
            if($display_table['status'] == 'Submitted'){
            ?>
            <td> 
                <form action=" " method="POST">
                    <button type="submit" name="invite" value="<?php echo $display_table['appl_no'];?>">Invite</button> 
                 </form>    
            </td>
                
           <?php }
           elseif($display_table['status'] == 'Invited' || $display_table['status'] == 'Rejected'){
            ?>
            <td>Invited</td>
           <?php }
           elseif ($display_table['status'] == 'Accepted') {
             ?>
            <td> 
                <form action=" " method="POST">
                    <button type="submit" name="enroll" value="<?php echo $display_table['appl_no'];?>">Enroll</button> 
                </form>    
            </td>
           <?php }
           else{
            ?>
            <td> Enrolled </td>
                
           <?php }

            echo "</tr>";
        }
        ?>
        </table>   
    </div>

<?php  endif ?>