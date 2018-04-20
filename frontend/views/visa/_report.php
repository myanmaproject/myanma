<?php

use yii\helpers\Html;
use frontend\models\Typeofvisa;
use app\models\Visa;
use app\models\Familytree;
use app\models\Basicdocuments;
use app\models\Documenttouristvisa;
use app\models\DocumentFirsttime;
use app\models\Documentapplicant;
use app\models\Transitvisathailand;


 $findvisa = Visa::find()->where(['idvisa'=>$id])->one();

$findfamily = Familytree::find()->where(['idfamilytree'=>$findvisa->familytree_idfamilytree])->one();
$basicdocument = Basicdocuments::find()->where(['visa_idvisa'=>$findvisa])->all();
$documenttouristvisa = Documenttouristvisa::find()->where(['visa_idvisa'=>$findvisa])->all();
$documentfirsttime = DocumentFirsttime::find()->where(['visa_idvisa'=>$findvisa])->all();
$documentapplicant = Documentapplicant::find()->where(['visa_idvisa'=>$findvisa])->all();
$transitvisathailand = Transitvisathailand::find()->where(['visa_idvisa'=>$findvisa])->all();


?>
<div class="row">
    <div class="col-xs-2"><?= Html::img('@frontend/web/visa/'.$findvisa->picture,['alt'=>'d','width'=>'120','height'=>'120','align'=>'center'])  ?></div>
    <div class="col-xs-5" align="center"><?= Html::img('@frontend/web/images/Thai_government.png',['width'=>'120','height'=>'120','align'=>'center'])  ?>
        <br><p align="center">APPLICATION FOR VISA</p>
        <p align="center">Ministry of Forecign Affairs of Thailand</p></div>
    <div class=""><p><font size="1"><b>Please Indicate Type of Visa Requested</b></font></p>

      
      <?php $num = $findvisa->typeOfVisaRequest; ?>  

      <?php $type = Typeofvisa::find()->all(); 
            $alltype = count($type); 
            for($i = 0; $i < $alltype; $i++){ ?>
     
          <?php  if($i+1 == $num ){ ?>
  <?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center']) ?><?= $type[$i]->name; ?>  <br/>
     <?php     }else{  ?>
      <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center']) ?><?= $type[$i]->name; ?>  <br/>
        <?php }} ?>
<br/>
      <p><b>Number of Entries Requested : <?php echo $findvisa->numberRequested; ?></b></font></p>
</div>

<div class="row">

    <div class="col-xs-12">
      <?php $prefix = $findvisa->prefix; ?>
      <?php if($prefix == "Mr."){ ?>
      <?= Html::img('@frontend/web/images/checked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?>
      <?php }else{ ?>     
      <?= Html::img('@frontend/web/images/unchecked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?><?php } ?><b> Mr. </b>


      <?php if($prefix == "Mrs."){ ?>
      <?= Html::img('@frontend/web/images/checked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?>
      <?php }else{ ?>     
      <?= Html::img('@frontend/web/images/unchecked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?><?php } ?><b> Mrs.</b>

      <?php if($prefix == "Miss."){ ?>
      <?= Html::img('@frontend/web/images/checked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?>
      <?php }else{ ?>     
      <?= Html::img('@frontend/web/images/unchecked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?><?php } ?><b> Miss.</b> <?php echo $findvisa->firstName; ?>
      <?php echo $findvisa->middleName; ?>
      <?php echo $findvisa->familyName; ?>
    </div>

</div>
<!-- <div class="row">
    <div class="col-xs-4"><p align="right">First Name</p></div>
     <div class="col-xs-2"><p>Middle Name</p></div>
      <div class="col-xs-2"><p>Family Name</p></div>
       <div class="col-xs-2"><p>(in BLOCK letters)</p></div>
</div> -->

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Former Name (if any)</b> ________________________________</p></div>
    <div class="col-xs-5"><p><b>Countries for which travel document is valid</b></p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Nationality</b> <?php echo $findfamily->raceNationality; ?></p></div>
    <div class="col-xs-6"><p><?php echo $findvisa->countriesForTravel; ?></p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Nationality at Birth</b> <?php echo $findvisa->nationalityBirth; ?></p></div>
    <div class="col-xs-6"><p><b>Proposed Address in Thailand</b> <?php echo $findvisa->proposedAddressThai; ?> </p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Birth Place</b> <?php echo $findfamily->placeOfBirth; ?> <b>Marial Status</b> <?php echo $findvisa->maritalStatus; ?></p></div>
    <div class="col-xs-6"><p>__________________________________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Date of Birth</b> <?php echo $findfamily->dateOfBirth; ?></p></div>
    <div class="col-xs-6"><p>__________________________________________________________________________________</p></div>  
</div>

<?php 
$father_name = '-';

if($findfamily->father!=null){

$father = Familytree::find()->where(['idfamilytree'=>$findfamily->father])->one(); 

$father_name=$father->name;
}

?>
<div class="row">
    <div class="col-xs-5"><p align="left"><b>Father's name</b> <?php echo $father_name; ?></p></div>
    <div class="col-xs-6"><p><b>Name and Address of Local Guarantor</b></p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Type of Travel Document</b> <?php echo $findvisa->TypeTravelDocument; ?></p></div>
    <div class="col-xs-6"><p> <?php echo $findvisa->nameAddressLocal; ?> </p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>No.</b> <?php echo $findvisa->noPerson; ?> <b>Issued at</b> <?php echo $findvisa->issuedAt; ?></p></div>
    <div class="col-xs-6"><p>_________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Date of Issue</b> <?php echo $findvisa->dateIssue; ?> <b>Expiry Date</b> <?php echo $findvisa->expiryDate; ?> </p></div>
    <div class="col-xs-6"><p><b>Tel/Fax</b> <?php echo $findvisa->telThai; ?> </p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Occupation (specify present position and name of employer)</b></p></div>
    <div class="col-xs-6"><p><b>Name and Address of Guarantor in Thailand</b></p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"> <?php echo $findfamily->occupation; ?> </p></div>
    <div class="col-xs-6"><p> <?php echo $findvisa->nameaddressGuarantor; ?> </p></div>  
</div>

<div class="row">
    <div class="col-xs-5"> <p align="left">-</p> </div>
    <div class="col-xs-6"><p>______________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Current Address</b> <?php echo $findvisa->currentAddress; ?> </p></div>
    <div class="col-xs-6"><p>Tel/Fax <?php echo $findvisa->telGuarantor; ?> </p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">-</p></div>
    <div class="col-xs-6"><p>I hereby declare that i will not request any refund from my paid visa fee even even if my application has been declined.</p></div>
</div>

<div class="row">
    <div class="col-xs-5"><p align="left"><b>Tel</b> <?php echo $findvisa->telPerson; ?> <b>E-mail</b> <?php echo $findvisa->email; ?> </p></div>
    <div class="col-xs-6"><p>Signature ______________________Date __________________</p></div>
</div>

<div class="row">
    <div class="col-xs-5 "><p align="left"><b>Permanent Address (if different from above)</b><br> <?php echo $findvisa->permanentAddress  ; ?> </p></div>
    <div class="col-xs-6"><p>Note: Royal Thai Embassy reserves the right to accept only new bank notes (Large Head) in very good condition.</p></div>
</div>

<div class="row">
  <div class="col-xs-5">
    <p align="left">-</p>
    <p align="left">-</p>
    <p align="left"><b>Tel.</b> <?php echo $findvisa->telPermanent; ?> </p>
    <p align="left"><b>Names, dates and places of birth of minor children (if accompanying)</b></p>
        <p align="left"> <?php echo $findvisa->minorChildren; ?> </p>
    <p align="left">-</p>
<p align="left"><b>Date of Arrival in Thailand</b> <?php echo $findvisa->dateOfArrival; ?> </p>
<p align="left"><b>Traveling by</b> <?php echo $findvisa->traveling; ?> </p> 
<p align="left" style="text-indent: 3em;"><b>Flight No. or Vessel's name</b> <?php echo $findvisa->flightNo; ?> </p>
<p align="left"><b>Duration of Proposed Stay</b> <?php echo $findvisa->durationOfProposedStay; ?> </p>
<p align="left"><b>Duration of Previous Visit to Thailand</b> <?php echo $findvisa->dateOfPrevious; ?> </p>
<table class="table">



      <?php if($prefix == "Mr."){ ?>
      <?= Html::img('@frontend/web/images/checked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?>
      <?php }else{ ?>     
      <?= Html::img('@frontend/web/images/unchecked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?><?php } ?><b> Mr. </b>


        <?php $purpose = $findvisa->purposeOfVisit; ?>

        <tr>
            <td> <font size="1"><b>Purpose of visit:</b></font></td>
              <td>  
            <?php if( $purpose == "Tourism" ){ ?>
             <?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Tourism</font> <?php }else{ ?>
            <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Tourism</font> <?php } ?>
              </td>
            <td> 
               <?php if( $purpose == "Transit" ){ ?>
             <?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Transit</font><?php }else{ ?>
                    <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Transit</font><?php } ?>
           </td>
        </tr>
        <tr>
         
            <td> 
               <?php if( $purpose == "Business" ){ ?>
              <?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Business</font><?php }else{ ?>
<?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Business</font><?php } ?>
           </td>


            </td>
            <td>  
<?php if( $purpose == "Diplomatic Official" ){ ?>
              <?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic/Official</font><?php }else{ ?>
              <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic/Official</font><?php } ?>


            </td>
        </tr>
                <tr>
            <td colspan="3"> <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Other (please specify) ______________</font></td>
  
        </tr>
    </table>

  </div>
  <div class="col-xs-6">
    <table class="table" border="1"><tr><td><p align="left">Attention for Tourist and Transit Visas Applicants
    I hereby declare that the purpose of my visit to Thailand
   is for pleasure or transit only and that in no case shall i engage
    myself in my profession or occupation while in the country.</p>
    <p align="left">Signature _____________________Date __________________</p></td></tr></table>
 <table class="table" border="1"><tr><td><p align="left">FOR OFFICIAL USE</p>
    <p align="left">Application/Reference No _____________________________</p>
    <p align="left">Visa No _____________________________</p>
    <p align="left">Type of Visa:</p>
  </td></tr> <table class="table">
        <tr>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic Visa</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Official Visa</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Courtesy Visa</font></td>
        </tr>
                <tr>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Non-Immigrant Visa</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Tourist Visa</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Transit Visa</font></td>
        </tr>
    </table>
    <p align="left">Category of Visa _______________________</p>
     <p align="left">Number of Entries</p>
     <table class="table">
        <tr>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Single</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Double</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Multiple</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> __________Entries</font></td>

        </tr>
    </table>
         <p align="left">Date of Issue _______________ Fee ______________________</p>
         <p align="left">Expiry Date ________________________________________</p>
         <p align="left">Documents Submitttes _________________________________________________</p>
          <p align="left">Authorized Signature and Seal _________________________________________________</p><br>


</table>

  </div>

</div>




<div class="row">
    <div class="col-xs-5"><p align="center" style="border-bottom:1px solid #000;"><b>Tourist Visa: for tourism purpose</b></p></div>
    <div class="col-xs-5"><p>-</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><font size="1" style="border-bottom:1px solid #000;"><b>Basic Documents required:</b></font>
<?php $check = "0";?>

<?php for($i = 0;$i<count($basicdocument);$i++){ ?>
<?php  $basic = $basicdocument[$i]->detail; ?>
<?php if($basic == "passport of travel document of which validity is no less than 6 months"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> passport or travel document of which validity is no less than 6 months</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> passport or travel document of which validity is no less than 6 months</p>
<?php } ?>

<?php $check = "0";?>
<?php for($i = 0;$i<count($basicdocument);$i++){ ?>
<?php  $basic = $basicdocument[$i]->detail; ?>
<?php if($basic == "visa application form completely filled in"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa application form completely filled in</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa application form completely filled in</p>
<?php } ?>



<?php $check = "0";?>
<?php for($i = 0;$i<count($basicdocument);$i++){ ?>
<?php  $basic = $basicdocument[$i]->detail; ?>
<?php if($basic == "2 recent colour photos (3.5 x 4.5 cm.)"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> 2 recent colour photos (3.5 x 4.5 cm.)</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> 2 recent colour photos (3.5 x 4.5 cm.)</p>
<?php } ?>


<?php $check = "0";?>
<?php for($i = 0;$i<count($basicdocument);$i++){ ?>
<?php  $basic = $basicdocument[$i]->detail; ?>
<?php if($basic == "invitation letter (if any)"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> invitation letter (if any)</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> invitation letter (if any)</p>
<?php } ?>




</div>
    <div class="col-xs-5"><p>-</p></div>  
</div>


<div class="row">
    <div class="col-xs-5"><font size="1" style="border-bottom:1px solid #000;"><b>Additional documents for Tourist Visa (Medical tretment)</b></font>
<?php $check = "0";?>
<?php for($i = 0;$i<count($documentapplicant);$i++){ ?>
<?php  $basic = $documentapplicant[$i]->detail; ?>
<?php if($basic == "appointment letter or certificate that applicant requires medical treatment in Thailand"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> appointment letter or certificate that applicant requires medical treatment in Thailand</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> appointment letter or certificate that applicant requires medical treatment in Thailand</p>
<?php } ?>

   
</div>
    <div class="col-xs-5"><p>-</p></div>  
</div>



<div class="row">
    <div class="col-xs-5"><font size="1" style="border-bottom:1px solid #000;"><b>Additional documents for first-time applicant/ holder of new passport</b></font>



<?php $check = "0";?>
<?php for($i = 0;$i<count($documentfirsttime);$i++){ ?>
<?php  $basic = $documentfirsttime[$i]->detail; ?>
<?php if($basic == "letter of employment (for employee) or company registration (for business owner)"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> letter of employment (for employee) or company registration (for business owner)</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> letter of employment (for employee) or company registration (for business owner)</p>
<?php } ?>



<?php $check = "0";?>
<?php for($i = 0;$i<count($documentfirsttime);$i++){ ?>
<?php  $basic = $documentfirsttime[$i]->detail; ?>
<?php if($basic == "invitation letter (if any)"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> invitation letter (if any)</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> invitation letter (if any)</p>
<?php } ?>


<?php $check = "0";?>
<?php for($i = 0;$i<count($documentfirsttime);$i++){ ?>
<?php  $basic = $documentfirsttime[$i]->detail; ?>
<?php if($basic == "evidence of sufficient financial means to visit Thailand (20,000 Baht of 670 USD per person/40,000 Baht or 1,340 USD per family)"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> evidence of sufficient financial means to visit Thailand (20,000 Baht of 670 USD per person/40,000 Baht or 1,340 USD per family)</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> evidence of sufficient financial means to visit Thailand (20,000 Baht of 670 USD per person/40,000 Baht or 1,340 USD per family)</p>
<?php } ?>


<?php $check = "0";?>
<?php for($i = 0;$i<count($documentfirsttime);$i++){ ?>
<?php  $basic = $documentfirsttime[$i]->detail; ?>
<?php if($basic == "confirmed round trip air ticket"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> confirmed round trip air ticket</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> confirmed round trip air ticket</p>
<?php } ?>

<!--       <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> letter of employment (for employee) or company registration (for business owner)</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> invitation letter (if any)</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> evidence of sufficient financial means to visit Thailand <font size="1" style="border-bottom:1px solid #000;"><b>(20,000 Baht or 670 USD per person/ 40,000 Baht or 1,340 USD perfamily)</b></font></p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> confirmed round trip air ticket</p> -->



</div>
    <div class="col-xs-5"><p>-</p></div>  
</div>



<div class="row">
    <div class="col-xs-5"><font size="1" style="border-bottom:1px solid #000;"><b>Additional documents for applicant who has had extension of stay or many entries to Thailand</b></font>


<?php $check = "0";?>
<?php for($i = 0;$i<count($documenttouristvisa);$i++){ ?>
<?php  $basic = $documenttouristvisa[$i]->detail; ?>
<?php if($basic == "letter of employment (for employee) or"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> letter of employment (for employee) or</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> letter of employment (for employee) or</p>
<?php } ?>



<?php $check = "0";?>
<?php for($i = 0;$i<count($documenttouristvisa);$i++){ ?>
<?php  $basic = $documenttouristvisa[$i]->detail; ?>
<?php if($basic == "company registration (for business owner) or"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> company registration (for business owner) or</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> company registration (for business owner) or</p>
<?php } ?>


<?php $check = "0";?>
<?php for($i = 0;$i<count($documenttouristvisa);$i++){ ?>
<?php  $basic = $documenttouristvisa[$i]->detail; ?>
<?php if($basic == "guarantee/ invitation letter from company in Thailand (if any) or"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> guarantee/ invitation letter from company in Thailand (if any) or</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> guarantee/ invitation letter from company in Thailand (if any) or</p>
<?php } ?>


<?php $check = "0";?>
<?php for($i = 0;$i<count($documenttouristvisa);$i++){ ?>
<?php  $basic = $documenttouristvisa[$i]->detail; ?>
<?php if($basic == "receipt or invoice from past procurement (if any)"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> receipt or invoice from past procurement (if any)</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> receipt or invoice from past procurement (if any)</p>
<?php } ?>

      <!-- <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> letter of employment (for employee) or </p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> company registration (for business owner) or</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> guarantee/ invitation letter from company in Thailand (if any) or</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> receipt or invoice from past procurement (if any)</p> -->
</div>
    <div class="col-xs-5"><p>-</p></div>  
</div>



<div class="row">
    <div class="col-xs-5">
          <table class="table" border="1"><tr><td><p align="left" style="text-indent: 3em;"> Consular officer reserves the right to request additional documents or interview as necessary</p>  
    </td></tr></table>
 

    <table class="table" border="1"><tr><td><center><p style="text-indent: 3em;"> Visa process fee: 40 USD per entry</p>
      <p style="text-indent: 3em;"> Non-refundable</p></center> </div> 
    </td></tr></table>
</div>
    <div class="col-xs-5"><p>-</p></div>  
</div>




<div class="row">
    <div class="col-xs-5">
      <p align="center">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
      <p align="left"><b>Transit Visa: for travel through Thailand in order to proceed to the country of destination</b></p>
      <p align="center">____________________________________________________________________</p>
<font size="1" style="border-bottom:1px solid #000;">Documents required:</font>

<?php $check = "0";?>
<?php for($i = 0;$i<count($transitvisathailand);$i++){ ?>
<?php  $basic = $transitvisathailand[$i]->detail; ?>
<?php if($basic == "passport or travel document of which validity is no less than 6 months"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> passport or travel document of which validity is no less than 6 months</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> passport or travel document of which validity is no less than 6 months</p>
<?php } ?>



<?php $check = "0";?>
<?php for($i = 0;$i<count($transitvisathailand);$i++){ ?>
<?php  $basic = $transitvisathailand[$i]->detail; ?>
<?php if($basic == "visa application form completely filled in"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa application form completely filled in</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa application form completely filled in</p>
<?php } ?>



<?php $check = "0";?>
<?php for($i = 0;$i<count($transitvisathailand);$i++){ ?>
<?php  $basic = $transitvisathailand[$i]->detail; ?>
<?php if($basic == "2 recent colour photo (3.5 x 4.5 cm.)"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> 2 recent colour photo (3.5 x 4.5 cm.)</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> 2 recent colour photo (3.5 x 4.5 cm.)</p>
<?php } ?>



<?php $check = "0";?>
<?php for($i = 0;$i<count($transitvisathailand);$i++){ ?>
<?php  $basic = $transitvisathailand[$i]->detail; ?>
<?php if($basic == "visa issued by the country of destination (except traveling to own country)"){ ?>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/checked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa issued by the country of destination (except traveling to own country)</p>
      <?php $check = "1";?>
      <?php break; ?>
<?php } } ?>
<?php if($check == "0"){ ?>
<p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa issued by the country of destination (except traveling to own country)</p>
<?php } ?>
<!--  <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> passport or travel document of which validity is no less than 6 months </p>
  <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa application form completely filled in </p>
   <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> 2 recent colour photos (3.5 x 4.5 cm.) </p>
    <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa issued by the country of destination (except traveling to own country) </p> -->


  <table class="table" border="1"><tr><td><p align="left" style="text-indent: 3em;"> Consular officer reserves the right to request additional documents or interview as necessary</p>  
    </td></tr></table>


    <table class="table" border="1"><tr><td><center><p style="text-indent: 3em;"> Visa process fee: 35 USD per entry</p>
      <p style="text-indent: 3em;"> Non-refundable</p></center> </div> 
    </td></tr></table>
<font size="1" style="border-bottom:1px solid #000;"><b>please complete the application form before the submission</b></font>
    </div>
    <div class="col-xs-5"><p>-</p></div>  
</div>


</div>



