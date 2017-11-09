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

<h6 style="font-size:20px; text-align: center; font-weight:bold; padding-bottom:20px;">.................'S Family Tree</h6> 
<table border="1" width="100%">
  <tr>
    <th colspan="2" align="center">Grand-father</th>
    <th colspan="2" align="center">Grand-mother</th>
    <th colspan="2" align="center">Grand-father</th>
    <th colspan="2" align="center">Grand-mother</th>
  </tr>
  <tr>
    <td colspan="2">
           <div >Name -</div>
           <div>Date of birth -</div>
           <div>Place of birth -</div>
           <div>Race & Nationality -</div>
           <div>N.R.C No. -</div>
           <div>Date of deceased -</div>
           <div>Region (if deceased) -</div>
    </td>
    <td colspan="2">
           <div >Name -</div>
           <div>Date of birth -</div>
           <div>Place of birth -</div>
           <div>Race & Nationality -</div>
           <div>N.R.C No. -</div>
           <div>Date of deceased -</div>
           <div>Region (if deceased) -</div>
    </td>
    <td colspan="2">
           <div >Name -</div>
           <div>Date of birth -</div>
           <div>Place of birth -</div>
           <div>Race & Nationality -</div>
           <div>N.R.C No. -</div>
           <div>Date of deceased -</div>
           <div>Region (if deceased) -</div>
    </td>
    <td colspan="2">
           <div >Name -</div>
           <div>Date of birth -</div>
           <div>Place of birth -</div>
           <div>Race & Nationality -</div>
           <div>N.R.C No. -</div>
           <div>Date of deceased -</div>
           <div>Region (if deceased) -</div>
    </td>

  </tr>
  <tr>
    <th colspan="4" align="center">Father</th>
    <th colspan="4" align="center">Mother</th>

  </tr>
  <tr>
    <td colspan="4">
           <div >Name -</div>
           <div>Date of birth -</div>
           <div>Place of birth -</div>
           <div>Race & Nationality -</div>
           <div>N.R.C No. -</div>
           <div>Occupation -</div>
           <div>Alive of death -</div>
           <div>Address -</div>

    </td>
    <td colspan="4">
           <div >Name -</div>
           <div>Date of birth -</div>
           <div>Place of birth -</div>
           <div>Race & Nationality -</div>
           <div>N.R.C No. -</div>
           <div>Occupation -</div>
           <div>Alive of death -</div>
           <div>Address -</div>

    </td>
  </tr>
  <tr>
    <td colspan="2">safasf</td>
    <td colspan="4">sfasfasf</td>
    <td colspan="2">fsfssf</td>
    
  </tr>
</table>