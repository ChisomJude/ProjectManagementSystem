<?php 

require "dbcon.php";

    $opt= $_POST['select_file'];
    $date= $_POST['date'];
	 $q= mysqli_query($con,"SELECT applicants.id,applicants.sname, applicants.fname, applicants.gender, applicants.email, applicants.marital_stat,applicants.nationality, applicants.phone, applicants.spouse_name, applicants.spouse_phone, applicants.state, applicants.lga, applicants.residential_addr, applicants.area_close2u, applicants.identification, applicants.id_number, applicants.name_nxtkin,applicants.kin_phone, applicants.kin_addr, applicants.relationship, applicants.meduim_reached, applicants.agent_code,applicants.date, status.status, status.remark  FROM applicants INNER JOIN status ON applicants.id=status.applicant_id  WHERE status.status ='0' ORDER BY applicants.id ASC");
	//$q=mysqli_fetch_array($q);


    $filename = "newapplicant.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (!empty($q)) {
        foreach ($q as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();

header("location:dwld.php");
?>