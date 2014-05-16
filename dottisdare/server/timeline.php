<?php
	$clues = Database::getClues($_GET['troop']);
?>	
		<div class="modal fade" id="timeline" tabindex="-1" role="dialog" aria-labelledby="Timeline" aria-hidden="true">
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
							foreach ($clues as $clue => $timeline)
							{
								if ($clue == 173)
								{
									echo
									'<li id="clue-173" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 173<br>
										Dotti was left stranded on a rock in the middle of a raging river while whitewater rafting with her Senior Troop.</li>';
								}
								
								if ($clue == 178)
								{
									echo
									'<li id="clue-178" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 178<br>
										Dotti became a leader of an intermediate troop.</li>';
								}
								
								if ($clue == 217)
								{
									echo
									'<li id="clue-217" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 217<br>
										Dotti began working for Girl Scouts.</li>';
								}
								
								if ($clue == 218)
								{
									echo
									'<li id="clue-218" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 218<br>
										Dotti became her council\'s delegate for the Girl Scout National Convention. She would reprise this role many times.</li>';
								}

								if ($clue == 249)
								{
									echo
									'<li id="clue-249" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 249<br>
										Dotti joined the Lansdale Ambulance Corp.</li>';
								}
								
								if ($clue == 266)
								{
									echo
									'<li id="clue-267" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 267<br>
										Dotti moved to Chicago.</li>';
								}
								
								if ($clue == 472)
								{
									echo
									'<li id="clue-472" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 472<br>
										Dotti worked as a cook during summer camp at Camp Laughing Waters.</li>';
								}
								
								if ($clue == 514)
								{
									echo
									'<li id="clue-514" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 514<br>
										A member of Dotti\'s Senior Troop #553 was named the first Gold Award recipient in the Greater Philadelphia Council.</li>';
								}

								if ($clue == 542)
								{
									echo
									'<li id="clue-542" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 542<br>
										Dotti began traveling to Appalachia each summer to help build and repair homes for the poor.</li>';
								}
								
								if ($clue == 874)
								{
									echo
									'<li id="clue-874" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 874<br>
										Dotti was awarded the highest national Girl Scout honor - the Thanks Badge II.</li>';
								}
								
								if ($clue == 875)
								{
									echo
									'<li id="clue-875" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 875<br>
										Dotti led a Pilot troop of five-year-olds to help gather information before implementation of the Daisy program.</li>';
								}
								
								if ($clue == 925)
								{
									echo
									'<li id="clue-925" class="ui-state-default small timeline"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
										Clue 925<br>
										Dotti graduated from North Penn High School.</li>';
								}
							}
							?>
						</ul>
						
						<ul>
							<li class="ui-state-default" style="background-color:#08684E;"><span class="ui-icon ui-icon-blank"></span>2006 - Dotti Died</li>
						</ul>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-lg dottisdare" data-dismiss="modal">OK</button>
      				</div>
				</div>
			</div>
		</div>