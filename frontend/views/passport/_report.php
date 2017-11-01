<?php 
// var_dump($passport);
// exit();
?>
<h6 style="font-size:20px; text-align: center; font-weight:bold; padding-bottom:20px;">Personal Record Form to keep</h6> 


<div><b>Record Serial No.</b> _____________________</div>


<div><b>1. Name (Myanmar/English)</b> ...<?php echo $familytree->name;?><dottab /></div>
<div><b>2. Other Name (Myanmar/English)</b> ...<?php echo $passport->otherName;?><dottab /></div>
<div><b>3. Father's Name</b> ...<?php echo $familytree->father;?>......................<b>(Race/Religion)</b>...<?php echo $familytree->region;?><dottab/></div>
<div style="padding-left:20px;"><b>Occupation/Address</b> ...<?php echo $familytree->occupation."/".$familytree->address;?> <dottab /></div>
<div><b>4. Mother's Name</b> ...<?php echo $familytree->mother;?>......................<b>(Race/Religion)</b>...<?php echo $familytree->region;?><dottab/></div>
<div style="padding-left:20px;"><b>Occupation/Address</b>...<?php echo $familytree->occupation."/".$familytree->address;?> <dottab /></div>
<div><b>5. Identification Mark</b> ...<?php echo $passport->identificationMark;?><dottab /></div>
<div><b>6. Date of Birth</b> ...<?php echo $familytree->dateOfBirth;?><dottab /></div>
<div><b>7. Place of Birth</b> ...<?php echo $familytree->placeOfBirth;?><dottab /></div>
<div><b>8. Male/Female</b> ...<?php if($passport->sex==1){echo "Male";}else if($passport->sex==2){echo "Female";}?><dottab /></div>
<div><b>9. Present Occupation/Address</b> ...<?php echo $passport->presentOccupation." / ".$passport->presentOccupationAddress;?><dottab /></div>
<div><b>10. Education Qualification</b> ...<?php echo $passport->educationalQual;?><dottab /></div>
<div><b>11. Citizenship Scrutiny Card No.</b> ...<?php echo $passport->citizenshipSecCardNo;?><dottab /></div>
<div><b>12. Height/Eye Colour/Hair Colour</b> ...<?php echo $passport->height." / ".$passport->eye." / ".$passport->hair?><dottab /></div>
<div><b>13. Race/Religion</b> ...<?php echo $familytree->raceNationality. " / " .$familytree->region;?><dottab /></div>
<div><b>14. Spouse's Name</b> ...<?php echo $passport->spouseName;?><dottab /></div>
<div style="padding-left:20px;"><b>Present Occupation/Address</b> ...<?php echo $passport->spouseOccupation." / ".$passport->spouseOccupationAddress;?><dottab /></div>
<div><b>15. Subject to be travelled</b> ...<?php echo $passport->subjectTravelled;?><dottab /></div>
<div><b>16. Country to be appiled</b> ...<?php echo $passport->countryApplied;?><dottab /></div>
<div><b>17. Studied at School/Standard</b></div>
<div style="padding-bottom:20px; padding-left:20px; padding-top:10px; ">
<table border="1" width="100%">
  <tr>
    <th colspan="2" align="center">Year</th>
    <th colspan="2" align="center">Standard</th>
    <th colspan="2" align="center">University/College/School</th>
  </tr>
    <tr>
    <th align="center" width="15%">from</th>
    <th align="center" width="15%">to</th>
    <th align="center" width="15%">from</th>
    <th align="center" width="15%">to</th>
    <th align="center">Name</th>
    <th align="center">Township/Ward/Village</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</div>


<div><b>18. Departmaent transferred and Served</b> ...<?php echo $passport->departmentTransferred;?><dottab /></div>

<div style="padding-left:20px;"><b>Current Designation</b> ...<?php echo $passport->departmentTransferredCurrent;?><dottab /></div>

<div><b>19. Name, Relationship, Occupation, Address of Siblings of Applicant</b>
<div>...<?php echo $passport->detailOfSiblingsApplicant;?><dottab/></div>
<div>&nbsp;<dottab /></div>
<div>&nbsp;<dottab /></div>

<div><b>20. Name, Occupation, Address of Spouse of Applicant</b>
<div>...<?php echo $passport->detailOfSpouseApplicant;?><dottab/></div>
<div>&nbsp;<dottab /></div>
<div>&nbsp;<dottab /></div>
<div><b>21. Name, Occupation, Address of Children of Applicant</b>
<div>...<?php echo $passport->detailOfChildrenApplicant;?><dottab/></div>
<div>&nbsp;<dottab /></div>
<div>&nbsp;<dottab /></div>

<div><b>22. Name, Occupation, Address of Siblings of Applicant's Father</b>
<div>...<?php echo $passport->detailOfSiblingsFather;?><dottab/></div>
<div>&nbsp;<dottab /></div>
<div>&nbsp;<dottab /></div>
<pagebreak />
<div><b>23. Name, Occupation, Address of Siblings of Applicant's Mother</b>
<div>...<?php echo $passport->detailOfSiblingsMother;?><dottab/></div>
<div>&nbsp;<dottab /></div>
<div>&nbsp;<dottab /></div>
<div><b>24. Name, Occupation, Address of Siblings of Applicant's Spouse</b>
<div>...<?php echo $passport->detailOfSiblingsSpouse;?><dottab/></div>

<div>&nbsp;<dottab /></div>
<div>&nbsp;<dottab /></div>
<div><b>25. To fill-up the person who were committed the sentence under the Criminal/Civil Law</b>
<div style="padding-bottom:20px; padding-left:20px; padding-top:10px; ">
<table border="1" width="100%">
  <tr>
    <th align="center">Act</th>
    <th align="center">Punishment</th>
    <th align="center">Court</th>
    <th colspan="2" align="center">Period</th>
    <th align="center">Prison</th>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>

</table>
</div>
<div><b>26. To fill-up if applied the Passport formerly</b></div>
<div style="padding-left:27px;"><b>PassPort No./Issue Date</b> ...<?php echo $passport->passportNo.".../...".$passport->passportIssueDate;?> <dottab/></div>
<div style="padding-left:27px;"><b>Place/Date if delivered the Passport</b> ...<?php echo $passport->placeDeliveredPassport.".../...".$passport->dateDeliveredPassport;?><dottab/></div>
<div style="padding-left:27px;"><b>Shall mention the Department/Airport which are delivered/</b></div>
<div style="padding-left:27px;"><b>if kept in hand, shall submit with attachment</b></div>
<div><b>27. whether went to aboard or not</b></div>
<div style="padding-bottom:20px; padding-left:20px; padding-top:10px; ">
<table border="1" width="100%">
  <tr>
    <th colspan="2" align="center">Year</th>
    <th rowspan="2" align="center">Subject to be travelled</th>
    <th rowspan="2" align="center">Country</th>
    <th rowspan="2" align="center">Remark</th>
  </tr>
    <tr>
    <th align="center" width="10%">from</th>
    <th align="center" width="10%">to</th>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
 
</table>
</div>

<div style="padding-left:30px;">Remark : if there is no left the place, shall mention with next paper.</div>
<div style="padding-left:90px;">Signed hereunder that the above facts are true and correct.</div>
<br>
<br>
<br>
<br>
<div style="padding-right:50px;" align="right">( Sign of Applicant )</div>







