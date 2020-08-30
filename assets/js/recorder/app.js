//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");

//add events to those 2 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);

function startRecording() {
	console.log("recordButton clicked");

	/*
		Simple constraints object, for more advanced audio features see
		https://addpipe.com/blog/audio-constraints-getusermedia/
	*/
    
    var constraints = { audio: true, video:false }

 	/*
    	Disable the record button until we get a success or fail from getUserMedia() 
	*/

	recordButton.disabled = true;
	stopButton.disabled = false

	/*
    	We're using the standard promise based getUserMedia() 
    	https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
	*/

	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

		/*
			create an audio context after getUserMedia is called
			sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
			the sampleRate defaults to the one set in your OS for your playback device

		*/
		audioContext = new AudioContext();

		//update the format 
		document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"

		/*  assign to gumStream for later use  */
		gumStream = stream;
		
		/* use the stream */
		input = audioContext.createMediaStreamSource(stream);

		/* 
			Create the Recorder object and configure to record mono sound (1 channel)
			Recording 2 channels  will double the file size
		*/
		rec = new Recorder(input,{numChannels:1})

		//start the recording process
		rec.record()

		console.log("Recording started");

	}).catch(function(err) {
	  	//enable the record button if getUserMedia() fails
    	recordButton.disabled = false;
    	stopButton.disabled = true
	});
}

function stopRecording() {
	console.log("stopButton clicked");

	//disable the stop button, enable the record too allow for new recordings
	stopButton.disabled = true;
	recordButton.disabled = false;
	
	//tell the recorder to stop the recording
	rec.stop();

	//stop microphone access
	gumStream.getAudioTracks()[0].stop();

	//create the wav blob and pass it on to createDownloadLink
	rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {
	
	var url = URL.createObjectURL(blob);
	var au = document.createElement('audio');
	var unduh = document.createElement('a');
	var unggah = document.createElement('a');
	var bagikan = document.createElement('a');
	var baris = document.createElement('tr');
  
	var tables = document.getElementsByTagName('table');
	var table = tables[tables.length - 1];
	var rows = table.rows;
	for(var i = 0, td; i < rows.length; i++){
		var kolom1 = document.createElement('td');
	    kolom1.appendChild(document.createTextNode(i + 1));
	}
	
	var kolom2 = document.createElement('td');
	var kolom3 = document.createElement('td');

	//name of .wav file to use during upload and download (without extendion)
	var filename = "record";

	//add controls to the <audio> element
	au.controls = true;
	au.src = url;
	kolom2.appendChild(au);

	//save to disk link
	unduh.className = "btn btn-primary mb-2";
	unduh.href = url;
	unduh.download = filename+".wav"; //download forces the browser to donwload the file using the  filename
	unduh.innerHTML = "Download";
	kolom3.appendChild(unduh);
	kolom3.appendChild(document.createTextNode(" "));
	
	//upload link
	unggah.className = "btn btn-primary mb-2";
	unggah.href = "#";
	unggah.innerHTML = "Upload";
	unggah.addEventListener("click", function(event){
		  var xhr=new XMLHttpRequest();
		  xhr.onload=function(e) {
		      if(this.readyState === 4) {
		          console.log("Server returned: ",e.target.responseText);
		      }
		  };
		  var fd=new FormData();
		  fd.append("audio_data",blob, filename);
		  xhr.open("POST","uploadaudio",true);
		  xhr.send(fd);
	})
	kolom3.appendChild(unggah);
	kolom3.appendChild(document.createTextNode(" "));

	//bagikan
	bagikan.className = "btn btn-primary mb-2";
	bagikan.href = "#";
	bagikan.innerHTML = "Share to Home";
	bagikan.addEventListener("click", function(event){
		  bagi(blob);
		  /*var xhr=new XMLHttpRequest();
		  xhr.onload=function(e) {
		      if(this.readyState === 4) {
		          console.log("Server returned: ",e.target.responseText);
		      }
		  };
		  var fd=new FormData();
		  fd.append("audio_data",blob, filename);
		  xhr.open("POST","bagiaudio",true);
		  xhr.send(fd);*/
	})
	kolom3.appendChild(bagikan);

	baris.appendChild(kolom1);
	baris.appendChild(kolom2);
	baris.appendChild(kolom3);
	document.getElementById("mytable").appendChild(baris);
}

function bagi(blob){
	$("#shareModal").modal("show");
	
}