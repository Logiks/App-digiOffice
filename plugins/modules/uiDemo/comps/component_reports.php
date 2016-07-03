<div class='row'>
	<div class='col-md-12' role='main'>
		<div class="bs-docs-section"> 
			<h1 class="page-header">Reports & Tables</h1> 

			<div class="bs-example-tabs" data-example-id="togglable-tabs"> 
	        <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
	          <li role="presentation" class="active"><a href="#table" id="table-tab" role="tab" data-toggle="tab" aria-controls="table" aria-expanded="true">Tables</a></li> 
	        </ul> 

	        <div id="myTabContent" class="tab-content"> 
	          <div role="tabpanel" class="tab-pane fade active in" id="table" aria-labelledby="table-tab"> 
	            <?php
	              include_once __DIR__."/reports/table.htm";
	            ?>
	          </div> 
	        </div> 
	      </div>
		</div>
	</div>
</div>