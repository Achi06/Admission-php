<?php if (isset($_GET['studentStatus'])) : ?>
<?php include('studentStatusSer.php') ?>
<h2 class="formHeading">Applicant Status</h2>



<div class="wbg">
        <table>
            <tr>
                <th>Application No.</th>
                <th>Department</th>
                <th>Year</th>
                <th>Status</th>
                <th>Action</th>
            </tr>    
        <?php
        while ($table = mysqli_fetch_array($table_ans)) {
            echo "<tr>";
            echo "<td>".$table['appl_no']."</td>";
            echo "<td>".$table['department']."</td>";
            echo "<td>".$table['admissionYr']."</td>";
            echo "<td>".$table['status']."</td>";
            if($table['status'] == 'Submitted'){
                echo "<td> No Action </td>";
            }
            elseif ($table['status'] == 'Invited') {
                ?>
                <td> 
                <form action=" " method="POST">
                    <button type="submit" name="accept" value="<?php echo $table['appl_no'];?>">Accept</button> 
                    <button type="submit" name="reject" value="<?php echo $table['appl_no'];?>">Reject</button>
            </form>    
                </td>
            <?php }
            else{
                echo "<td>".$table['status']."</td>";
            }
            echo "</tr>";
        }
        ?>
        </table>
    </div>

<?php  endif ?>