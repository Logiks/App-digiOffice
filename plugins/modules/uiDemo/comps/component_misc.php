<?php
echo _css(['colors']);
?>
<div class='row'>
	<div class='col-md-12' role='main'>
		<div class="bs-docs-section"> 
			<h1 class="page-header">Logiks Misc</h1> 

			<div class="bs-example-tabs" data-example-id="togglable-tabs"> 
	        <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
	          <li role="presentation" class="active"><a href="#ajax" id="ajax-tab" role="tab" data-toggle="tab" aria-controls="ajax" aria-expanded="true">Loaders</a></li> 
	          <li role="presentation"><a href="#colors" id="colors-tab" role="tab" data-toggle="tab" aria-controls="colors" aria-expanded="true">Colors</a></li> 
	        </ul> 

	        <div id="myTabContent" class="tab-content"> 
	          <div role="tabpanel" class="tab-pane fade active in" id="ajax" aria-labelledby="ajax-tab"> 
	            <?php
	              include_once __DIR__."/misc/ajax.htm";
	            ?>
	          </div> 
	          <div role="tabpanel" class="tab-pane fade in" id="colors" aria-labelledby="colors-tab"> 
	            <?php
	              include_once __DIR__."/misc/colors.htm";
	            ?>
	          </div> 
	        </div> 
	      </div>
		</div>
	</div>
</div>