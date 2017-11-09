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

<h6 style="font-size:20px; text-align: center; font-weight:bold; padding-bottom:20px;">Family Tree</h6> 

<table border="1" width="100%">
  <tr>
    <th rowspan="2">No.</th>
    <th rowspan="2">Status </th>
    <th width="15%">Nrc</th>
    <th rowspan="2" width="18%">Address</th>
    <th rowspan="2" width="10%">Date Of Birth</th>
    <th rowspan="2" width="18%">Place Of Birth</th>
    <th width="7%">Race</th>
    <th rowspan="2" width="10%">Occupation</th>
    <th width="15%">Father</th>

  </tr>
  <tr>
    <th>Name</th>
    <th>Region</th>
    <th>Mother</th>

  </tr>

<?php 
$i = 1 ;
  if($grandFather_father!=null){
?>
  <tr>
    <td rowspan="2"><?php echo $i;?></td>
    <td rowspan="2"><?php echo $grandFather_father->aliveOrDeath;?></td>
    <td><?php echo $grandFather_father->nrc;?></td>
    <td rowspan="2"><?php echo $grandFather_father->address;?></td>
    <td rowspan="2"><?php echo $grandFather_father->dateOfBirth;?></td>
    <td rowspan="2"><?php echo $grandFather_father->placeOfBirth;?></td>
    <td><?php echo $grandFather_father->raceNationality;?></td>
    <td rowspan="2"><?php echo $grandFather_father->occupation;?></td>
    <td><?php echo $grandFather_father->father;?></td>
  </tr>
  <tr>
    <td><?php echo $grandFather_father->name;?></td>
    <td><?php echo $grandFather_father->region;?></td>
    <td><?php echo $grandFather_father->mother;?></td>
  </tr>
<?php
  $i++;
  } 
  if($grandMother_father!=null){
?>
<tr>
    <td rowspan="2"><?php echo $i;?></td>
    <td rowspan="2"><?php echo $grandMother_father->aliveOrDeath;?></td>
    <td ><?php echo $grandMother_father->nrc;?></td>
    <td rowspan="2"><?php echo $grandMother_father->address;?></td>
    <td rowspan="2"><?php echo $grandMother_father->dateOfBirth;?></td>
    <td rowspan="2"><?php echo $grandMother_father->placeOfBirth;?></td>
    <td><?php echo $grandMother_father->raceNationality;?></td>
    <td rowspan="2"><?php echo $grandMother_father->occupation;?></td>
    <td ><?php echo $grandMother_father->father;?></td>
  </tr>
  <tr>
    <td><?php echo $grandMother_father->name;?></td>
    <td><?php echo $grandMother_father->region;?></td>
    <td><?php echo $grandMother_father->mother;?></td>
  </tr>
<?php
  $i++;
  } 
  if($grandFather_mother!=null){
?>
<tr>
    <td rowspan="2"><?php echo $i;?></td>
    <td rowspan="2"><?php echo $grandFather_mother->aliveOrDeath;?></td>
    <td><?php echo $grandFather_mother->nrc;?></td>
    <td rowspan="2"><?php echo $grandFather_mother->address;?></td>
    <td rowspan="2"><?php echo $grandFather_mother->dateOfBirth;?></td>
    <td rowspan="2"><?php echo $grandFather_mother->placeOfBirth;?></td>
    <td><?php echo $grandFather_mother->raceNationality;?></td>
    <td rowspan="2"><?php echo $grandFather_mother->occupation;?></td>
    <td><?php echo $grandFather_mother->father;?></td>
  </tr>
  <tr>
    <td><?php echo $grandFather_mother->name;?></td>
    <td><?php echo $grandFather_mother->region;?></td>
    <td><?php echo $grandFather_mother->mother;?></td>
  </tr>
<?php
  $i++;
  } 
  if($grandMother_father!=null){
?>
<tr>
    <td rowspan="2"><?php echo $i;?></td>
    <td rowspan="2"><?php echo $grandMother_mother->aliveOrDeath;?></td>
    <td><?php echo $grandMother_mother->nrc;?></td>
    <td rowspan="2"><?php echo $grandFather_father->address;?></td>
    <td rowspan="2"><?php echo $grandMother_mother->dateOfBirth;?></td>
    <td rowspan="2"><?php echo $grandMother_mother->placeOfBirth;?></td>
    <td><?php echo $grandMother_mother->raceNationality;?></td>
    <td rowspan="2"><?php echo $grandMother_mother->occupation;?></td>
    <td><?php echo $grandMother_mother->father;?></td>
  </tr>
  <tr>
    <td><?php echo $grandMother_mother->name;?></td>
    <td><?php echo $grandMother_mother->region;?></td>
    <td><?php echo $grandMother_mother->mother;?></td>
  </tr>
<?php
  $i++;
  } 
  if($father!=null){
?>
<tr>
    <td rowspan="2"><?php echo $i;?></td>
    <td rowspan="2"><?php echo $father->aliveOrDeath;?></td>
    <td><?php echo $father->nrc;?></td>
    <td rowspan="2"><?php echo $father->address;?></td>
    <td rowspan="2"><?php echo $father->dateOfBirth;?></td>
    <td rowspan="2"><?php echo $father->placeOfBirth;?></td>
    <td><?php echo $father->raceNationality;?></td>
    <td rowspan="2"><?php echo $father->occupation;?></td>
    <td><?php echo $grandFather_fathername;?></td>
  </tr>
  <tr>
    <td><?php echo $father->name;?></td>
    <td><?php echo $father->region;?></td>
    <td><?php echo $grandMother_fathername;?></td>
  </tr>
<?php
  $i++;
  } 
  if($mother!=null){
?>
<tr>
    <td rowspan="2"><?php echo $i;?></td>
    <td rowspan="2"><?php echo $mother->aliveOrDeath;?></td>
    <td><?php echo $mother->nrc;?></td>
    <td rowspan="2"><?php echo $mother->address;?></td>
    <td rowspan="2"><?php echo $mother->dateOfBirth;?></td>
    <td rowspan="2"><?php echo $mother->placeOfBirth;?></td>
    <td><?php echo $mother->raceNationality;?></td>
    <td rowspan="2"><?php echo $mother->occupation;?></td>
    <td><?php echo $grandMother_mothername;?></td>
  </tr>
  <tr>
    <td><?php echo $mother->name;?></td>
    <td><?php echo $mother->region;?></td>
    <td><?php echo $grandFather_mothername;?></td>
  </tr>
<?php
  $i++;
  } 
  if($familytree!=null){
?>
<tr>
    <td rowspan="2"><?php echo $i;?></td>
    <td rowspan="2"><?php echo $familytree->aliveOrDeath;?></td>
    <td><?php echo $familytree->nrc;?></td>
    <td rowspan="2"><?php echo $familytree->address;?></td>
    <td rowspan="2"><?php echo $familytree->dateOfBirth;?></td>
    <td rowspan="2"><?php echo $familytree->placeOfBirth;?></td>
    <td><?php echo $familytree->raceNationality;?></td>
    <td rowspan="2"><?php echo $familytree->occupation;?></td>
    <td><?php echo $fathername;?></td>
  </tr>
  <tr>
    <td><?php echo $familytree->name;?></td>
    <td><?php echo $familytree->region;?></td>
    <td><?php echo $mothername;?></td>
  </tr>
<?php
  } 
?>

</table>
