/*
*  Copyright (c) 2015 The WebRTC project authors. All Rights Reserved.
*
*  Use of this source code is governed by a BSD-style license
*  that can be found in the LICENSE file in the root of the source
*  tree.
*/

// This code is adapted from
// https://rawgit.com/Miguelao/demos/master/mediarecorder.html

'use strict';

/* globals MediaRecorder */

const mediaSource = new MediaSource();
mediaSource.addEventListener('sourceopen', handleSourceOpen, false);
let mediaRecorder;
let recordedBlobs;
let sourceBuffer;

const errorMsgElement = document.querySelector('span#errorMsg');
const recordButton = document.querySelector('button#record');

recordButton.addEventListener('click', () => {
  if (recordButton.textContent === 'Rekam') {
    startRecording();
  } else {
    stopRecording();
    recordButton.textContent = 'Rekam';
  }
});

function handleSourceOpen(event) {
  console.log('MediaSource opened');
  sourceBuffer = mediaSource.addSourceBuffer('video/webm; codecs="vp8"');
  console.log('Source buffer: ', sourceBuffer);
}

function handleDataAvailable(event) {
  console.log('handleDataAvailable', event);
  if (event.data && event.data.size > 0) {
    recordedBlobs.push(event.data);
  }
}

function startRecording() {
  recordedBlobs = [];
  let options = {mimeType: 'video/webm;codecs=vp9'};
  if (!MediaRecorder.isTypeSupported(options.mimeType)) {
    console.error(`${options.mimeType} is not Supported`);
    errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
    options = {mimeType: 'video/webm;codecs=vp8'};
    if (!MediaRecorder.isTypeSupported(options.mimeType)) {
      console.error(`${options.mimeType} is not Supported`);
      errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
      options = {mimeType: 'video/webm'};
      if (!MediaRecorder.isTypeSupported(options.mimeType)) {
        console.error(`${options.mimeType} is not Supported`);
        errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
        options = {mimeType: ''};
      }
    }
  }

  try {
    mediaRecorder = new MediaRecorder(window.stream, options);
  } catch (e) {
    console.error('Exception while creating MediaRecorder:', e);
    errorMsgElement.innerHTML = `Exception while creating MediaRecorder: ${JSON.stringify(e)}`;
    return;
  }

  console.log('Created MediaRecorder', mediaRecorder, 'with options', options);
  recordButton.textContent = 'Berhenti';
  mediaRecorder.onstop = (event) => {
    console.log('Recorder stopped: ', event);
    console.log('Recorded Blobs: ', recordedBlobs);
  };
  mediaRecorder.ondataavailable = handleDataAvailable;
  mediaRecorder.start(10); // collect 10ms of data
  console.log('MediaRecorder started', mediaRecorder);
}

function stopRecording() {
  mediaRecorder.stop();

  const blob = new Blob(recordedBlobs, {type: 'video/webm'});
  const url = window.URL.createObjectURL(blob);
  const tables = document.getElementsByTagName('table');
  const row = document.createElement('tr');
  const col2 = document.createElement('td');
  const video = document.createElement('video');
  const upld = document.createElement('a');
  const shr = document.createElement('a');
  const br = document.createElement('br');

  const table = tables[tables.length - 1];
  const rows = table.rows;
  for(var i = 0, td; i < rows.length; i++){
      var col1 = document.createElement('td');
      var dnld = document.createElement('a');
      dnld.download = "record"+(i+1)+".webm";
      col1.appendChild(document.createTextNode(i + 1));
  }

  video.className = 'mb-2';
  video.src = url;
  video.controls = true;
  col2.appendChild(video);
  col2.appendChild(br);

  dnld.className = "btn btn-primary mr-2";
  dnld.href = url;
  dnld.innerHTML = "<i class='fa fa-download'></i> Unduh";
  col2.appendChild(dnld);

  upld.className = "btn btn-primary mr-2";
  upld.href = "#";
  upld.innerHTML = "<i class='fa fa-upload'></i> Unggah";
  upld.addEventListener('click', function(e){
    e.preventDefault();
    $.ajax({
      url:"<?php echo site_url('user/uploadpemanasan')?>", //URL submit
      type:"post", //method Submit
      data:new FormData(this), //penggunaan FormData
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success: function(data){
        alert("File berhasil diupload"); //alert jika upload berhasil
      }
    });
  });
  col2.appendChild(upld);

  shr.className = "btn btn-primary";
  shr.href = "#";
  shr.innerHTML = "<i class='fa fa-share'></i> Bagikan";
  col2.appendChild(shr);

  col1.className = "align-middle text-center";
  col2.className = "align-middle text-center";
  row.appendChild(col1);
  row.appendChild(col2);
  document.getElementById('mytable').appendChild(row);
}

function handleSuccess(stream) {
  recordButton.disabled = false;
  console.log('getUserMedia() got stream:', stream);
  window.stream = stream;

  const gumVideo = document.querySelector('video#gum');
  gumVideo.srcObject = stream;
}

async function init(constraints) {
  try {
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    handleSuccess(stream);
  } catch (e) {
    console.error('navigator.getUserMedia error:', e);
    errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
  }
}

const cameraButton = document.querySelector('button#start');
cameraButton.addEventListener('click', async () => {
  if (cameraButton.textContent == 'Buka Kamera') {
    cameraButton.textContent = 'Tutup Kamera';
    const hasEchoCancellation = document.querySelector('#echoCancellation').checked;
    const constraints = {
      audio: {
        echoCancellation: {exact: hasEchoCancellation}
      },
      video: {
        width: 1280, height: 720
      }
    };
    console.log('Using media constraints:', constraints);
    await init(constraints);
  }else{
    cameraButton.textContent = 'Buka Kamera';
    recordButton.disabled = true;
    stream.getTracks().forEach(function(track) {
      track.stop();
    });
  }
});
