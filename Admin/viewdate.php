<?php						
							$from = $_POST['from'];
							$to = $_POST['to'];							
							function returnDates($fromdate, $todate) {
							    $fromdate = \DateTime::createFromFormat('Y-m-d', $fromdate);
							    $todate = \DateTime::createFromFormat('Y-m-d', $todate);
							    return new \DatePeriod(
							        $fromdate,
							        new \DateInterval('P1D'),
							        $todate->modify('+1 day')
							    );
							}

							$datePeriod = returnDates($from, $to);
							foreach($datePeriod as $date) {
							    $datess=$date->format('Y-m-d');
							    echo $datess;
							    echo "<br>";
							}
						?>