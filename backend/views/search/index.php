
<?php echo \yii\helpers\Html::input('text', 'query', '', ['class' => 'form-control', 'style' => 'width:40%', 'placeholder' => 'Search Query']);?>
<div class="row width40 search-btns">
    <div class="col-md-3">
        <?php echo \yii\helpers\Html::button('Default Search', ['class' => 'btn btn-success search-btn', 'data-search-class' => 'DefaultSearch'])?>
    </div>
    <div class="col-md-3">
        <?php echo \yii\helpers\Html::button('Sphinx Search', ['class' => 'btn btn-success search-btn', 'data-search-class' => 'SphinxSearch'])?>
    </div>
    <div class="col-md-3">
        <?php echo \yii\helpers\Html::button('Elastic Search', ['class' => 'btn btn-success  search-btn', 'data-search-class' => 'ElasticSearch'])?>
    </div>
</div>

<div class="search-results">

</div>
