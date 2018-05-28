<?php
use yii\db\Query;
use yii\helpers\Html;

$excursions = (new Query())
              ->select(['id', 'excursion', 'position', 'priceMan', 'priceChildren'])
              ->from('excursion')
              ->all();

?>

<h1>Наши экскурсии: </h1>
<div class="row">
  <?php
    foreach ($excursions as $key) {
      echo "<div class='card col-md-6 col-lg-6 mt-4'>";
      echo "<div class='card-header bg-white'>";
      echo "<h3 class='card-title'>".$key['excursion']."</h3>";
      echo "<h4 class='card-subtitle mb-2 text-muted'>".$key['position']."</h4>";
      echo "</div>";
      echo "<div class='card-body'>";
      echo "<div class='card-text'>";
      echo "<p> Цена взрослого: ".$key['priceMan']."&#x20bd;</p>";
      echo "<p> Цена детская: ".$key['priceChildren']."&#x20bd;</p>";
      echo "</div>";
      echo "</div>";
      echo "<div class='card-footer bg-white'>";
      echo Html::a('Посмотреть', ['excursion/view', 'id' => $key['id']], ['class' => 'card-link text-danger']);
      echo "</div>";
      echo "</div>";
    }
  ?>
</div>
