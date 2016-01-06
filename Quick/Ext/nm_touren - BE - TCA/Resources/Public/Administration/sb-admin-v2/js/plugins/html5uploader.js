/*
*	Upload files to the server using HTML 5 Drag and drop the folders on your local computer
*
*	Tested on:
*	Mozilla Firefox 3.6.12
*	Google Chrome 7.0.517.41
*	Safari 5.0.2
*	Safari na iPad
*	WebKit r70732
*
*	The current version does not work on:
*	Opera 10.63 
*	Opera 11 alpha
*	IE 6+
*/

function uploader(place, status, targetPHP, show, images) {

	// Upload image files
	var upload = function(file) {
		// Firefox 3.6, Chrome 6, WebKit
		if(window.FileReader) { 
				
			// Once the process of reading file
			this.loadEnd = function() {
				var bin = reader.result;
				var xhr = new XMLHttpRequest();
				xhr.open('POST', targetPHP, true);
				var boundary = 'xxxxxxxxx';
	 			var body = '--' + boundary + "\r\n";  
				body += "Content-Disposition: form-data; name='upload'; filename='" + file.name + "'\r\n";  
				body += "Content-Type: application/octet-stream\r\n\r\n";  
				body += bin + "\r\n";  
				body += '--' + boundary + '--';      
				xhr.setRequestHeader('content-type', 'multipart/form-data; boundary=' + boundary);
				// Firefox 3.6 provides a feature sendAsBinary ()
                xhr.open('POST', targetPHP+"&tx_products_productsproducts_productsm1[up]=1&tx_products_productsproducts_productsm1[base64]=1&tx_products_productsproducts_productsm1[filename]="+file.name, true);
                xhr.setRequestHeader('UP-FILENAME', file.name);
                xhr.setRequestHeader('UP-SIZE', file.size);
                xhr.setRequestHeader('UP-TYPE', file.type);

                xhr.send(window.btoa(bin));
				if (show) {
//					var newFile  = document.createElement('div');
//					newFile.innerHTML = 'Loaded : '+file.name+' size '+file.size+' B';
//					document.getElementById(show).appendChild(newFile);
				}
				if (status) {
                    $("#"+status+" .progress-bar").css("width", "100%");
                    setTimeout(function(){
                        $("#"+status+" .progress-bar").fadeOut("fast", function(){
                            $(this).css("width", "0%");
                            setTimeout(function(){
                                $("#"+status+" .progress-bar").show();
                            }, 2000);
                        });
                    }, 1000);
//					document.getElementById(status).innerHTML = 'Loaded : 100%<br/>Next file ...';
				}
                xhr.onreadystatechange=function()
                {
                    if (xhr.readyState==4 && xhr.status==200)
                    {
                        var response = JSON.parse(xhr.response);
                        notify('success', 'Bild "'+response.filename+'" wurden hochgeladen. Produkt bitte speichern.');
                        $("#"+images).val( $("#"+images).val()+response.filename+"," );
                        var img = $('<img />').prop('src', '/uploads/tx_products/'+response.filename);
                        img.data("filename", response.filename);
                        var div = document.createElement("div");
                        $(div).addClass('image-single-area').html(img);
                        var toolbarHtml = '<span><i class="fa fa-tag" data-toggle="tooltip" data-original-title="Illustration mit \'Neu\' markieren" onclick="marknewImage(this, '+response.product+');"></i><i class="fa fa-trash-o" data-toggle="tooltip" data-original-title="Illustration löschen" onclick="deleteImage(this, '+response.product+');"></i></span>';
                        $(div).prepend(toolbarHtml);
                        document.getElementById(show).appendChild(div);

                    }

                }

			}
				
			// Loading errors
			this.loadError = function(event) {
				switch(event.target.error.code) {
					case event.target.error.NOT_FOUND_ERR:
						document.getElementById(status).innerHTML = 'File not found!';
					break;
					case event.target.error.NOT_READABLE_ERR:
						document.getElementById(status).innerHTML = 'File not readable!';
					break;
					case event.target.error.ABORT_ERR:
					break; 
					default:
						document.getElementById(status).innerHTML = 'Read error.';
				}	
			}
		
			// Reading Progress
			this.loadProgress = function(event) {
				if (event.lengthComputable) {
					var percentage = Math.round((event.loaded * 100) / event.total);

                    $("#"+status+" .progress-bar").css("width", percentage+"%");
//					document.getElementById(status).innerHTML = 'Loaded : '+percentage+'%';
				}				
			}
				
			// Preview images
			this.previewNow = function(event) {		
//				bin = preview.result;
//				var img = document.createElement("img");
//				img.className = 'addedIMG';
//			    img.file = file;
//			    img.src = bin;
//
//                var div = document.createElement("div");
//                $(div).addClass('image-single-area').html(img);
//				document.getElementById(show).appendChild(div);
			}

		var reader = new FileReader();
		// Firefox 3.6, WebKit
		if(reader.addEventListener) { 
			reader.addEventListener('loadend', this.loadEnd, false);
			if (status != null) 
			{
				reader.addEventListener('error', this.loadError, false);
				reader.addEventListener('progress', this.loadProgress, false);
			}
		
		// Chrome 7
		} else { 
			reader.onloadend = this.loadEnd;
			if (status != null) 
			{
				reader.onerror = this.loadError;
				reader.onprogress = this.loadProgress;
			}
		}
		var preview = new FileReader();
		// Firefox 3.6, WebKit
		if(preview.addEventListener) { 
			preview.addEventListener('loadend', this.previewNow, false);
		// Chrome 7	
		} else { 
			preview.onloadend = this.previewNow;
		}
		
		// The function that starts reading the file as a binary string
     	reader.readAsBinaryString(file);
	     
    	// Preview uploaded files
    	if (show) {
	     	preview.readAsDataURL(file);
	 	}
		
  		// Safari 5 does not support FileReader
		} else {
			xhr = new XMLHttpRequest();
			xhr.open('POST', targetPHP, true);
			xhr.setRequestHeader('UP-FILENAME', file.name);
			xhr.setRequestHeader('UP-SIZE', file.size);
			xhr.setRequestHeader('UP-TYPE', file.type);
			xhr.send(file); 
			
			if (status) {
//				document.getElementById(status).innerHTML = 'Loaded : 100%';
			}
			if (show) {
//				var newFile  = document.createElement('div');
//				newFile.innerHTML = 'Loaded : '+file.name+' size '+file.size+' B';
//				document.getElementById(show).appendChild(newFile);
			}	
		}				
	}

	// Function drop file
	this.drop = function(event) {
		event.preventDefault();
	 	var dt = event.dataTransfer;
	 	var files = dt.files;
	 	for (var i = 0; i<files.length; i++) {
			var file = files[i];
			upload(file);
	 	}
	}
	
	// The inclusion of the event listeners (DragOver and drop)

	this.uploadPlace =  document.getElementById(place);
	this.uploadPlace.addEventListener("dragover", function(event) {
		event.stopPropagation(); 
		event.preventDefault();
        $("#"+status+" .progress-bar").css("width", "0%");
	}, true);
    $('#'+place).bind("dragenter", function() {
        $(this).addClass('highlight');
    });
    $('#'+place).bind("dragleave dragdrop drop", function() {
        $(this).removeClass('highlight');
    });


	this.uploadPlace.addEventListener("drop", this.drop, false); 

}




function uploaderSubproduct(place, status, targetPHP, show, images) {

    // Upload image files
    var upload = function(file) {
        // Firefox 3.6, Chrome 6, WebKit
        if(window.FileReader) {

            // Once the process of reading file
            this.loadEnd = function() {
                var bin = reader.result;
                var xhr = new XMLHttpRequest();
                xhr.open('POST', targetPHP, true);
                var boundary = 'xxxxxxxxx';
                var body = '--' + boundary + "\r\n";
                body += "Content-Disposition: form-data; name='upload'; filename='" + file.name + "'\r\n";
                body += "Content-Type: application/octet-stream\r\n\r\n";
                body += bin + "\r\n";
                body += '--' + boundary + '--';
                xhr.setRequestHeader('content-type', 'multipart/form-data; boundary=' + boundary);
                // Firefox 3.6 provides a feature sendAsBinary ()
                xhr.open('POST', targetPHP+"&tx_products_productsproducts_productsm1[up]=1&tx_products_productsproducts_productsm1[base64]=1&tx_products_productsproducts_productsm1[filename]="+file.name, true);
                xhr.setRequestHeader('UP-FILENAME', file.name);
                xhr.setRequestHeader('UP-SIZE', file.size);
                xhr.setRequestHeader('UP-TYPE', file.type);

                xhr.send(window.btoa(bin));
                if (show) {
//					var newFile  = document.createElement('div');
//					newFile.innerHTML = 'Loaded : '+file.name+' size '+file.size+' B';
//					document.getElementById(show).appendChild(newFile);
                }
                if (status) {
                    $("#"+status+" .progress-bar").css("width", "100%");
                    setTimeout(function(){
                        $("#"+status+" .progress-bar").fadeOut("fast", function(){
                            $(this).css("width", "0%");
                            setTimeout(function(){
                                $("#"+status+" .progress-bar").show();
                            }, 2000);
                        });
                    }, 1000);
//					document.getElementById(status).innerHTML = 'Loaded : 100%<br/>Next file ...';
                }
                xhr.onreadystatechange=function()
                {
                    if (xhr.readyState==4 && xhr.status==200)
                    {
                        var response = JSON.parse(xhr.response);
                        notify('success', 'Bild "'+response.filename+'" wurden hochgeladen. Produkt bitte speichern.');
                        $("#"+images).val( $("#"+images).val()+response.filename+"," );
                        var img = $('<img />').prop('src', '/uploads/tx_products/'+response.filename);
                        img.data("filename", response.filename);
                        var div = document.createElement("div");
                        $(div).addClass('image-single-area').html(img);
                        var toolbarHtml = '<span><i class="fa fa-trash-o" data-toggle="tooltip" data-original-title="Delete image" onclick="deleteImageSubproduct(this, '+response.product+');"></i></span>';
                        $(div).prepend(toolbarHtml);
                        document.getElementById(show).appendChild(div);

                    }

                }

            }

            // Loading errors
            this.loadError = function(event) {
                switch(event.target.error.code) {
                    case event.target.error.NOT_FOUND_ERR:
                        document.getElementById(status).innerHTML = 'File not found!';
                        break;
                    case event.target.error.NOT_READABLE_ERR:
                        document.getElementById(status).innerHTML = 'File not readable!';
                        break;
                    case event.target.error.ABORT_ERR:
                        break;
                    default:
                        document.getElementById(status).innerHTML = 'Read error.';
                }
            }

            // Reading Progress
            this.loadProgress = function(event) {
                if (event.lengthComputable) {
                    var percentage = Math.round((event.loaded * 100) / event.total);

                    $("#"+status+" .progress-bar").css("width", percentage+"%");
//					document.getElementById(status).innerHTML = 'Loaded : '+percentage+'%';
                }
            }

            // Preview images
            this.previewNow = function(event) {
//				bin = preview.result;
//				var img = document.createElement("img");
//				img.className = 'addedIMG';
//			    img.file = file;
//			    img.src = bin;
//
//                var div = document.createElement("div");
//                $(div).addClass('image-single-area').html(img);
//				document.getElementById(show).appendChild(div);
            }

            var reader = new FileReader();
            // Firefox 3.6, WebKit
            if(reader.addEventListener) {
                reader.addEventListener('loadend', this.loadEnd, false);
                if (status != null)
                {
                    reader.addEventListener('error', this.loadError, false);
                    reader.addEventListener('progress', this.loadProgress, false);
                }

                // Chrome 7
            } else {
                reader.onloadend = this.loadEnd;
                if (status != null)
                {
                    reader.onerror = this.loadError;
                    reader.onprogress = this.loadProgress;
                }
            }
            var preview = new FileReader();
            // Firefox 3.6, WebKit
            if(preview.addEventListener) {
                preview.addEventListener('loadend', this.previewNow, false);
                // Chrome 7
            } else {
                preview.onloadend = this.previewNow;
            }

            // The function that starts reading the file as a binary string
            reader.readAsBinaryString(file);

            // Preview uploaded files
            if (show) {
                preview.readAsDataURL(file);
            }

            // Safari 5 does not support FileReader
        } else {
            xhr = new XMLHttpRequest();
            xhr.open('POST', targetPHP, true);
            xhr.setRequestHeader('UP-FILENAME', file.name);
            xhr.setRequestHeader('UP-SIZE', file.size);
            xhr.setRequestHeader('UP-TYPE', file.type);
            xhr.send(file);

            if (status) {
//				document.getElementById(status).innerHTML = 'Loaded : 100%';
            }
            if (show) {
//				var newFile  = document.createElement('div');
//				newFile.innerHTML = 'Loaded : '+file.name+' size '+file.size+' B';
//				document.getElementById(show).appendChild(newFile);
            }
        }
    }

    // Function drop file
    this.drop = function(event) {
        event.preventDefault();
        var dt = event.dataTransfer;
        var files = dt.files;
        for (var i = 0; i<files.length; i++) {
            var file = files[i];
            upload(file);
        }
    }

    // The inclusion of the event listeners (DragOver and drop)

    this.uploadPlace =  document.getElementById(place);
    this.uploadPlace.addEventListener("dragover", function(event) {
        event.stopPropagation();
        event.preventDefault();
        $("#"+status+" .progress-bar").css("width", "0%");
    }, true);
    $('#'+place).bind("dragenter", function() {
        $(this).addClass('highlight');
    });
    $('#'+place).bind("dragleave dragdrop drop", function() {
        $(this).removeClass('highlight');
    });


    this.uploadPlace.addEventListener("drop", this.drop, false);

}

