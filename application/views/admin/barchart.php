 <div class="row">
                             
                            <div class="col-xl-12">
                                <div class="card mb-8">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        District wise registered candidates .
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                                </div>
                            </div>
</div>
<?php
            foreach($bar_chart as $dis)
                  {
                      $bcl[]=$dis->district;
                      $bcv[]=$dis->count;        
                  }
        
        ?>
 <script>
           
            $(document).ready(function() {
                  new charts;  
                  document.char.b_lables=<?=json_encode($bcl);?>;
                  document.char.b_values=<?=json_encode($bcv);?>;
                  document.char.bar_chart();
            });
</script>   