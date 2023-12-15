const form = document.querySelector("#uploadForm"),
  fileInput = form.querySelector(".file-input"),
  progressArea = document.querySelector(".progress-area"),
  uploadedArea = document.querySelector(".uploaded-area");

form.addEventListener("click", () => {
  fileInput.click();
});

fileInput.onchange = ({ target }) => {
  let file = target.files[0];
  if (file) {
    let fileName = file.name;
    if(fileName.length >= 12){
        let splitName = fileName.split('.');
        fileName = splitName[0].substring(0, 12) + "..." + splitName[1];
    }
    uploadFile(fileName, file);
  }
};

function uploadFile(name, file) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "upload.php");

  xhr.upload.addEventListener("progress", ({ loaded, total }) => {
    let fileLoaded = Math.floor((loaded / total) * 100); // Persentase teruploadnya file
    let fileTotal = Math.floor(total / 1000); // Size file dalam KB
    let fileSize;
    (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
    console.log(fileLoaded, fileTotal);

    let progressHTML = `<li class="row">
      <i class="fas fa-file-alt"></i>
      <div class="content">
        <div class="details">
          <span class="name">${name} • Uploading</span>
          <span class="percent">${fileLoaded}%</span>
        </div>
        <div class="progress-bar">
          <div class="progress" style="width:${fileLoaded}%"></div>
        </div>
      </div>
    </li>`;
    progressArea.innerHTML = progressHTML;

    // Jika file sudah terupload
    if (fileLoaded === 100) {
      let uploadedHTML = `
      </section>
      <li class="row">
        <i class="fas fa-file-alt"></i>
        <div class="content">
          <div class="details">
            <span class="name">${name} • Uploaded</span>
            <span class="size">${fileSize}</span>
          </div>
        </div>
        <i class="fas fa-check"></i>
      </li>
      
      <section class="uploaded-area">`;
      progressArea.innerHTML = uploadedHTML;
    }
  });

  let formData = new FormData();
  formData.append("file", file);
  xhr.send(formData);
};

document.getElementById('externalButton').addEventListener('click', function() {
  form.submit();
});
