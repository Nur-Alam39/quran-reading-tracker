<?php 
			  
			// The location of the PDF file 
			// on the server 
			$filename = "C:/Users/Nur-E-Alam Jony/Desktop/Surah.pdf"; 
			  
			// Header content type 
			header("Content-type: application/pdf"); 
			  
			header("Content-Length: " . filesize($filename)); 
			  
			// Send the file to the browser. 
			readfile($filename); 
			?>