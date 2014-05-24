<?php
	$clues = Database::getClues($_GET['troop']);
	define(CLUE_COUNT, 12);
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
							foreach ($clues as $id => $clue)
							{
								echo 
								'<li id="clue_' . $id . '" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
									Clue ' . $id . '<br>' .
									$clue->getDescription() . '</li>';
							}
							?>
						</ul>
						
						<ul>
							<li class="ui-state-default" style="background-color:#08684E;"><span class="ui-icon ui-icon-blank"></span>2010 - Dotti Died</li>
						</ul>
					</div>
					
					<div class="modal-footer">
						<?php
							if (count($clues) == CLUE_COUNT)
							{
								$submit = Database::getTimelineSubmitted($troopId);
								$submitButtonText = ($submit == true) ? 'Submit' : 'Unsubmit';
								
								echo
								'<button type="submit" id="submitTimeline" class="btn btn-primary btn-lg dottisdare" 
									onclick="submitTimeline("' . $troop . '", ' . $submit . ')">'. $submitButtonText . '</button>';
							}
						?>
						<button type="submit" class="btn btn-primary btn-lg dottisdare" data-dismiss="modal">OK</button>
      				</div>
				</div>
			</div>
		</div>