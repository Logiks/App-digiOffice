<?php
echo _css(["bootstrap.datetimepicker"]);
echo _js(["moment","bootstrap.datetimepicker"]);
?>
<div class='row'>
	<div class='col-md-12' role='main'>
		<div class="bs-docs-section"> 
			<h1 class="page-header">Components</h1> 
			<div class="bs-example-tabs" data-example-id="togglable-tabs"> 
				<ul id="myTabs" class="nav nav-tabs" role="tablist"> 
					<li role="presentation" class="active"><a href="#buttons" role="tab" id="buttons-tab" data-toggle="tab" aria-controls="buttons" aria-expanded="false">Buttons</a></li> 
					<li role="presentation"><a href="#accordion" id="accordion-tab" role="tab" data-toggle="tab" aria-controls="accordion" aria-expanded="true">Accordion</a></li> 
					<li role="presentation"><a href="#dropdowns" id="dropdowns-tab" role="tab" data-toggle="tab" aria-controls="dropdowns" aria-expanded="true">Dropdowns</a></li> 
					<li role="presentation" class=""><a href="#modals" role="tab" id="modals-tab" data-toggle="tab" aria-controls="modals" aria-expanded="false">Modals</a></li> 
					<li role="presentation"><a href="#breadcrumbs" id="breadcrumbs-tab" role="tab" data-toggle="tab" aria-controls="breadcrumbs" aria-expanded="true">Breadcrumbs</a></li> 
					<li role="presentation"><a href="#datepicker" id="datepicker-tab" role="tab" data-toggle="tab" aria-controls="datepicker" aria-expanded="true">Datepicker</a></li> 
					<li role="presentation"><a href="#misc" id="misc-tab" role="tab" data-toggle="tab" aria-controls="misc" aria-expanded="true">Misc</a></li> 
				</ul> 

				<div id="myTabContent" class="tab-content"> 
					<div role="tabpanel" class="tab-pane fade active in" id="buttons" aria-labelledby="buttons-tab"> 
						<?php
							include_once __DIR__."/components/buttons.htm";
						?>
					</div> 
					<div role="tabpanel" class="tab-pane fade" id="accordion" aria-labelledby="accordion-tab"> 
						<?php
							include_once __DIR__."/components/accordion.htm";
						?>
					</div>
					<div role="tabpanel" class="tab-pane fade in" id="dropdowns" aria-labelledby="dropdowns-tab"> 
						<?php
							include_once __DIR__."/components/dropdowns.htm";
						?>
					</div> 
					<div role="tabpanel" class="tab-pane fade" id="modals" aria-labelledby="modals-tab"> 
						<?php
							include_once __DIR__."/components/modals.htm";
						?>
					</div>
					<div role="tabpanel" class="tab-pane fade in" id="breadcrumbs" aria-labelledby="breadcrumbs-tab"> 
						<?php
							include_once __DIR__."/components/breadcrumbs.htm";
						?>
					</div> 
					<div role="tabpanel" class="tab-pane fade in" id="datepicker" aria-labelledby="datepicker-tab"> 
						<?php
							include_once __DIR__."/components/datepicker.htm";
						?>
					</div> 
					<div role="tabpanel" class="tab-pane fade in" id="misc" aria-labelledby="misc-tab"> 
						<?php
							include_once __DIR__."/components/misc.htm";
						?>
					</div> 
				</div> 
			</div>
		</div>
	</div>
</div>