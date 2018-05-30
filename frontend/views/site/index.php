<?php
use yii\db\Query;
use yii\helpers\Html;

$excursions = (new Query())
              ->select(['id', 'excursion', 'position', 'priceMan', 'priceChildren', 'image'])
              ->from('excursion')
              ->all();

?>

<h1>Наши экскурсии: </h1>
<div class="row">
  <?php
    foreach ($excursions as $key) {
      echo "<div class='card .col-sm-1 col-md-12 col-lg-4'>";
      echo "<div class='card-header bg-white'>";
      echo "<h3 class='card-title'>".$key['excursion']."</h3>";
      echo "<h4 class='card-subtitle mb-2 text-muted'>".$key['position']."</h4>";
      echo "</div>";
      echo "<div class='card-body'>";
      echo html::img('@web/'.$key['image'], ['class' => 'card-image', 'width' => '100%']);
      echo "<hr>";
      echo "<div class='card-text'>";
      echo "<p> Цена взрослого: ".$key['priceMan']."&#x20bd;</p>";
      echo "<p> Цена детская: ".$key['priceChildren']."&#x20bd;</p>";
      echo "</div>";
      echo "</div>";
      echo "<div class='card-footer bg-white'>";
      echo Html::a('Посмотреть', ['excursion/', 'id' => $key['id']], ['class' => 'card-link text-danger']);
      echo Html::a('Купить', ['token/', 'id' => $key['id']], ['class' => 'card-link text-success']);
      echo "</div>";
      echo "</div>";
    }
  ?>
</div>
