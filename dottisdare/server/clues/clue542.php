		<?php
			$clueId = 542;
			$clueFound = array_key_exists($clueId, $cluesFound);
		?>
		
		<div class="modal fade" id="redCircle" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-clue">
				<div class="modal-content">					
					<div class="modal-body modal-body-clue">
						<h3 class="clue">
							Clue Code
						</h3>
						
						<?php
							$onSubmitValue = ""; 
							if (!$clueFound)
							{
								// Change the value at the end for each clue.
								$onSubmitValue = 'validateClue(\'' . $troop . '\', \'' . $troopName . '\',' . 
										$clueId . ', \'redCircle\');';
							}
							else
							{
								// Change the value at the end for each clue.
								$onSubmitValue = 'closeModalOpenTimeline(\'' . $troop . '\', \'' . $troopName . '\',\'redCircle\');';
							}
							
							echo
							'<form class="form-signin cluecode" role="form" id="form' . $clueId . '" ' . 
								'onsubmit="' . $onSubmitValue . 'return false;">' .
							
							// Update the alt text, width and height for each clue.
							'<img src="images/clues/' . $clueId . '.jpg" alt="Stone Bridge at Conestoga" 
								width="314" height="200" class="img-rounded modal-image-clue" />';
							
							$clueTextStyleVisibility = ($clueFound) ? 'style="visibility:visible"' : '';
							echo
							'<h4 id="clue' . $clueId . '" class="clue-success" ' . $clueTextStyleVisibility . '>' .
								// The clue text.
								'Test TEST' .
							'</h4>';
							
							$submitButtonText = "";
							if (!$clueFound)
							{
								echo
								'<h4 id="submitText' . $clueId . '" class="form-signin-heading">
					        		Enter the 3-digit code found on the back of your clue:
					        	</h4>
								<input type="text" id="input' . $clueId . '" class="form-control dottisdare clue" placeholder="" required autofocus>
								<h4 id="incorrect' . $clueId . '" class="clue-invalid">Incorrect clue code</h4>';
								$submitButtonText = "Submit Clue Code";
							}
							else 
							{
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