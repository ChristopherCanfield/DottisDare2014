<?php
	$clues = Database::getClues($_GET['troop']);
?>	
		<div class="modal fade" id="timeline" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Timeline</h4>
					</div>
					
					<div class="modal-body">
						<ul>
							<li class="ui-state-default" style="background-color:#08684E;"><span class="ui-icon ui-icon-blank"></span>1943 - Dotti Born</li>
						</ul>
						
						<ul id="sortable">
							<?php 
							foreach ($clues as $clue => $description)
							{
								echo 
								'<li id="clue-"' . $clue . '" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
									Clue ' . $clue . '<br>' .
									$description . '</li>';
							}
							?>
						</ul>
						
						<ul>
							<li class="ui-state-default" style="background-color:#08684E;"><span class="ui-icon ui-icon-blank"></span>2010 - Dotti Died</li>
						</ul>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-lg dottisdare" data-dismiss="modal">OK</button>
      				</div>
				</div>
			</div>
		</div>