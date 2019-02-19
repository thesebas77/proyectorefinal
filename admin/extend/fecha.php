<?php 

	
	# Mes actual

	// date('n');  1 - 12 (sin 0 inicial)
	
	$ma = date('n');

	if ($ma < 2){
		return $res = 6;

		}elseif ($ma < 4 && $ma >= 2) {
			return $res = 5;

			}elseif ($ma < 6 && $ma >= 4) {
				return $res = 4;

				}elseif ($ma < 8 && $ma >= 6) {
					return $res = 3;

					}elseif ($ma < 10 && $ma >= 8) {
						return $res = 2;

						}elseif ($ma < 12 && $ma >= 10) {
							return $res = 1;

		}

	
 ?>