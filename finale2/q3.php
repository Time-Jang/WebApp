<?php
 	//name : JangWonWoo, ID:2014038286, class : 2
	// if request method is not 'GET' send back error code and kill the process
	// 요청방식이 'GET'이 아닌 경우 에러 코드를 반환하고 프로세스를 멈추어라
	if($_SERVER["REQUEST_METHOD"] != 'GET') {
		header("HTTP/1.1 400 Invalid Request");
		die("HTTP/1.1 400 Invalid Request: REQUEST_METHOD MUST BE 'GET'");
	}

	if(isset($_REQUEST["to"])) {
		/* according to parameter passed in, read corresponding text file &
		 * generate the appropriate JSON data in the format as shown below
		 * (Note: the below JSON example represents navigational data for 'Ansan Terminal')
		 * 전달된 매개 변수에 따라 이에 대응하는 텍스트 파일을 읽고 &
		 * 아래에 표시된 형식과 같이 적절한 JSON 데이터를 생성하시오
		 * (노트: 아래 JSON 예제는 'Ansan Terminal' 목적지에 대한 방향(길찾기) 데이터이다)
		 *
		 * {
		 *   "to": "Ansan Terminal",
		 *	 "directions": [
		 *		{"distance": "0.6", "turn": "left", "street": "hangaeul-ro"},
		 *		{"distance": "1.5", "turn": "left", "street": "terminal-parking"},
		 *		{"distance": "0.1", "turn": "arrive", "street": null}
		 *	 ]
		 * }
		 *
		 * also check if the file exists before accesing text file
		 * 그리고 텍스트 파일에 접근하기 전에 파일이 존재하는지부터 적절히 체크하시오
		 */
		 $text_file = filter_chars($_REQUEST["to"]);


		 if (!file_exists($text_file)) {
		 	header("HTTP/1.1 500 Server Error");
		 	die("ERROR 500: Server error - Unable to read input file: $text_file");
		 }

		 header("Content-type: application/json");
		 $lines = file($text_file);

		 print "{\n  \"to\": \"$text_file,\n  \"directions\": [";

		 for($i = 0; $i < count($lines); $i++)
 		 {
			 list($distance, $turn, $street) = explode(" ", trim($lines[$i]));
		 }

		 for ($i = 0; $i < count($lines); $i++) {
			 $dist = array('distance'=>$distance, 'turn'=>$turn, 'street'=>$street);
			 echo json_encode($dist);
			 if($i != count($lines))
			 {
				 print(",");
				 print("\n");
			 }
		}

		print "  ]\n}\n";



	} else {
		$destinations = array(
			array("Ansan Terminal", "2.2"),
			array("Handaeap Station", "2.3")
		);

		/* use the $destination array defined above & generate the following XML data
		 * 위에 정의된 $destination array를 사용하여 아래와 같은 XML 데이터를 생성하시오.
		 *
		 * <?xml version="1.0" encoding="UTF-8"?>
		 * <destinations>
		 *   <destination distance="2.2">Ansan Terminal</destination>
		 *   <destination distance="2.3">Handaeap Station</destination>
		 * </destinations>
		 */
		 header("Content-type: application/xml");

		 print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		 print "<destinations>\n";

		 for(var i = 0; i < count($destinations); i++)
		 {
		 		print "\t<destination distance=$destinations[i][1]>$destination[i][0]</destination>\n";
	   }

		 print "</destinations>";

	}
?>
