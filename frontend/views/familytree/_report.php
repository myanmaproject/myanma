<?php
use app\models\Familytree;

$fathername = "";
$grandFather_fathername= "";
$grandMother_fathername= "";
$mothername= "";
$grandFather_mothername= "";
$grandMother_mothername= "";

if ($familytree->father!=null) {
        $father = Familytree::find()->where(['idfamilytree' => $familytree->father])->one();
        $fathername = $father->name;

        if ($father->father != null) {
            $grandFather_father = Familytree::find()->where(['idfamilytree' => $father->father])->one();
        $grandFather_fathername = $grandFather_father->name;

        }
        if ($father->mother != null) {
            $grandMother_father = Familytree::find()->where(['idfamilytree' => $father->mother])->one();
        $grandMother_fathername = $grandFather_father->name;

        }
            
    }

    if ($familytree->mother!=null) {
        $mother = Familytree::find()->where(['idfamilytree' => $familytree->mother])->one();
        $mothername = $mother->name;
        if ($mother->mother != null) {
            $grandFather_mother = Familytree::find()->where(['idfamilytree' => $mother->father])->one();
            $grandFather_mothername = $grandFather_mother->name;
        }
        if ($mother->mother != null) {
            $grandMother_mother = Familytree::find()->where(['idfamilytree' => $mother->mother])->one();
            $grandMother_mothername = $grandFather_mother->name;

        }   
    }
?>

<h6 style="font-size:20px; text-align: center; font-weight:bold; padding-bottom:20px;"><?php echo $familytree->familytree;?>'S Family Tree</h6> 
<table width="100%">
  <tr >
    <th colspan="2" align="center">Grand-father</th>
    <th colspan="2" align="center">Grand-mother</th>
    <th colspan="2" align="center">Grand-father</th>
    <th colspan="2" align="center">Grand-mother</th>
  </tr>
  <tr>
    <td colspan="2">
      <table >
        <tr>
          <td>Name - <?php echo $grandFather_fathername;?></td>
        </tr>
        <tr>
          <td>Date of birth - <?php if($grandFather_father!=null){echo $grandFather_father->dateOfBirth;}?></td>
        </tr>
        <tr>
          <td>Place of birth - <?php if($grandFather_father!=null){echo $grandFather_father->placeOfBirth;}?></td>
        </tr>
        <tr>
          <td>Race & Nationality - <?php if($grandFather_father!=null){echo $grandFather_father->raceNationality;}?></td>
        </tr>
        <tr>
          <td>N.R.C No. - <?php if($grandFather_father!=null){echo $grandFather_father->nrc;}?></td>
        </tr>
        <tr>
          <td>Date of deceased - ????????</td>
        </tr>
        <tr>
          <td>Region (if deceased) -<?php if($grandFather_father!=null){echo $grandFather_father->region;}?></td>
        </tr>
        
      </table>

          
    </td>
    <td colspan="2">
           <table >
        <tr>
          <td>Name - <?php echo $grandMother_fathername;?></td>
        </tr>
        <tr>
          <td>Date of birth - <?php if($grandMother_father!=null){echo $grandMother_father->dateOfBirth;}?></td>
        </tr>
        <tr>
          <td>Place of birth - <?php if($grandMother_father!=null){echo $grandMother_father->placeOfBirth;}?></td>
        </tr>
        <tr>
          <td>Race & Nationality - <?php if($grandMother_father!=null){echo $grandMother_father->raceNationality;}?></td>
        </tr>
        <tr>
          <td>N.R.C No. - <?php if($grandMother_father!=null){echo $grandMother_father->nrc;}?></td>
        </tr>
        <tr>
          <td>Date of deceased - ????????</td>
        </tr>
        <tr>
          <td>Region (if deceased) -<?php if($grandMother_father!=null){echo $grandMother_father->region;}?></td>
        </tr>
        
      </table>
    </td>
    <td colspan="2">
           <table >
        <tr>
          <td>Name - <?php echo $grandFather_mothername;?></td>
        </tr>
        <tr>
          <td>Date of birth - <?php if($grandFather_mother!=null){echo $grandFather_mother->dateOfBirth;}?></td>
        </tr>
        <tr>
          <td>Place of birth - <?php if($grandFather_mother!=null){echo $grandFather_mother->placeOfBirth;}?></td>
        </tr>
        <tr>
          <td>Race & Nationality - <?php if($grandFather_mother!=null){echo $grandFather_mother->raceNationality;}?></td>
        </tr>
        <tr>
          <td>N.R.C No. - <?php if($grandFather_mother!=null){echo $grandFather_mother->nrc;}?></td>
        </tr>
        <tr>
          <td>Date of deceased - ????????</td>
        </tr>
        <tr>
          <td>Region (if deceased) -<?php if($grandFather_mother!=null){echo $grandFather_mother->region;}?></td>
        </tr>
        
      </table>

    </td>
    <td colspan="2">
          <table >
        <tr>
          <td>Name - <?php echo $grandMother_mothername;?></td>
        </tr>
        <tr>
          <td>Date of birth - <?php if($grandMother_mother!=null){echo $grandMother_mother->dateOfBirth;}?></td>
        </tr>
        <tr>
          <td>Place of birth - <?php if($grandMother_mother!=null){echo $grandMother_mother->placeOfBirth;}?></td>
        </tr>
        <tr>
          <td>Race & Nationality - <?php if($grandMother_mother!=null){echo $grandMother_mother->raceNationality;}?></td>
        </tr>
        <tr>
          <td>N.R.C No. - <?php if($grandMother_mother!=null){echo $grandMother_mother->nrc;}?></td>
        </tr>
        <tr>
          <td>Date of deceased - ????????</td>
        </tr>
        <tr>
          <td>Region (if deceased) -<?php if($grandMother_mother!=null){echo $grandMother_mother->region;}?></td>
        </tr>
        
      </table>
    </td>

  </tr>
  <tr >
    <th colspan="4" align="center" height="50px">Father</th>
    <th colspan="4" align="center">Mother</th>

  </tr>
  <tr>
    <td colspan="4">
      <table align="center" width="50%">
        <tr>
          <td>Name - <?php echo $fathername;?></td>
        </tr>
        <tr>
          <td>Date of birth - <?php if($father!=null){echo $father->dateOfBirth;}?></td>
        </tr>
        <tr>
          <td>Place of birth - <?php if($father!=null){echo $father->placeOfBirth;}?></td>
        </tr>
        <tr>
          <td>Race & Nationality - <?php if($father!=null){echo $father->raceNationality;}?></td>
        </tr>
        <tr>
          <td>N.R.C No. - <?php if($father!=null){echo $father->nrc;}?></td>
        </tr>
        <tr>
          <td>Occupation - <?php if($father!=null){echo $father->occupation;}?></td>
        </tr>
        <tr>
          <td>Alive of death - <?php if($father!=null){echo $father->aliveOrDeath;}?></td>
        </tr>
        <tr>
          <td>Address - <?php if($father!=null){echo $father->address;}?></td>
        </tr>
      </table>
        

    </td>
    <td colspan="4">
           <table align="center" width="50%">
        <tr>
          <td>Name - <?php echo $mothername;?></td>
        </tr>
        <tr>
          <td>Date of birth - <?php if($mother!=null){echo $mother->dateOfBirth;}?></td>
        </tr>
        <tr>
          <td>Place of birth - <?php if($mother!=null){echo $mother->placeOfBirth;}?></td>
        </tr>
        <tr>
          <td>Race & Nationality - <?php if($mother!=null){echo $mother->raceNationality;}?></td>
        </tr>
        <tr>
          <td>N.R.C No. - <?php if($mother!=null){echo $mother->nrc;}?></td>
        </tr>
        <tr>
          <td>Occupation - <?php if($mother!=null){echo $mother->occupation;}?></td>
        </tr>
        <tr>
          <td>Alive of death - <?php if($mother!=null){echo $mother->aliveOrDeath;}?></td>
        </tr>
        <tr>
          <td>Address - <?php if($mother!=null){echo $mother->address;}?></td>
        </tr>
      </table>

    </td>
  </tr>
  <tr>
    <th colspan="2" height="50px">Signtaure of entry person</th>
    <th colspan="4" align="center">Son/Daughter<br>(Applicant)</th>

    <th colspan="2">Signature of Applicant</th>

  </tr>
  <tr>
    <td colspan="2">
      <table width="100%">
          
          <tr>
            <td>Name - <dottab></td>
          </tr>
          <tr>
            <td>Rank - <dottab><td>
          </tr>
          <tr>
            <td>Township - <dottab></td>
          </tr>
          <tr>
            <td>N.R.C No. - <dottab></td>
          </tr>
          <tr>
            <td>State/Division/District - <dottab></td>
          </tr>
          <tr>
            <td>Date - <dottab></td>
          </tr>
          
        </table>


    </td>

    <td colspan="4" >
      <table align="center">
        <tr>
          <td>Name - <?php echo $familytree->name;?></td>
        </tr>
        <tr>
          <td>Date of birth - <?php echo $familytree->dateOfBirth;?></td>
        </tr>
        <tr>
          <td>Place of birth - <?php echo $familytree->placeOfBirth;?></td>
        </tr>
        <tr>
          <td>Race & Nationality - <?php echo $familytree->raceNationality;?></td>
        </tr>
        <tr>
          <td>N.R.C No. - <?php echo $familytree->nrc;?></td>
        </tr>
        <tr>
          <td>Occupation <?php echo $familytree->occupation;?></td>
        </tr>
        <tr>
          <td>Address - <?php echo $familytree->address;?></td>
        </tr>
        
      </table>
    </td>
    <td colspan="2" valign="top">
      <table width="100%">
        
        <tr>
          <td>Name - <dottab></td>
        </tr>
                
      </table>
    </td>
    
  </tr>
</table>