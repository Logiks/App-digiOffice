<div class='row'>
	<div class='col-md-12' role='main'>
	  <h1 class="page-header">Form Samples</h1> 
    <div class="bs-example-tabs" data-example-id="togglable-tabs"> 
        <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
          <li role="presentation" class="active"><a href="#basic" id="basic-tab" role="tab" data-toggle="tab" aria-controls="basic" aria-expanded="true">Basic</a></li> 
          <li role="presentation" class=""><a href="#inline" role="tab" id="inline-tab" data-toggle="tab" aria-controls="inline" aria-expanded="false">Inline</a></li> 
          <li role="presentation" class=""><a href="#horizontal" role="tab" id="horizontal-tab" data-toggle="tab" aria-controls="horizontal" aria-expanded="false">Horizontal</a></li> 
          <li role="presentation" class=""><a href="#logiks" role="tab" id="logiks-tab" data-toggle="tab" aria-controls="logiks" aria-expanded="false">Logiks Generated</a></li> 
        </ul> 

        <div id="myTabContent" class="tab-content"> 
          <div role="tabpanel" class="tab-pane fade active in" id="basic" aria-labelledby="basic-tab"> 
            <?php
              include_once __DIR__."/forms/basic.htm";
            ?>
          </div> 
          <div role="tabpanel" class="tab-pane fade" id="inline" aria-labelledby="inline-tab"> 
            <?php
              include_once __DIR__."/forms/inline.htm";
            ?>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="horizontal" aria-labelledby="horizontal-tab"> 
            <?php
              include_once __DIR__."/forms/horizontal.htm";
            ?>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="logiks" aria-labelledby="logiks-tab"> 
            <?php
              include_once __DIR__."/forms/logiks_form.php";
            ?>
          </div>
        </div> 
      </div>
  </div>
</div>