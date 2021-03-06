		<?php
			$clueId = 472;
			$clueFound = array_key_exists($clueId, $cluesFound);
		?>
		
		<div class="modal fade" id="redTriangle" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-clue">
				<div class="modal-content">					
					<div class="modal-body modal-body-clue">
						<h3 class="clue">
							<?php
								echo $allClues[$clueId]->getLocation();
							?>
						</h3>
						
						<?php
							$onSubmitValue = ""; 
							if (!$clueFound)
							{
								// Change the value at the end for each clue.
								$onSubmitValue = 'validateClue(\'' . $troop . '\', \'' . $troopName . '\',' . 
										$clueId . ', \'redTriangle\');';
							}
							else
							{
								// Change the value at the end for each clue.
								$onSubmitValue = 'closeModalOpenTimeline(\'' . $troop . '\', \'' . $troopName . '\',\'redTriangle\');';
							}
							
							echo
							'<form class="form-signin cluecode" role="form" id="form' . $clueId . '" ' . 
								'onsubmit="' . $onSubmitValue . 'return false;">' .
							
							// Update the alt text, width and height for each clue.
							'<img src="images/clues/' . $clueId . '.jpg" alt="Rock at DJ\'s" 
								width="302" height="235" class="img-rounded modal-image-clue" />';
							
							$submitButtonText = "";
							if (!$clueFound)
							{
								echo
								'<h4 id="clueSubmitText' . $clueId . '" class="clue-text">
					        		Enter the 3-digit code found on the back of your clue:
					        	</h4>
								<input type="text" id="input' . $clueId . '" class="form-control dottisdare clue" placeholder="" required autofocus>
								<h4 id="incorrect' . $clueId . '" class="clue-invalid">Incorrect clue code</h4>';
								$submitButtonText = "Submit Clue Code";
							}
							else 
							{
								echo
								'<h4 id="clueSubmitText' . $clueId . '" class="clue-text">' .
									$cluesFound[$clueId]->getDescription() .
					        	'</h4>';
								$submitButtonText = "Open Timeline";
							}
							
							echo
							'<button class="btn btn-lg btn-primary dottisdare" type="submit" id="submitButton' . $clueId . '">
								' . $submitButtonText . '
							</button>
							<button type="button" class="btn btn-lg dottisdare" data-dismiss="modal">Close</button>';
						?>

					      </form>
					</div>
				</div>
			</div>
		</div>