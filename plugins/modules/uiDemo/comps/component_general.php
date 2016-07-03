<div class='row'>
	<div class='col-md-12' role='main'>
	  <h1 class="page-header">General</h1> 
	  <div class="bs-example-tabs" data-example-id="togglable-tabs"> 
        <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
          <li role="presentation" class="active"><a href="#typography" id="typography-tab" role="tab" data-toggle="tab" aria-controls="typography" aria-expanded="true">Typography</a></li> 
          <li role="presentation" class=""><a href="#lists" role="tab" id="lists-tab" data-toggle="tab" aria-controls="lists" aria-expanded="false">Lists</a></li> 
          <li role="presentation" class=""><a href="#code" role="tab" id="code-tab" data-toggle="tab" aria-controls="code" aria-expanded="false">Code</a></li> 
          <li role="presentation" class=""><a href="#images" role="tab" id="images-tab" data-toggle="tab" aria-controls="images" aria-expanded="false">Images</a></li> 
          <li role="presentation" class=""><a href="#misc" role="tab" id="misc-tab" data-toggle="tab" aria-controls="misc" aria-expanded="false">Misc</a></li> 
          <li role="presentation" class=""><a href="#embed" role="tab" id="embed-tab" data-toggle="tab" aria-controls="embed" aria-expanded="false">Embed</a></li> 
        </ul> 

        <div id="myTabContent" class="tab-content"> 
          <div role="tabpanel" class="tab-pane fade active in" id="typography" aria-labelledby="typography-tab"> 
            <?php
              include_once __DIR__."/general/typography.htm";
            ?>
          </div> 
          <div role="tabpanel" class="tab-pane fade" id="lists" aria-labelledby="lists-tab"> 
            <?php
              include_once __DIR__."/general/lists.htm";
            ?>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="code" aria-labelledby="code-tab"> 
            <?php
              include_once __DIR__."/general/code.htm";
            ?>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="images" aria-labelledby="images-tab"> 
            <?php
              include_once __DIR__."/general/images.htm";
            ?>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="misc" aria-labelledby="misc-tab"> 
            <?php
              include_once __DIR__."/general/misc.htm";
            ?>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="embed" aria-labelledby="embed-tab"> 
            <?php
              include_once __DIR__."/general/embed.htm";
            ?>
          </div>
        </div> 
      </div>
	</div>
</div>