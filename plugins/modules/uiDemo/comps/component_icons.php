<?php
echo _css(["icons","icons_btns","icons_web"]);
?>
<div class='row'>
	<div class='col-md-12' role='main'>
		<div class="bs-docs-section"> 
			<h1 class="page-header">Supported Font Icons</h1> 
			<div class="bs-example-tabs" data-example-id="togglable-tabs"> 
				<ul id="myTabs" class="nav nav-tabs" role="tablist"> 
					<li role="presentation" class="active"><a href="#bootstrap" id="bootstrap-tab" role="tab" data-toggle="tab" aria-controls="bootstrap" aria-expanded="true">Bootstrap</a></li> 
					<li role="presentation"><a href="#fontawesome" role="tab" id="fontawesome-tab" data-toggle="tab" aria-controls="fontawesome" aria-expanded="false">Fontawesome</a></li> 
					<li role="presentation"><a href="#logiks-icons" role="tab" id="logiks-icons-tab" data-toggle="tab" aria-controls="logiks-icons" aria-expanded="false">Logiks Icons</a></li> 
					<li role="presentation"><a href="#logiks-buttons" role="tab" id="logiks-buttons-tab" data-toggle="tab" aria-controls="logiks-buttons" aria-expanded="false">Logiks Button Icons</a></li> 
					<li role="presentation"><a href="#logiks-web" role="tab" id="logiks-web-tab" data-toggle="tab" aria-controls="logiks-web" aria-expanded="false">Logiks Web Icons</a></li> 
				</ul> 

				<div id="myTabContent" class="tab-content"> 
					<div role="tabpanel" class="tab-pane fade active in" id="bootstrap" aria-labelledby="bootstrap-tab"> 
						<?php
							include_once __DIR__."/icons/bootstrap.htm";
						?>
					</div> 
					<div role="tabpanel" class="tab-pane fade" id="fontawesome" aria-labelledby="fontawesome-tab"> 
						<?php
							include_once __DIR__."/icons/fontawesome.htm";
						?>
					</div>
					<div role="tabpanel" class="tab-pane fade active in" id="logiks-icons" aria-labelledby="logiks-icons-tab"> 
						<?php
							include_once __DIR__."/icons/logiks_icons.htm";
						?>
					</div> 
					<div role="tabpanel" class="tab-pane fade active in" id="logiks-buttons" aria-labelledby="logiks-buttons-tab"> 
						<?php
							include_once __DIR__."/icons/logiks_buttons.htm";
						?>
					</div> 
					<div role="tabpanel" class="tab-pane fade active in" id="logiks-web" aria-labelledby="logiks-web-tab"> 
						<?php
							include_once __DIR__."/icons/logiks_web.htm";
						?>
					</div> 
				</div> 
			</div>
		</div>
	</div>
</div>