		<?php
			define("TROOP_ID", 173);
			$codeFound = array_key_exists(TROOP_ID, $cluesFound);
		?>
		
		<div class="modal fade" id="blueTriangle" tabindex="-1" role="dialog" aria-labelledby="Blue Triangle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-clue">
				<div class="modal-content">					
					<div class="modal-body modal-body-clue">
						<h3 class="clue">
							Clue Code
						</h3>
						
						<?php
							$onSubmitValue = ""; 
							if (!$codeFound)
							{
								$onSubmitValue = 'validateClue(\'' . $troop . '\', ' . TROOP_ID . ', \'blueTriangle\');';
							}
							else
							{
								$onSubmitValue = 'addClueCode(\'' . $troop . '\', ' . TROOP_ID . ');';
							}
							
							echo
								'<form class="form-signin cluecode" role="form" id="form' . TROOP_ID . '" ' . 
									'onsubmit="' . $onSubmitValue . 'return false;">' .
							
								'<img src="images/clues/' . TROOP_ID . '.jpg" alt="Pool House" 
									width="314" height="215" class="img-rounded modal-image-clue" />';
							
							$clueTextStyleVisibility = ($codeFound) ? 'style="visibility:visible"' : '';
							echo
								'<h4 id="clue' . TROOP_ID . '" class="clue-success" ' . $clueTextStyleVisibility . '>' .
									// The clue text.
									'Test TEST' .
								'</h4>';
								
							if (!$codeFound)
							{
								echo
								'<h4 id="submitText173" class="form-signin-heading">
					        		Enter the 3-digit code found on the back of your clue:
					        	</h4>';
							}
						?>

					        <input type="text" id="input173" class="form-control dottisdare" placeholder="" required autofocus>
					        <button class="btn btn-lg btn-primary dottisdare" type="submit" id="submitButton173">Submit Clue Code</button>
					        <button type="button" class="btn btn-lg dottisdare" data-dismiss="modal">Close</button>
					        <h4 id="incorrect173" class="clue-invalid">Incorrect clue code.</h4>
					      </form>
					</div>
				</div>
			</div>
		</div>