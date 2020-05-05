<?php

//fetch appiontment from database
function appointment ($department){
    $rows = '';
    $rowNumber = 0;
    $allappointments = scandir("db/appointments/"); 
    $countappointments = count($allappointments);

for ($counter = 2; $counter < $countappointments ; $counter++) {
     $appointment = json_decode(file_get_contents('db/appointments/' . $allappointments[$counter]));
 
 
    if (@$appointment->department == $department) {
        $rowNumber++;
        $rows .= "
         <tr>
            <th scope='row'>$rowNumber</th>
            <td>$appointment->fullname</td>
            <td>$appointment->noa</td>
            <td>$appointment->date</td>
            <td>$appointment->time</td>
            <td>$appointment->department</td>
              <td>$appointment->complaint</td>
              <td>$appointment->payment</td>
        </tr>
        ";
    }
}

if ($rows == '') {
    return false;
}
return $rows;
}

//fetch staff from database
function getAllstaff()
{

    $staffRows = '';
    $staffrowNumber = 0;
    $allusers = scandir('../db/users/');
    $num = count($allusers);
    for ($counter = 2; $counter < $num; $counter++) {
        
        $user = json_decode(file_get_contents('../db/users/' . $allusers[$counter]));
        
        if (@$user->designation == "Medical Team") {
            $staffrowNumber++;
            $staffRows .= "
             <tr>
                <th scope='row'>$staffrowNumber</th>
                <td>$user->first_name $user->last_name</td>
                 <td>$user->gender</td>
                <td>$user->designation</td>
                <td>$user->department</td>
                <td>$user->date</td>
            </tr>
            ";
        } 
    }
    return $staffRows;
}

//fetch petient from database
function getAllpatient()
{

    $patientRow = '';
    $patientrowNumber = 0;
    $allusers = scandir('../db/users/');
    $num = count($allusers);
    for ($counter = 2; $counter < $num; $counter++) {
        
        $user = json_decode(file_get_contents('../db/users/' . $allusers[$counter]));
        
        if (@$user->designation == "Patient") {
            $patientrowNumber++;
            $patientRow .= "
             <tr>
                <th scope='row'>$patientrowNumber</th>
                <td>$user->first_name $user->last_name</td>
                 <td>$user->gender</td>
                <td>$user->designation</td>
                <td>$user->department</td>
                <td>$user->date</td>
                <td>$user->email</td>
            </tr>
            ";
        } 
    }
    return $patientRow;
}


//fetch user transaction from database
function transaction ($email){
    $rows = '';
    $rowNumber = 0;
    $alltransactions = scandir("db/transactions/"); 
    $counttransactions = count($alltransactions);

for ($counter = 2; $counter < $counttransactions ; $counter++) {
     $transaction = json_decode(file_get_contents('db/transactions/' . $alltransactions[$counter]));
 
 
    if ($transaction->email == $email) {
        $rowNumber++;
        $rows .= "
         <tr>
            <th scope='row'>$rowNumber</th>
            <td>$transaction->date</td>
            <td>$transaction->time</td>
            <td>$transaction->amount</td>
            <td>$transaction->txref</td>
            <td>$transaction->email</td>
              <td>$transaction->fullname</td>
        </tr>
        ";
    }
}

if ($rows == '') {
    return false;
}
return $rows;
}

//fetch all transaction
function getAlltransaction()
{

    $txtRow = '';
    $txtrowNumber = 0;
    $alltx = scandir('../db/transactions/');
    $num = count($alltx);
    for ($counter = 2; $counter < $num; $counter++) {
        
        $tx = json_decode(file_get_contents('../db/transactions/' . $alltx[$counter]));
        
        
            $txtrowNumber++;
            $txtRow .= "
            <tr>
            <th scope='row'>$txtrowNumber</th>
            <td>$tx->date</td>
            <td>$tx->time</td>
            <td>$tx->amount</td>
            <td>$tx->txref</td>
            <td>$tx->email</td>
              <td>$tx->fullname</td>
        </tr>
            ";
        
    }
    return $txtRow;
}
