<!DOCTYPE html>
<html>
    <head>
        <title><font color ="green">Registration information</font></title>
       
    </head>
    <body style="text-align: center;">
        <div  style="width: 100% ">
        <table class="" border="1" style="text-align:left;width: 75%;" >
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center; padding-top: 20px;">
                        <img src="<?= base_url($photo)?>" alt="<?=$name?>" height="180px" title="<?=$name?>" >
                    </th>
                </tr>
            </thead>
            <tbody>
                 <tr>
                     <th style="width: 50%;" >Name</th><td ><?=$name?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >Guardian’s name</th><td ><?=$guardians_name?></td>
                </tr>
                 <tr>
                     <th class="col-md-6" >Gender</th><td ><?=($gender)?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >D.O.B</th><td ><?=$dob?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >Age</th><td ><?=$age?> Year</td>
                </tr>
                <tr>
                     <th class="col-md-6" >District</th><td ><?=$district?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >D.O.B</th><td ><?=$dob?></td>
                </tr>
                
                <tr>
                     <th class="col-md-6" >District</th><td ><?=$district?></td>
                </tr>
                <tr>
                     <th class="col-md-6" >Mobile No</th><td ><?=$mobile_no?> </td>
                </tr>
                <tr>
                     <th class="col-md-6" >Email Id</th><td ><?=$email?> </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" style="text-align: left">
                         Time : <?=$registration_date?>
                    </th>
                </tr>
            </tfoot>
        </table>     
        </div>
    </body>
</html>