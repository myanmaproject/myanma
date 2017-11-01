<?php

use yii\helpers\Html;
use frontend\models\Typeofvisa;
?>
<div class="row">
    <div class="col-xs-2"><?= Html::img('@frontend/web/images/ex.png',['alt'=>'d','width'=>'120','height'=>'120','align'=>'center'])  ?></div>
    <div class="col-xs-5" align="center"><?= Html::img('@frontend/web/images/Thai_government.png',['width'=>'120','height'=>'120','align'=>'center'])  ?>
        <br><p align="center">APPLICATION FOR VISA</p>
        <p align="center">Ministry of Forecign Affairs of Thailand</p></div>
    <div class=""><p><font size="1"><b>Please Indicate Type of Visa Requested</b></font></p>
      <?php $type = Typeofvisa::find()->all(); 
            $alltype = count($type); 
            for($i = 0; $i < $alltype; $i++){ 
              ?>
      <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center']) ?><?= $type[$i]->name; ?>  <br/>
        <?php } ?>
<br/>
      <p><b>Number of Entries Requested _________________</b></font></p>
</div>

<div class="row">
    <div class="col-xs-12"><?= Html::img('@frontend/web/images/unchecked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?> Mr. 
      <?= Html::img('@frontend/web/images/unchecked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?> Mrs.
      <?= Html::img('@frontend/web/images/unchecked.png',['alt'=>'d','width'=>'20','height'=>'20','align'=>'center'])  ?> Miss ______________________________________________________________________________________</div>
</div>
<div class="row">
    <div class="col-xs-4"><p align="right">First Name</p></div>
     <div class="col-xs-2"><p>Middle Name</p></div>
      <div class="col-xs-2"><p>Family Name</p></div>
       <div class="col-xs-2"><p>(in BLOCK letters)</p></div>
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">First Name _________________________________________________________</p></div>
    <div class="col-xs-5"><p>Countries for which travel document is valid</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Nationality _________________________________________________________</p></div>
    <div class="col-xs-6"><p>__________________________________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Nationality at Birth ________________________________________________</p></div>
    <div class="col-xs-6"><p>Proposed Address in Thailand ___________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Birth Place ______________________Marial Status _____________________</p></div>
    <div class="col-xs-6"><p>__________________________________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Date of Birth ___________________________________</p></div>
    <div class="col-xs-6"><p>__________________________________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Father's name _________________________________</p></div>
    <div class="col-xs-6"><p>Name and Address of Local Guarantor</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Type of Travel Document ______________________</p></div>
    <div class="col-xs-6"><p>__________________________________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">No. ____________________Issued at _______________</p></div>
    <div class="col-xs-6"><p>_________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Date of Issue ___________Expiry Date ___________</p></div>
    <div class="col-xs-6"><p>Tel/Fax _________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Occupation (specify present position and name of employer)</p></div>
    <div class="col-xs-6"><p>Name and Address of Guarantor in Thailand</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">________________________________________________</p></div>
    <div class="col-xs-6"><p>_________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">________________________________________________</p></div>
    <div class="col-xs-6"><p>_________________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Current Address ________________________________</p></div>
    <div class="col-xs-6"><p>Tel/Fax _________________________________________________</p></div>  
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">________________________________________________</p></div>
    <div class="col-xs-6"><p>I hereby declare that i will not request any refund from my paid visa fee even even if my application has been declined.</p></div>
</div>

<div class="row">
    <div class="col-xs-5"><p align="left">Tel _____________________E-mail ________________</p></div>
    <div class="col-xs-6"><p>Signature ______________________Date __________________</p></div>
</div>

<div class="row">
    <div class="col-xs-5 "><p align="left">Permanent Address (if different from above)__________________________________________</p></div>
    <div class="col-xs-6"><p>Note: Royal Thai Embassy reserves the right to accept only new bank notes (Large Head) in very good condition.</p></div>
</div>

<div class="row">
  <div class="col-xs-5">
    <p align="left">________________________________________________</p>
    <p align="left">________________________________________________</p>
    <p align="left">Tel. ____________________________________________</p>
    <p align="left">Names, dates and places of birth of minor children (if accompanying)</p>
        <p align="left">________________________________________________</p>
    <p align="left">________________________________________________</p>
<p align="left">Date of Arrival in Thailand _________________________</p>
<p align="left">Traveling by ___________________________________________</p>
<p align="left" style="text-indent: 3em;">Flight No. or Vessel's name _________________________________</p>
<p align="left">Duration of Proposed Stay ________________________________________</p>
<p align="left">Duration of Previous Visit to Thailand ___________________________</p>
<table class="table">
        <tr>
            <td> <font size="1">Purpose of visit:</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Double</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Multiple</font></td>
        </tr>
        <tr>
            <td> <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Business</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic/Official</font></td>
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
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic Visa</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic Visa</font></td>
        </tr>
                <tr>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic Visa</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic Visa</font></td>
            <td>  <?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?><font size="1"> Diplomatic Visa</font></td>
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
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> passport or travel document of which validity is no less than 6 months</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa application form completely filled in</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> 2 recent colour photos ( 3.5 x 4.5 cm.)</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> invation letter (if any)</p>
</div>
    <div class="col-xs-5"><p>-</p></div>  
</div>


<div class="row">
    <div class="col-xs-5"><font size="1" style="border-bottom:1px solid #000;"><b>Additional documents for Tourist Visa (Medical tretment)</b></font>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> appointment letter or certificate that applicant requires medical tretment in ThailandS</p>
</div>
    <div class="col-xs-5"><p>-</p></div>  
</div>



<div class="row">
    <div class="col-xs-5"><font size="1" style="border-bottom:1px solid #000;"><b>Additional documents for first-time applicant/ holder of new passport</b></font>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> letter of employment (for employee) or company registration (for business owner)</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> invitation letter (if any)</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> evidence of sufficient financial means to visit Thailand <font size="1" style="border-bottom:1px solid #000;"><b>(20,000 Baht or 670 USD per person/ 40,000 Baht or 1,340 USD perfamily)</b></font></p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> confirmed round trip air ticket</p>
</div>
    <div class="col-xs-5"><p>-</p></div>  
</div>



<div class="row">
    <div class="col-xs-5"><font size="1" style="border-bottom:1px solid #000;"><b>Additional documents for applicant who has had extension of stay or many entries to Thailand</b></font>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> letter of employment (for employee) or </p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> company registration (for business owner) or</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> guarantee/ invitation letter from company in Thailand (if any) or</p>
      <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> receipt or invoice from past procurement (if any)</p>
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
 <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> passport or travel document of which validity is no less than 6 months </p>
  <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa application form completely filled in </p>
   <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> 2 recent colour photos (3.5 x 4.5 cm.) </p>
    <p align="left" style="text-indent: 3em;"><?= Html::img('@frontend/web/images/unchecked.png',['width'=>'20','height'=>'20','align'=>'center'])  ?> visa issued by the country of destination (except traveling to own country) </p>

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



