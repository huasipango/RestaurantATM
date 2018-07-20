<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CobroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cobros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cobro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

        <div id="payment-stripe" class="container">
      <div class="row text-left">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="cc-number" class="control-label">Credit Card Number <small class="text-muted">[<span data-payment="cc-brand"></span>]</small></label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>                                    
              <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" data-payment='cc-number' required>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <label>Expiration (MM/YYYY)</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••••" data-payment='cc-exp' required>
            </div>
          </div>
        </div>        
        <div class="col-sm-4">
          <div class="form-group">
            <label>CVC Code</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" data-payment='cc-cvc' required>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-primary" type="button" id="validate">Validate</button>
    </div>




</div>









